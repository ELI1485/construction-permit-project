@extends('layouts.app')
@section('title', 'Tableau de bord — Architecte')
@section('page-title', 'Dossiers Assignés')

@section('content')
<div class="space-y-6">
    {{-- Stats --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-navy-800 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5M3.75 3v18m16.5-18v18M5.25 3h13.5M5.25 21V6m13.5 15V6M8.25 9h1.5m-1.5 3h1.5m-1.5 3h1.5m4.5-6h1.5m-1.5 3h1.5m-1.5 3h1.5"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Total Dossiers</p>
                    <p class="text-2xl font-bold text-navy-800">{{ $permits->total() }}</p>
                </div>
            </div>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-gold-500 p-3">
                    <svg class="h-6 w-6 text-navy-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">En cours</p>
                    <p class="text-2xl font-bold text-gold-600">{{ $permits->where('status.nom', '!=', 'Archivé')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Permits list --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Dossiers assignés</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Référence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Citoyen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Projet</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($permits as $permit)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-navy-800">{{ $permit->reference_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $permit->citizen?->prenom }} {{ $permit->citizen?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ Str::limit($permit->project_title, 30) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permit->permitType?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">Aucun dossier assigné.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($permits->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">{{ $permits->links() }}</div>
        @endif
    </div>
</div>
@endsection
