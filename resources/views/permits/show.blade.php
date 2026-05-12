@extends('layouts.app')
@section('title', 'Détails du Permis')
@section('page-title', 'Dossier ' . $permit->reference_number)

@section('content')
<div class="space-y-6">
    {{-- Header info --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-navy-800">{{ $permit->project_title }}</h3>
                <p class="text-sm text-gray-500">Réf: {{ $permit->reference_number }}</p>
            </div>
            <span class="inline-flex items-center rounded-full px-3 py-1 text-sm font-medium" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                {{ $permit->status?->nom }}
            </span>
        </div>
        <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase">Type</p>
                <p class="mt-1 text-sm font-medium text-gray-900">{{ $permit->permitType?->nom }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase">Citoyen</p>
                <p class="mt-1 text-sm font-medium text-gray-900">{{ $permit->citizen?->prenom }} {{ $permit->citizen?->nom }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase">Surface</p>
                <p class="mt-1 text-sm font-medium text-gray-900">{{ $permit->surface }} m²</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase">Adresse</p>
                <p class="mt-1 text-sm font-medium text-gray-900">{{ $permit->project_address }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase">Date de soumission</p>
                <p class="mt-1 text-sm font-medium text-gray-900">{{ $permit->submitted_at?->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase">Niveau de risque</p>
                <p class="mt-1">
                    @if($permit->risk_level === 'High')
                        <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Élevé</span>
                    @elseif($permit->risk_level === 'Medium')
                        <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800">Moyen</span>
                    @else
                        <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">{{ $permit->risk_level ?? 'N/A' }}</span>
                    @endif
                </p>
            </div>
        </div>
    </div>


    {{-- Agent actions --}}
    @if(auth()->user()->isAgent())
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Actions Agent</h3>
        </div>
        <div class="p-6 flex flex-wrap gap-3">
            <form method="POST" action="/agent/permits/{{ $permit->id }}/validate" class="inline">
                @csrf
                <button type="submit" class="inline-flex items-center rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-700 transition">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                    Valider
                </button>
            </form>
            <form method="POST" action="/agent/permits/{{ $permit->id }}/reject" class="inline" x-data="{ showComment: false }">
                @csrf
                <button type="button" @click="showComment = !showComment" class="inline-flex items-center rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700 transition">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    Refuser
                </button>
                <div x-show="showComment" x-cloak class="mt-3 flex gap-2">
                    <input type="text" name="commentaire" placeholder="Motif du refus..." class="rounded-lg border border-gray-300 px-3 py-2 text-sm flex-1 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none">
                    <button type="submit" class="rounded-lg bg-red-600 px-3 py-2 text-sm text-white hover:bg-red-700">Confirmer</button>
                </div>
            </form>
            <form method="POST" action="/agent/permits/{{ $permit->id }}/request-docs" class="inline" x-data="{ showComment: false }">
                @csrf
                <button type="button" @click="showComment = !showComment" class="inline-flex items-center rounded-lg bg-yellow-500 px-4 py-2 text-sm font-semibold text-navy-900 hover:bg-yellow-400 transition">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    Demander docs
                </button>
                <div x-show="showComment" x-cloak class="mt-3 flex gap-2">
                    <input type="text" name="commentaire" placeholder="Documents requis..." class="rounded-lg border border-gray-300 px-3 py-2 text-sm flex-1 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none">
                    <button type="submit" class="rounded-lg bg-yellow-500 px-3 py-2 text-sm text-navy-900 hover:bg-yellow-400">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    {{-- Technical review form --}}
    @if(auth()->user()->isTechnical())
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Révision Technique</h3>
        </div>
        <form method="POST" action="/technical/permits/{{ $permit->id }}/review" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Conformité</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="conformite" value="1" class="h-4 w-4 text-navy-800 border-gray-300 focus:ring-navy-800">
                        <span class="text-sm text-gray-700">Conforme</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="conformite" value="0" class="h-4 w-4 text-red-600 border-gray-300 focus:ring-red-500">
                        <span class="text-sm text-gray-700">Non conforme</span>
                    </label>
                </div>
            </div>
            <div>
                <label for="remarque" class="block text-sm font-medium text-gray-700 mb-1">Remarques</label>
                <textarea id="remarque" name="remarque" rows="3" class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none sm:text-sm" placeholder="Observations techniques..."></textarea>
            </div>
            <button type="submit" class="inline-flex items-center rounded-lg bg-navy-800 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-navy-700 transition">Soumettre la révision</button>
        </form>
    </div>
    @endif


    {{-- Documents --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-base font-semibold text-navy-800">Documents</h3>
        </div>
        <div class="p-6">
            @if($permit->documents->count())
                <ul class="divide-y divide-gray-100">
                    @foreach($permit->documents as $doc)
                        <li class="flex items-center justify-between py-3">
                            <div class="flex items-center gap-3">
                                <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $doc->file_name }}</p>
                                    <p class="text-xs text-gray-500">Ajouté le {{ $doc->uploaded_at?->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="text-sm text-navy-800 hover:text-gold-600 font-medium">Télécharger</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-sm text-gray-500 text-center py-4">Aucun document joint.</p>
            @endif

            {{-- Upload form --}}
            @if(auth()->user()->isCitoyen())
                <form method="POST" action="/permits/{{ $permit->id }}/documents" enctype="multipart/form-data" class="mt-4 pt-4 border-t border-gray-100">
                    @csrf
                    <div class="flex items-center gap-3">
                        <input type="file" name="document" required class="block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-navy-50 file:text-navy-800 hover:file:bg-navy-100">
                        <button type="submit" class="rounded-lg bg-navy-800 px-4 py-2 text-sm font-semibold text-white hover:bg-navy-700 transition">Ajouter</button>
                    </div>
                </form>
            @endif
        </div>
    </div>

    {{-- History --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Historique</h3>
        </div>
        <div class="p-6">
            @if($permit->histories->count())
                <ol class="relative border-l-2 border-gray-200 ml-3 space-y-6">
                    @foreach($permit->histories->sortByDesc('changed_at') as $history)
                        <li class="ml-6">
                            <span class="absolute -left-2 flex h-4 w-4 items-center justify-center rounded-full bg-navy-800 ring-4 ring-white"></span>
                            <div class="flex items-center gap-2">
                                <time class="text-xs text-gray-500">{{ $history->changed_at?->format('d/m/Y H:i') }}</time>
                                <span class="text-xs text-gray-400">par {{ $history->changedBy?->prenom }} {{ $history->changedBy?->nom }}</span>
                            </div>
                            @if($history->commentaire)
                                <p class="mt-1 text-sm text-gray-700">{{ $history->commentaire }}</p>
                            @endif
                        </li>
                    @endforeach
                </ol>
            @else
                <p class="text-sm text-gray-500 text-center py-4">Aucun historique.</p>
            @endif
        </div>
    </div>
</div>
@endsection
