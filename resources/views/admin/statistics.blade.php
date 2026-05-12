@extends('layouts.app')
@section('title', 'Statistiques')
@section('page-title', 'Statistiques & Analytics')

@section('content')
<!-- Summary Cards -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card"><div class="card-body text-center py-4">
            <div class="text-muted small text-uppercase">Utilisateurs</div>
            <div class="fw-bold fs-2 mt-1" style="color:var(--navy-800);">{{ $totalUsers }}</div>
        </div></div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card"><div class="card-body text-center py-4">
            <div class="text-muted small text-uppercase">Total Permis</div>
            <div class="fw-bold fs-2 mt-1 text-warning">{{ $totalPermits }}</div>
        </div></div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card"><div class="card-body text-center py-4">
            <div class="text-muted small text-uppercase">Haut Risque</div>
            <div class="fw-bold fs-2 mt-1 text-danger">{{ $highRisk }}</div>
        </div></div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card"><div class="card-body text-center py-4">
            <div class="text-muted small text-uppercase">En Attente</div>
            <div class="fw-bold fs-2 mt-1 text-info">{{ $pending }}</div>
        </div></div>
    </div>
</div>

<!-- Charts Row -->
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Répartition par statut</h6></div>
            <div class="card-body"><canvas id="pieChart" height="300"></canvas></div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Volume par statut</h6></div>
            <div class="card-body"><canvas id="barChart" height="300"></canvas></div>
        </div>
    </div>
</div>

<!-- Detailed Breakdown -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Détail complet</h6></div>
    <div class="card-body">
        @foreach ($byStatus as $status)
            @php $pct = $totalPermits > 0 ? round(($status->permits_count / $totalPermits) * 100) : 0; @endphp
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="rounded-circle" style="width:12px;height:12px;background:{{ $status->couleur }};flex-shrink:0;"></div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between">
                        <span class="small fw-medium">{{ $status->nom }}</span>
                        <span class="small text-muted">{{ $status->permits_count }} ({{ $pct }}%)</span>
                    </div>
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar" style="width: {{ $pct }}%; background-color: {{ $status->couleur }};"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
const labels = {!! json_encode($byStatus->pluck('nom')) !!};
const data = {!! json_encode($byStatus->pluck('permits_count')) !!};
const colors = {!! json_encode($byStatus->pluck('couleur')) !!};

new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: { labels, datasets: [{ data, backgroundColor: colors, borderWidth: 2, borderColor: '#fff' }] },
    options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
});

new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: { labels, datasets: [{ label: 'Nombre de permis', data, backgroundColor: colors, borderRadius: 4 }] },
    options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
});
</script>
@endpush
