@extends('layouts.app')

@section('title', 'Comité Technique - Ma Licence')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-extrabold text-slate-800 mb-1">Espace technique</h1>
        <p class="text-slate-500 text-sm">Examiner les aspects techniques et exprimer un avis technique sur les dossiers référés.</p>
    </div>

    {{-- Permits Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Dossiers nécessitant un avis technique</h3>
            <span class="text-xs font-bold px-3 py-1 rounded-full bg-amber-50 text-amber-600 border border-amber-200">{{ $permits->count() }} déposer</span>
        </div>

        @if($permits->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-right text-sm">
                    <thead class="bg-slate-50 text-slate-500 border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4 font-medium">Numéro de référence</th>
                            <th class="px-6 py-4 font-medium">Type de licence</th>
                            <th class="px-6 py-4 font-medium">Citoyen</th>
                            <th class="px-6 py-4 font-medium">Zone</th>
                            <th class="px-6 py-4 font-medium">Niveau de risque</th>
                            <th class="px-6 py-4 font-medium text-center">Exprimez votre opinion</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($permits as $permit)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-[#006399]">{{ $permit->reference_number }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $permit->permitType?->nom ?? '—' }}</td>
                            <td class="px-6 py-4 text-slate-700">{{ $permit->citizen?->nom }} {{ $permit->citizen?->prenom }}</td>
                            <td class="px-6 py-4 text-slate-500 text-xs">{{ $permit->district?->nom ?? '—' }}</td>
                            <td class="px-6 py-4">
                                @if($permit->risk_level === 'High')
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-200">Haut ⚠</span>
                                @elseif($permit->risk_level === 'Medium')
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-600 border border-amber-200">Moyen</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-200">Faible</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('permits.show', $permit->id) }}"
                                   class="inline-flex items-center gap-1 px-4 py-2 bg-[#006399] text-white rounded-lg text-xs font-bold hover:bg-[#005180] transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Revoir le dossier
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center text-slate-400 space-y-3">
                <svg class="w-12 h-12 mx-auto stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <p class="font-medium">Il n'y a aucun dossier qui nécessite actuellement un avis technique</p>
            </div>
        @endif
    </div>

</div>
@endsection
