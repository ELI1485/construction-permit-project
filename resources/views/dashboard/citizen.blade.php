@extends('layouts.app')
@section('title', 'Tableau de bord — Citoyen')
@section('page-title', 'Tableau de bord')

@section('content')
<div class="space-y-6">
    {{-- Stats cards --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-navy-800 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Total Permis</p>
                    <p class="text-2xl font-bold text-navy-800">{{ $totalPermits }}</p>
                </div>
            </div>
        </div>
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
                <div class="flex-shrink-0 rounded-lg bg-green-600 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Approuvés</p>
                    <p class="text-2xl font-bold text-green-700">{{ $totalPermits - $pending }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick action --}}
    <div class="flex justify-end">
        <a href="{{ route('citizen.permits.create') }}" class="inline-flex items-center rounded-lg bg-navy-800 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-navy-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            Nouvelle demande
        </a>
    </div>

    {{-- Recent permits --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Derniers permis</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Référence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Projet</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($recentPermits as $permit)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('citizen.permits.show', $permit->id) }}" class="text-sm font-medium text-navy-800 hover:text-gold-600">{{ $permit->reference_number }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ Str::limit($permit->project_title, 30) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permit->permitType?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permit->submitted_at?->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">
                                <svg class="mx-auto h-10 w-10 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12H9.75m3 0h3m-3 0V15m-9-3.375c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013 16.125v-4.5z"/></svg>
                                Aucun permis pour le moment. <a href="{{ route('citizen.permits.create') }}" class="text-gold-600 font-medium hover:underline">Créer votre première demande</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
