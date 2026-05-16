@extends('layouts.app')

@section('title', 'Détails de la licence #{{ $permit->reference_number }} - Mon permis')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('permits.index') }}"
               class="p-2 text-slate-400 hover:text-slate-600 bg-white rounded-xl border border-slate-200 shadow-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <div>
                <div class="flex items-center gap-3 mb-1 flex-wrap">
                    <h1 class="text-xl font-extrabold text-slate-800">Composer le numéro {{ $permit->reference_number }}</h1>
                    @php
                        $statusColors = [
                            'Soumis' => 'bg-blue-50 text-blue-600 border-blue-200',
                            "En cours d'étude" => 'bg-amber-50 text-amber-600 border-amber-200',
                            'Validé techniquement' => 'bg-teal-50 text-teal-600 border-teal-200',
                            'Validé administrativement' => 'bg-emerald-50 text-emerald-600 border-emerald-200',
                            'Refusé' => 'bg-red-50 text-red-600 border-red-200',
                            'Documents complémentaires demandés' => 'bg-orange-50 text-orange-600 border-orange-200',
                            'Brouillon' => 'bg-slate-100 text-slate-500 border-slate-200',
                        ];
                        $statusClass = $statusColors[$permit->status?->nom] ?? 'bg-slate-100 text-slate-600 border-slate-200';
                    @endphp
                    <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $statusClass }}">
                        {{ $permit->status?->nom ?? 'indéfini' }}
                    </span>
                </div>
                <p class="text-slate-500 text-sm">
                    Déposé le {{ $permit->submitted_at?->format('d/m/Y H:i') ?? $permit->created_at?->format('d/m/Y H:i') }}
                </p>
            </div>
        </div>
        <div class="flex gap-2 text-sm">
            <button onclick="window.print()"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-xl font-bold hover:bg-slate-50 transition-colors shadow-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                imprimer
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Main Info + Documents --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Basic Info --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h3 class="text-base font-bold text-slate-800 mb-5 pb-4 border-b border-slate-100">Informations de base pour la commande</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <span class="block text-xs text-slate-400 font-medium mb-1">Type de licence</span>
                        <span class="block text-slate-800 font-bold">{{ $permit->permitType?->nom ?? '—' }}</span>
                    </div>
                    <div>
                        <span class="block text-xs text-slate-400 font-medium mb-1">Le demandeur (Citoyen)</span>
                        <span class="block text-slate-800 font-bold">
                            {{ $permit->citizen?->nom }} {{ $permit->citizen?->prenom }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs text-slate-400 font-medium mb-1">Architecte</span>
                        <span class="block text-slate-800 font-bold">
                            {{ $permit->architect ? $permit->architect->nom . ' ' . $permit->architect->prenom : 'Pas encore nommé' }}
                        </span>
                    </div>
                    <div>
                        <span class="block text-xs text-slate-400 font-medium mb-1">Emploi / Territoire</span>
                        <span class="block text-slate-800 font-bold">{{ $permit->district?->nom ?? '—' }}</span>
                    </div>
                    <div>
                        <span class="block text-xs text-slate-400 font-medium mb-1">Titre du projet</span>
                        <span class="block text-slate-800 font-bold">{{ $permit->project_title }}</span>
                    </div>
                    <div>
                        <span class="block text-xs text-slate-400 font-medium mb-1">Superficie totale</span>
                        <span class="block text-slate-800 font-bold">{{ number_format($permit->surface) }} M²</span>
                    </div>
                    <div class="md:col-span-2">
                        <span class="block text-xs text-slate-400 font-medium mb-1">Détails de l'emplacement / Remarques</span>
                        <span class="block text-slate-700 text-sm leading-relaxed bg-slate-50 rounded-xl p-3">{{ $permit->project_address }}</span>
                    </div>
                    @if($permit->risk_score)
                    <div>
                        <span class="block text-xs text-slate-400 font-medium mb-1">Degré de risque (AI)</span>
                        <span class="block text-slate-800 font-bold">{{ $permit->risk_score }} —
                            @if($permit->risk_level === 'High')
                                <span class="text-red-500">Haut</span>
                            @elseif($permit->risk_level === 'Medium')
                                <span class="text-amber-500">Moyen</span>
                            @else
                                <span class="text-green-500">Faible</span>
                            @endif
                        </span>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Documents --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h3 class="text-base font-bold text-slate-800 mb-5 pb-4 border-b border-slate-100">Documents joints</h3>
                @if($permit->documents && $permit->documents->count() > 0)
                    <div class="space-y-3">
                        @foreach($permit->documents as $document)
                        <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-100 rounded-xl">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-red-100 text-red-600 flex items-center justify-center">
                                    <span class="text-xs font-bold uppercase">{{ pathinfo($document->file_name, PATHINFO_EXTENSION) }}</span>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-700 text-sm">{{ $document->documentType?->nom ?? $document->file_name }}</p>
                                    <p class="text-xs text-slate-400">Mis en ligne le {{ $document->uploaded_at?->format('d/m/Y') ?? '—' }}</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                               class="text-[#006399] hover:bg-blue-50 p-2 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            </a>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6 text-slate-400 text-sm">
                        <svg class="w-10 h-10 mx-auto mb-2 stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Aucun document n'a encore été téléchargé
                    </div>
                @endif
            </div>

        </div>

        {{-- Timeline Sidebar --}}
        <div class="space-y-6">

            {{-- Status Timeline --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h3 class="text-base font-bold text-slate-800 mb-6">Chemin de requête</h3>

                {{-- Rokhas.ma-style status steps --}}
                @php
                    $steps = [
                        ['label' => 'Soumettre la candidature', 'icon' => '📥', 'done' => true],
                        ['label' => 'Examen des documents', 'icon' => '📋', 'done' => in_array($permit->status?->nom, ["En cours d'étude", 'Validé techniquement', 'Validé administrativement'])],
                        ['label' => 'Évaluation technique', 'icon' => '🔧', 'done' => in_array($permit->status?->nom, ['Validé techniquement', 'Validé administrativement'])],
                        ['label' => 'Décision finale', 'icon' => '✅', 'done' => $permit->status?->nom === 'Validé administrativement'],
                    ];
                @endphp

                <div class="space-y-4 relative">
                    <div class="absolute right-3.5 top-4 bottom-4 w-0.5 bg-slate-100"></div>
                    @foreach($steps as $index => $step)
                    <div class="flex items-start gap-4 relative">
                        <div class="w-7 h-7 rounded-full shrink-0 flex items-center justify-center border-2 z-10 text-xs
                            {{ $step['done'] ? 'bg-[#006399] border-[#006399] text-white' : 'bg-white border-slate-300 text-slate-300' }}">
                            @if($step['done'])
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            @else
                                {{ $index + 1 }}
                            @endif
                        </div>
                        <div class="flex-1 pt-0.5">
                            <p class="text-sm font-bold {{ $step['done'] ? 'text-slate-800' : 'text-slate-400' }}">
                                {{ $step['label'] }}
                            </p>
                            @if($index === 0 && $permit->submitted_at)
                                <p class="text-xs text-slate-400 mt-0.5">{{ $permit->submitted_at->format('d/m/Y H:i') }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- History --}}
            @if(isset($permit->histories) && $permit->histories->count() > 0)
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h3 class="text-base font-bold text-slate-800 mb-4">Enregistrer les modifications</h3>
                <div class="space-y-3">
                    @foreach($permit->histories->sortByDesc('changed_at') as $history)
                    <div class="flex gap-3">
                        <div class="w-2 h-2 rounded-full bg-[#006399] mt-2 shrink-0"></div>
                        <div>
                            <p class="text-xs font-bold text-slate-700">
                                {{ $history->oldStatus?->nom ?? 'le début' }} ← {{ $history->newStatus?->nom }}
                            </p>
                            <p class="text-xs text-slate-400 mt-0.5">{{ $history->changed_at?->format('d/m/Y H:i') }}</p>
                            @if($history->commentaire)
                                <p class="text-xs text-slate-500 mt-1 bg-slate-50 p-2 rounded-lg">{{ $history->commentaire }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>

</div>
@endsection
