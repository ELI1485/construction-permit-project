@extends('layouts.app')

@section('title', 'Rapports')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">Rapports et statistiques détaillés</h1>
        <p class="text-slate-500 text-sm">Extraire les données de la plateforme et exporter les rapports.</p>
    </div>
    <button class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        Exporter le rapport
    </button>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
    <div class="max-w-2xl mx-auto space-y-6">
        <div class="space-y-2">
            <label class="block text-sm font-bold text-slate-700">Type de rapport</label>
            <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                <option value="">Rapport sur les licences accordées</option>
                <option value="">Rapport sur les résultats financiers</option>
                <option value="">Rapport sur les délais de traitement</option>
                <option value="">Rapport d'inspection et d'infractions</option>
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">Date de début</label>
                <input type="date" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">Date de fin</label>
                <input type="date" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-bold text-slate-700">Format de fichier</label>
            <div class="flex gap-4">
                <label class="flex items-center gap-2">
                    <input type="radio" name="format" checked class="text-blue-600 focus:ring-blue-500">
                    <span>PDF</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="format" class="text-blue-600 focus:ring-blue-500">
                    <span>Excel (XLSX)</span>
                </label>
            </div>
        </div>
    </div>
</div>
@endsection
