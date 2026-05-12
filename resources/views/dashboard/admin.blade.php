@extends('layouts.app')
@section('title', 'Tableau de bord — Administration')
@section('page-title', 'Administration')

@section('content')
<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary"><i class="bi bi-people"></i></div>
                <div>
                    <div class="text-muted small">Utilisateurs</div>
                    <div class="fw-bold fs-4">{{ $totalUsers }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning"><i class="bi bi-file-earmark-text"></i></div>
                <div>
                    <div class="text-muted small">Total Permis</div>
                    <div class="fw-bold fs-4">{{ $totalPermits }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-danger bg-opacity-10 text-danger"><i class="bi bi-exclamation-triangle"></i></div>
                <div>
                    <div class="text-muted small">Haut Risque</div>
                    <div class="fw-bold fs-4">{{ $highRisk }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-success bg-opacity-10 text-success"><i class="bi bi-graph-up"></i></div>
                <div>
                    <div class="text-muted small">Statuts</div>
                    <div class="fw-bold fs-4">{{ $byStatus->count() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Status Distribution Chart -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h6 class="mb-0 fw-bold">Répartition par statut</h6>
            </div>
            <div class="card-body">
                <canvas id="statusChart" height="250"></canvas>
            </div>
        </div>
    </div>
    <!-- Quick Links -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom">
                <h6 class="mb-0 fw-bold">Accès rapide</h6>
            </div>
            <div class="card-body d-flex flex-column gap-2">
                <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary text-start d-flex align-items-center gap-2">
                    <i class="bi bi-people"></i> Gérer les utilisateurs
                </a>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary text-start d-flex align-items-center gap-2">
                    <i class="bi bi-shield-check"></i> Gérer les rôles
                </a>
                <a href="{{ route('admin.statistics') }}" class="btn btn-outline-secondary text-start d-flex align-items-center gap-2">
                    <i class="bi bi-bar-chart-line"></i> Statistiques détaillées
                </a>
                <a href="{{ route('admin.archives') }}" class="btn btn-outline-secondary text-start d-flex align-items-center gap-2">
                    <i class="bi bi-archive"></i> Consulter les archives
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Status Progress Bars -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom">
        <h6 class="mb-0 fw-bold">Détail des statuts</h6>
    </div>
    <div class="card-body">
        @foreach ($byStatus as $status)
            @php $pct = $totalPermits > 0 ? round(($status->permits_count / $totalPermits) * 100) : 0; @endphp
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-1">
                    <span class="small fw-medium">{{ $status->nom }}</span>
                    <span class="small text-muted">{{ $status->permits_count }} ({{ $pct }}%)</span>
                </div>
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: {{ $pct }}%; background-color: {{ $status->couleur }};" aria-valuenow="{{ $pct }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('statusChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($byStatus->pluck('nom')) !!},
            datasets: [{
                data: {!! json_encode($byStatus->pluck('permits_count')) !!},
                backgroundColor: {!! json_encode($byStatus->pluck('couleur')) !!},
                borderWidth: 2,
                borderColor: '#fff',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { padding: 20, usePointStyle: true } }
            }
        }
    });
</script>
@endpush
