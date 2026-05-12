@extends('layouts.app')
@section('title', 'Tableau de bord — Citoyen')
@section('page-title', 'Tableau de bord')

@section('content')
<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Permis</div>
                    <div class="fw-bold fs-4">{{ $totalPermits }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-clock-history"></i>
                </div>
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
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div>
                    <div class="text-muted small">Traités</div>
                    <div class="fw-bold fs-4">{{ $totalPermits - $pending }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Action -->
<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('citizen.permits.create') }}" class="btn btn-navy">
        <i class="bi bi-plus-circle me-2"></i>Nouvelle demande
    </a>
</div>

<!-- Recent Permits Table -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Derniers permis</h6>
        <a href="{{ route('citizen.permits') }}" class="btn btn-sm btn-outline-secondary">Voir tous</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Référence</th>
                        <th>Projet</th>
                        <th>Type</th>
                        <th>Statut</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentPermits as $permit)
                        <tr>
                            <td>
                                <a href="{{ route('citizen.permits.show', $permit->id) }}" class="fw-medium text-decoration-none">{{ $permit->reference_number }}</a>
                            </td>
                            <td>{{ Str::limit($permit->project_title, 30) }}</td>
                            <td><span class="badge bg-light text-dark">{{ $permit->permitType?->nom }}</span></td>
                            <td>
                                <span class="badge-status" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                            <td class="text-muted small">{{ $permit->submitted_at?->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Aucun permis. <a href="{{ route('citizen.permits.create') }}">Créer votre première demande</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
