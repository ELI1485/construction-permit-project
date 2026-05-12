@extends('layouts.app')
@section('title', 'Tableau de bord — Service Technique')
@section('page-title', 'Révisions Techniques')

@section('content')
<div class="space-y-6">
    {{-- Stats --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-navy-800 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17l-5.384 3.183 1.03-5.996L2.12 7.58l6.02-.876L10.68 1.5l2.54 5.204 6.02.876-4.947 4.777 1.03 5.996L11.42 15.17z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Dossiers à réviser</p>
                    <p class="text-2xl font-bold text-navy-800">{{ $permits->count() }}</p>
                </div>
            </div>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-gold-500 p-3">
                    <svg class="h-6 w-6 text-navy-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Révision requise</p>
                    <p class="text-2xl font-bold text-gold-600">{{ $permits->where('technical_review_required', true)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Permits to review --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Dossiers en attente de révision technique</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Référence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Citoyen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Surface</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($permits as $permit)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-navy-800">{{ $permit->reference_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $permit->citizen?->prenom }} {{ $permit->citizen?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permit->permitType?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permit->surface }} m²</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('citizen.permits.show', $permit->id) }}" class="text-navy-800 hover:text-gold-600 font-medium">Réviser</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">Aucun dossier nécessitant une révision technique.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
