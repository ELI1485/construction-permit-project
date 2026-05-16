@extends('layouts.app')

@section('title', 'Liste des licences - Ma licence')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 mb-1">Gestion des licences</h1>
            <p class="text-slate-500 text-sm">Consultez et gérez toutes les demandes de licence soumises via la plateforme.</p>
        </div>
        @if(auth()->user()?->isCitoyen() || auth()->user()?->isArchitecte())
        <a href="{{ route('permits.create') }}"
           class="inline-flex items-center gap-2 bg-[#006399] text-white px-5 py-2.5 rounded-xl font-bold hover:bg-[#005180] transition-colors shadow-md shadow-blue-200 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Soumettre une nouvelle candidature
        </a>
        @endif
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        {{-- Filter Bar --}}
        <div class="p-4 border-b border-slate-100 flex flex-wrap gap-3">
            <div class="relative flex-1 min-w-[200px] max-w-sm">
                <input type="text" id="searchInput" placeholder="Recherche par numéro de dossier ou titre..."
                       class="w-full pr-10 pl-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm">
                <svg class="w-4 h-4 text-slate-400 absolute right-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select id="statusFilter" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399]">
                <option value="">Tous les cas</option>
                <option value="Soumis">Déposé</option>
                <option value="En cours">À l'étude</option>
                <option value="Validé">acceptable</option>
                <option value="Refusé">inacceptable</option>
            </select>
        </div>

        {{-- Table --}}
        @if(isset($permits) && $permits->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-right text-sm" id="permitsTable">
                    <thead class="bg-slate-50 text-slate-500 border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4 font-medium">Numéro de référence</th>
                            <th class="px-6 py-4 font-medium">demandeur</th>
                            <th class="px-6 py-4 font-medium">Type de licence</th>
                            <th class="px-6 py-4 font-medium">Zone</th>
                            <th class="px-6 py-4 font-medium">Date de dépôt</th>
                            <th class="px-6 py-4 font-medium">l'état</th>
                            <th class="px-6 py-4 font-medium text-center">procédures</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($permits as $permit)
                        <tr class="hover:bg-slate-50/50 transition-colors permit-row">
                            <td class="px-6 py-4 font-bold text-[#006399]">{{ $permit->reference_number }}</td>
                            <td class="px-6 py-4 text-slate-700">
                                {{ $permit->citizen?->nom }} {{ $permit->citizen?->prenom }}
                            </td>
                            <td class="px-6 py-4 text-slate-600">{{ $permit->permitType?->nom ?? '—' }}</td>
                            <td class="px-6 py-4 text-slate-500 text-xs">{{ $permit->district?->nom ?? '—' }}</td>
                            <td class="px-6 py-4 text-slate-500 text-xs">{{ $permit->created_at?->format('d/m/Y') ?? '—' }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColors = [
                                        'Soumis' => 'bg-blue-50 text-blue-600 border-blue-200',
                                        "En cours d'étude" => 'bg-amber-50 text-amber-600 border-amber-200',
                                        'Validé techniquement' => 'bg-teal-50 text-teal-600 border-teal-200',
                                        'Validé administrativement' => 'bg-emerald-50 text-emerald-600 border-emerald-200',
                                        'Refusé' => 'bg-red-50 text-red-600 border-red-200',
                                        'Documents complémentaires demandés' => 'bg-orange-50 text-orange-600 border-orange-200',
                                        'Brouillon' => 'bg-slate-100 text-slate-500 border-slate-200',
                                        'Archivé' => 'bg-slate-100 text-slate-500 border-slate-200',
                                    ];
                                    $statusClass = $statusColors[$permit->status?->nom] ?? 'bg-slate-100 text-slate-600 border-slate-200';
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold border {{ $statusClass }}">
                                    <span class="w-1.5 h-1.5 rounded-full" style="background-color: {{ $permit->status?->couleur ?? '#6c757d' }}"></span>
                                    {{ $permit->status?->nom ?? '—' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('permits.show', $permit->id) }}"
                                   class="inline-flex items-center gap-1 p-2 text-[#006399] hover:bg-blue-50 rounded-lg transition-colors" title="Afficher les détails">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100">
                {{ $permits->links() }}
            </div>
        @else
            <div class="p-16 text-center text-slate-400 space-y-4">
                <svg class="w-14 h-14 mx-auto stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <p class="font-medium text-lg">Il n'y a actuellement aucune demande de licence</p>
                @if(auth()->user()?->isCitoyen())
                <a href="{{ route('permits.create') }}" class="inline-block text-sm text-[#006399] font-bold underline hover:text-blue-800">Commencez par soumettre votre première candidature</a>
                @endif
            </div>
        @endif
    </div>

</div>
@endsection
