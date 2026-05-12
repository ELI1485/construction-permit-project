@extends('layouts.app')
@section('title', 'Tableau de bord — Architecte')
@section('page-title', 'Dossiers Assignés')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom">
        <h6 class="mb-0 fw-bold">Mes dossiers assignés</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="permitsTable">
                <thead class="table-light">
                    <tr>
                        <th>Référence</th>
                        <th>Citoyen</th>
                        <th>Projet</th>
                        <th>Type</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permits as $permit)
                        <tr>
                            <td class="fw-medium">{{ $permit->reference_number }}</td>
                            <td>{{ $permit->citizen?->prenom }} {{ $permit->citizen?->nom }}</td>
                            <td>{{ Str::limit($permit->project_title, 30) }}</td>
                            <td><span class="badge bg-light text-dark">{{ $permit->permitType?->nom }}</span></td>
                            <td>
                                <span class="badge-status" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-4 text-muted">Aucun dossier assigné.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if ($permits->hasPages())
        <div class="card-footer bg-white">{{ $permits->links() }}</div>
    @endif
</div>
@endsection
