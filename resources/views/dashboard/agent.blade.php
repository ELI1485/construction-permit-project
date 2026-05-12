@extends('layouts.app')
@section('title', 'Tableau de bord — Agent Urbanisme')
@section('page-title', 'Tableau de bord Agent')

@section('content')
<div class="space-y-6">
    {{-- Stats cards --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-gold-500 p-3">
                    <svg class="h-6 w-6 text-navy-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">En attente</p>
                    <p class="text-2xl font-bold text-gold-600">{{ $pending }}</p>
                </div>
            </div>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-red-600 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Haut risque</p>
                    <p class="text-2xl font-bold text-red-600">{{ $highRisk }}</p>
                </div>
            </div>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-navy-800 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Total récents</p>
                    <p class="text-2xl font-bold text-navy-800">{{ $recent->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent permits --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-base font-semibold text-navy-800">Dossiers récents</h3>
            <a href="{{ route('agent.permits') }}" class="text-sm text-gold-600 font-medium hover:text-gold-500">Voir tous</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Référence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Citoyen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Risque</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($recent as $permit)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-navy-800">{{ $permit->reference_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $permit->citizen?->prenom }} {{ $permit->citizen?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permit->permitType?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($permit->risk_level === 'High')
                                    <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Élevé</span>
                                @elseif($permit->risk_level === 'Medium')
                                    <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800">Moyen</span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Faible</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('citizen.permits.show', $permit->id) }}" class="text-navy-800 hover:text-gold-600 font-medium">Voir</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">Aucun dossier récent.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
