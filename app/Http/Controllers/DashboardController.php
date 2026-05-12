<?php

namespace App\Http\Controllers;

use App\Models\Permit;
use App\Models\User;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function citizen()
    {
        $userId = Auth::id() ?? 1;
        $totalPermits = Permit::where('citizen_id', $userId)->count();
        $pending = Permit::where('citizen_id', $userId)
                        ->whereHas('status', fn($q) => $q->where('nom', 'Soumis'))->count();
        $recentPermits = Permit::where('citizen_id', $userId)
                            ->with('status', 'permitType')
                            ->latest()->take(5)->get();

        return view('dashboard.citizen', compact('totalPermits', 'pending', 'recentPermits'));
    }

    public function architect()
    {
        $userId = Auth::id() ?? 1;
        $permits = Permit::where('architect_id', $userId)
                        ->with('status', 'citizen', 'permitType')
                        ->latest()->paginate(10);

        return view('dashboard.architect', compact('permits'));
    }

    public function agent()
    {
        $pending = Permit::whereHas('status', fn($q) => $q->whereIn('nom', ['Soumis', 'En cours d\'étude']))->count();
        $highRisk = Permit::where('risk_level', 'High')->count();
        $recent = Permit::with('status', 'citizen', 'permitType')
                        ->latest()->take(10)->get();

        return view('dashboard.agent', compact('pending', 'highRisk', 'recent'));
    }

    public function technical()
    {
        $permits = Permit::where('technical_review_required', true)
                        ->with('status', 'citizen', 'permitType')
                        ->latest()->get();

        return view('dashboard.technical', compact('permits'));
    }

    public function admin()
    {
        $totalUsers = User::count();
        $totalPermits = Permit::count();
        $byStatus = Status::withCount('permits')->get();
        $highRisk = Permit::where('risk_level', 'High')->count();

        return view('dashboard.admin', compact('totalUsers', 'totalPermits', 'byStatus', 'highRisk'));
    }
}
