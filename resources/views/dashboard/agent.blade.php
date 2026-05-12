@extends('layouts.app')
@section('title', 'Tableau de bord — Agent Urbanisme')
@section('page-title', 'Tableau de bord Agent')

@section('content')
<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning"><i class="bi bi-clock-history"></i></div>
                <div>
                    <div class="text-muted small">En attente</div>
                    <div class="fw-bold fs-4">{{ $pending }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-danger bg-opacity-10 text-danger"><i class="bi bi-exclamation-triangle"></i></div>
                <div>
                    <div class="text-muted small">Haut risque</div>
                    <div class="fw-bold fs-4">{{ $highRisk }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary"><i class="bi bi-stack"></i></div>
                <div>
                    <div class="text-muted small">Récents</div>
                    <div class="fw-bold fs-4">{{ $recent->count() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Permits -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Dossiers récents</h6>
        <a href="{{ route('agent.permits') }}" class="btn btn-sm btn-outline-secondary">Voir tous</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Référence</th>
                        <th>Citoyen</th>
                        <th>Type</th>
                        <th>Statut</th>
                        <th>Risque</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recent as $permit)
                        <tr>
                            <td class="fw-medium">{{ $permit->reference_number }}</td>
                            <td>{{ $permit->citizen?->prenom }} {{ $permit->citizen?->nom }}</td>
                            <td><span class="badge bg-light text-dark">{{ $permit->permitType?->nom }}</span></td>
                            <td>
                                <span class="badge-status" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                            <td>
                                @if($permit->risk_level === 'High' || $permit->risk_level === 'Critical')
                                    <span class="badge bg-danger">{{ $permit->risk_level === 'Critical' ? 'Critique' : 'Élevé' }}</span>
                                @elseif($permit->risk_level === 'Medium')
                                    <span class="badge bg-warning text-dark">Moyen</span>
                                @else
                                    <span class="badge bg-success">Faible</span>
                                @endif
                            </td>
                            <td><a href="{{ route('citizen.permits.show', $permit->id) }}" class="btn btn-sm btn-outline-primary">Voir</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">Aucun dossier récent.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
