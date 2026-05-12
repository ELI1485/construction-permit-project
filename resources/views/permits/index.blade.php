@extends('layouts.app')
@section('title', 'Mes Permis')
@section('page-title', 'Dossiers de Permis')

@section('content')
<!-- Filter & Actions -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    @if(isset($statuses))
        <form method="GET" class="d-flex align-items-center gap-2">
            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width:auto;">
                <option value="">Tous les statuts</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->nom }}" {{ request('status') === $status->nom ? 'selected' : '' }}>{{ $status->nom }}</option>
                @endforeach
            </select>
        </form>
    @else
        <div></div>
    @endif

    @if(auth()->user()->isCitoyen())
        <a href="{{ route('citizen.permits.create') }}" class="btn btn-navy">
            <i class="bi bi-plus-circle me-2"></i>Nouvelle demande
        </a>
    @endif
</div>

<!-- Permits Table -->
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="permitsTable">
                <thead class="table-light">
                    <tr>
                        <th>Référence</th>
                        <th>Projet</th>
                        <th>Type</th>
                        <th>Statut</th>
                        <th>Risque IA</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permits as $permit)
                        <tr>
                            <td class="fw-medium">{{ $permit->reference_number }}</td>
                            <td>{{ Str::limit($permit->project_title, 30) }}</td>
                            <td><span class="badge bg-light text-dark">{{ $permit->permitType?->nom }}</span></td>
                            <td>
                                <span class="badge-status" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                            <td>
                                @if($permit->risk_level === 'Critical')
                                    <span class="badge bg-danger">Critique</span>
                                @elseif($permit->risk_level === 'High')
                                    <span class="badge bg-danger">Élevé</span>
                                @elseif($permit->risk_level === 'Medium')
                                    <span class="badge bg-warning text-dark">Moyen</span>
                                @elseif($permit->risk_level)
                                    <span class="badge bg-success">Faible</span>
                                @else
                                    <span class="badge bg-secondary">N/A</span>
                                @endif
                            </td>
                            <td class="text-muted small">{{ $permit->submitted_at?->format('d/m/Y') ?? $permit->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('citizen.permits.show', $permit->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center py-5 text-muted">Aucun dossier trouvé.</td></tr>
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#permitsTable').DataTable({
            language: { url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json' },
            pageLength: 15,
            order: [[5, 'desc']],
            paging: false,
            info: false,
        });
    });
</script>
@endpush
