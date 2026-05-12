@extends('layouts.app')
@section('title', 'Statistiques')
@section('page-title', 'Statistiques')

@section('content')
<div class="space-y-6">
    {{-- Summary cards --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <p class="text-sm font-medium text-gray-500">Utilisateurs</p>
            <p class="text-3xl font-bold text-navy-800 mt-1">{{ $totalUsers }}</p>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <p class="text-sm font-medium text-gray-500">Total Permis</p>
            <p class="text-3xl font-bold text-gold-600 mt-1">{{ $totalPermits }}</p>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <p class="text-sm font-medium text-gray-500">Haut Risque</p>
            <p class="text-3xl font-bold text-red-600 mt-1">{{ $highRisk }}</p>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <p class="text-sm font-medium text-gray-500">En Attente</p>
            <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $pending }}</p>
        </div>
    </div>

    {{-- Status breakdown --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Répartition par statut</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @foreach ($byStatus as $status)
                    @php $pct = $totalPermits > 0 ? round(($status->permits_count / $totalPermits) * 100) : 0; @endphp
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">{{ $status->nom }}</span>
                            <span class="text-sm font-bold text-gray-900">{{ $status->permits_count }} <span class="text-gray-400 font-normal">({{ $pct }}%)</span></span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2.5">
                            <div class="h-2.5 rounded-full" style="width: {{ $pct }}%; background-color: {{ $status->couleur }};"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
