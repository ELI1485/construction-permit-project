<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Document;
use App\Models\Permit;
use App\Models\PermitType;
use App\Models\Status;
use App\Models\User;
use App\Services\AIService;
use App\Services\DocumentScannerService;
use App\Services\NotificationService;
use App\Services\WorkflowService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermitController extends Controller
{
    public function citizenIndex()
    {
        $permits = Permit::where('citizen_id', Auth::id())
            ->with('status', 'permitType')
            ->latest()->paginate(10);

        return view('permits.index', compact('permits'));
    }

    public function architectIndex()
    {
        $permits = Permit::where('architect_id', Auth::id())
            ->with('status', 'citizen', 'permitType')
            ->latest()->paginate(10);

        return view('permits.index', compact('permits'));
    }

    public function agentIndex(Request $request)
    {
        $query = Permit::with('status', 'citizen', 'permitType', 'district');
        if ($request->status) {
            $query->whereHas('status', fn ($q) => $q->where('nom', $request->status));
        }
        $permits = $query->latest()->paginate(15);
        $statuses = Status::all();

        return view('permits.index', compact('permits', 'statuses'));
    }

    public function technicalIndex()
    {
        $permits = Permit::where('technical_review_required', true)
            ->with('status', 'citizen')
            ->latest()->paginate(10);

        return view('permits.index', compact('permits'));
    }

    public function create()
    {
        $permitTypes = PermitType::all();
        $districts = District::all();

        return view('permits.create', compact('permitTypes', 'districts'));
    }

    public function store(Request $request, AIService $aiService, DocumentScannerService $scanner)
    {
        // Support AI Test API endpoint (JSON POST to /permits)
        if ($request->expectsJson()) {
            $validated = $request->validate([
                'permit_type' => 'required|string',
                'surface' => 'required|numeric',
            ]);

            $uploadedDocs = ['cin'];

            $aiResult = $aiService->validatePermit([
                'surface' => $validated['surface'],
                'permit_type' => $validated['permit_type'],
                'uploaded_docs' => $uploadedDocs,
            ]);

            $permit = Permit::create([
                'user_id' => Auth::id() ?? 1,
                'permit_type' => $validated['permit_type'],
                'surface' => $validated['surface'],
                'status' => 'submitted',
                'risk_score' => $aiResult['risk_score'] ?? null,
                'risk_level' => $aiResult['risk_level'] ?? null,
                'ai_priority' => $aiResult['priority'] ?? null,
                'technical_review_required' => $aiResult['technical_review_required'] ?? false,
                'ai_recommendations' => $aiResult['recommendations'] ?? [],
            ]);

            return response()->json([
                'message' => 'Permit created successfully',
                'permit' => $permit,
                'ai_analysis' => $aiResult,
            ]);
        }

        // Intercept unauthenticated web users to log in before creating DB record
        if (! Auth::check()) {
            session(['pending_permit' => $request->all()]);

            return redirect()->route('login')
                ->with('success', 'يرجى تسجيل الدخول أو إنشاء حساب جديد لإكمال تقديم طلب الترخيص ومتابعة حالته.');
        }

        // Standard Web form submission logic
        $request->validate([
            'permit_type_id' => 'required|exists:permit_types,id',
            'district_id' => 'required|exists:districts,id',
            'project_title' => 'required|string|max:255',
            'project_address' => 'required|string',
            'surface' => 'required|numeric|min:1',
            'documents' => 'required|array|min:1',
            'documents.*' => 'required|file|max:10240|mimes:pdf,jpg,jpeg,png',
        ]);

        // ── Step 1: AI Document Pre-scan ────────────────────────────────────────
        $uploadedFiles = $request->file('documents') ?? [];
        $scanResult = $scanner->scan($uploadedFiles);

        if (! $scanResult['passed']) {
            // Create the permit record immediately so we have a reference number
            $rejectedStatus = Status::where('nom', 'Refusé')->firstOrFail();

            $permit = Permit::create([
                'permit_type_id' => $request->permit_type_id,
                'citizen_id' => Auth::id(),
                'status_id' => $rejectedStatus->id,
                'district_id' => $request->district_id,
                'reference_number' => 'PC-'.date('Y').'-'.rand(10000, 99999),
                'project_title' => $request->project_title,
                'project_address' => $request->project_address,
                'surface' => $request->surface,
                'submitted_at' => now(),
            ]);

            // Store whatever was uploaded so the citizen can review
            foreach ($uploadedFiles as $file) {
                $path = $file->store("documents/{$permit->id}", 'public');
                Document::create([
                    'permit_id' => $permit->id,
                    'uploaded_by' => Auth::id(),
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                    'uploaded_at' => now(),
                ]);
            }

            // Log the auto-rejection in history
            WorkflowService::changeStatus(
                $permit,
                $rejectedStatus->id,
                Auth::id(),
                'رفض تلقائي بواسطة نظام الفحص الذكي للوثائق: '.$scanResult['reason']
            );

            // Notify citizen
            NotificationService::notify(
                Auth::id(),
                $permit->id,
                'رفض تلقائي للطلب',
                "تم رفض طلبك #{$permit->reference_number} تلقائياً. ".$scanResult['reason']
            );

            return redirect()->route('citizen.permits')
                ->with('error', 'تم رفض طلبك تلقائياً بسبب نقص الوثائق: '.$scanResult['reason']);
        }

        // ── Step 2: Documents passed — create permit with Soumis status ─────────
        $status = Status::where('nom', 'Soumis')->firstOrFail();

        $permit = Permit::create([
            'permit_type_id' => $request->permit_type_id,
            'citizen_id' => Auth::id(),
            'status_id' => $status->id,
            'district_id' => $request->district_id,
            'reference_number' => 'PC-'.date('Y').'-'.rand(10000, 99999),
            'project_title' => $request->project_title,
            'project_address' => $request->project_address,
            'surface' => $request->surface,
            'submitted_at' => now(),
        ]);

        // Upload Documents
        foreach ($uploadedFiles as $file) {
            $path = $file->store("documents/{$permit->id}", 'public');
            Document::create([
                'permit_id' => $permit->id,
                'uploaded_by' => Auth::id(),
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $path,
                'uploaded_at' => now(),
            ]);
        }

        // ── Step 3: Run AI risk analysis (non-blocking) ──────────────────────────
        $permit->load('documents', 'permitType');
        AIService::analyze($permit);

        WorkflowService::changeStatus($permit, $status->id, Auth::id(), 'تم إيداع الملف بنجاح بعد الفحص التلقائي للوثائق.');

        // Notify Agents
        $agents = User::whereHas('role', fn ($q) => $q->where('nom', 'agent_urbanisme'))->get();
        foreach ($agents as $agent) {
            NotificationService::notify($agent->id, $permit->id, 'Nouveau Dossier',
                "Un nouveau permis #{$permit->reference_number} a été soumis.");
        }

        return redirect()->route('citizen.permits')
            ->with('success', 'تم إيداع طلبك بنجاح! رقم ملفك: '.$permit->reference_number);
    }

    public function show(string $id)
    {
        $permit = Permit::with(['documents', 'histories.changedBy', 'status', 'permitType', 'citizen', 'technicalReviews'])
            ->findOrFail($id);

        return view('permits.show', compact('permit'));
    }

    public function validatePermit(string $id)
    {
        $permit = Permit::findOrFail($id);
        $status = Status::where('nom', 'Validé administrativement')->firstOrFail();

        WorkflowService::changeStatus($permit, $status->id, Auth::id(), 'Validé administrativement.');
        NotificationService::notify($permit->citizen_id, $permit->id, 'Félicitations',
            "Votre dossier #{$permit->reference_number} a été validé administrativement.");

        return back()->with('success', 'Permis validé avec succès.');
    }

    public function rejectPermit(Request $request, string $id)
    {
        $permit = Permit::findOrFail($id);
        $status = Status::where('nom', 'Refusé')->firstOrFail();

        WorkflowService::changeStatus($permit, $status->id, Auth::id(), $request->commentaire ?? 'Refusé par agent.');
        NotificationService::notify($permit->citizen_id, $permit->id, 'Dossier Refusé',
            "Votre dossier #{$permit->reference_number} a été refusé.");

        return back()->with('success', 'Dossier refusé.');
    }

    public function requestDocs(Request $request, string $id)
    {
        $permit = Permit::findOrFail($id);
        $status = Status::where('nom', 'Documents complémentaires demandés')->firstOrFail();

        WorkflowService::changeStatus($permit, $status->id, Auth::id(), $request->commentaire);
        NotificationService::notify($permit->citizen_id, $permit->id, 'Documents Complémentaires',
            "Veuillez ajouter les documents demandés pour le dossier #{$permit->reference_number}.");

        return back()->with('success', 'Demande envoyée au citoyen.');
    }
}
