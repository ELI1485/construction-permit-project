@extends('layouts.app')
@section('title', 'Archives')
@section('page-title', 'Dossiers Archivés')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Référence</th>
                        <th>Citoyen</th>
                        <th>Type</th>
                        <th>Archivé par</th>
                        <th>Date</th>
                        <th>Raison</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($archives as $archive)
                        <tr>
                            <td class="fw-medium">{{ $archive->permit?->reference_number }}</td>
                            <td>{{ $archive->permit?->citizen?->prenom }} {{ $archive->permit?->citizen?->nom }}</td>
                            <td><span class="badge bg-light text-dark">{{ $archive->permit?->permitType?->nom }}</span></td>
                            <td>{{ $archive->archivedBy?->prenom }} {{ $archive->archivedBy?->nom }}</td>
                            <td class="text-muted small">{{ $archive->archive_date?->format('d/m/Y') }}</td>
                            <td class="small">{{ Str::limit($archive->archive_reason, 40) }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-4 text-muted">Aucune archive.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if ($archives->hasPages())
        <div class="card-footer bg-white">{{ $archives->links() }}</div>
    @endif
</div>
@endsection
