@extends('layouts.app')
@section('title', 'Tableau de bord — Service Technique')
@section('page-title', 'Révisions Techniques')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary"><i class="bi bi-clipboard2-check"></i></div>
                <div>
                    <div class="text-muted small">Dossiers à réviser</div>
                    <div class="fw-bold fs-4">{{ $permits->count() }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning"><i class="bi bi-shield-exclamation"></i></div>
                <div>
                    <div class="text-muted small">Révision requise</div>
                    <div class="fw-bold fs-4">{{ $permits->where('technical_review_required', true)->count() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom">
        <h6 class="mb-0 fw-bold">Dossiers en attente de révision technique</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Référence</th>
                        <th>Citoyen</th>
                        <th>Type</th>
                        <th>Surface</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permits as $permit)
                        <tr>
                            <td class="fw-medium">{{ $permit->reference_number }}</td>
                            <td>{{ $permit->citizen?->prenom }} {{ $permit->citizen?->nom }}</td>
                            <td><span class="badge bg-light text-dark">{{ $permit->permitType?->nom }}</span></td>
                            <td>{{ $permit->surface }} m²</td>
                            <td>
                                <span class="badge-status" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                            <td><a href="{{ route('citizen.permits.show', $permit->id) }}" class="btn btn-sm btn-navy">Réviser</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">Aucun dossier à réviser.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
