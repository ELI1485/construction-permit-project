<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Permit;
use App\Models\TechnicalReview;
use App\Models\Status;
use App\Services\WorkflowService;
use App\Services\ArchiveService;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicalReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'conformite' => 'required|boolean',
            'remarque'   => 'nullable|string',
        ]);

        $permit = Permit::findOrFail($id);

        TechnicalReview::create([
            'permit_id'   => $permit->id,
            'reviewed_by' => Auth::id(),
            'conformite'  => $request->conformite,
            'remarque'    => $request->remarque,
            'reviewed_at' => now(),
        ]);

        if ($request->conformite) {
            $status = Status::where('nom', 'Validé techniquement')->first();
            WorkflowService::changeStatus($permit, $status->id, Auth::id(), 'Validation technique réussie.');
            ArchiveService::archive($permit, Auth::id(), 'Archivé après validation technique.');
            NotificationService::notify($permit->citizen_id, $permit->id, 'Permis Approuvé', 
                "Votre permis #{$permit->reference_number} a été approuvé.");
        } else {
            $status = Status::where('nom', 'Refusé')->first();
            WorkflowService::changeStatus($permit, $status->id, Auth::id(), $request->remarque);
            NotificationService::notify($permit->citizen_id, $permit->id, 'Permis Refusé', 
                "Votre permis a été refusé après révision technique.");
        }

        return back()->with('success', 'Révision technique enregistrée.');
    }
}
=======
use App\Models\TechnicalReview;
use Illuminate\Http\Request;

class TechnicalReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TechnicalReview $technicalReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TechnicalReview $technicalReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TechnicalReview $technicalReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TechnicalReview $technicalReview)
    {
        //
    }
}
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
