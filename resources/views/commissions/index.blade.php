@extends('layouts.app')

@section('title', 'Comités')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">Commissions d'étude de dossiers</h1>
        <p class="text-slate-500 text-sm">Programmation et suivi des commissions chargées des autorisations de diffusion.</p>
    </div>
    <a href="#" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Programmation d'un nouveau comité
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Commission Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <div class="flex justify-between items-start mb-4 border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-lg font-bold text-slate-800">Comité régional de reconstruction</h3>
                <p class="text-slate-500 text-sm">Réunion Non #45 - Préfecture de Casablanca</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-600 border border-blue-200">Programmé</span>
        </div>
        <div class="space-y-3 mb-6">
            <div class="flex items-center gap-3 text-slate-600 text-sm">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                jeudi 15 mai 2026 - 10:00 SUIS
            </div>
            <div class="flex items-center gap-3 text-slate-600 text-sm">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                Nombre de fichiers inclus: 12 déposer
            </div>
        </div>
        <div class="flex gap-2">
            <button class="flex-1 bg-slate-50 text-slate-700 py-2.5 rounded-lg font-medium hover:bg-slate-100 border border-slate-200 transition-colors text-sm">Procès-verbaux des commissions</button>
            <button class="flex-1 bg-blue-50 text-blue-700 py-2.5 rounded-lg font-medium hover:bg-blue-100 transition-colors text-sm">Gestion des fichiers</button>
        </div>
    </div>

    <!-- Commission Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <div class="flex justify-between items-start mb-4 border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-lg font-bold text-slate-800">Comité des petits projets</h3>
                <p class="text-slate-500 text-sm">Réunion Non #89 - District de Maârif</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-200">Fini</span>
        </div>
        <div class="space-y-3 mb-6">
            <div class="flex items-center gap-3 text-slate-600 text-sm">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Lundi 10 mai 2026 - 14:00 Dans la disparition
            </div>
            <div class="flex items-center gap-3 text-slate-600 text-sm">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                Nombre de fichiers inclus: 8 Fichiers
            </div>
        </div>
        <div class="flex gap-2">
            <button class="flex-1 bg-slate-50 text-slate-700 py-2.5 rounded-lg font-medium hover:bg-slate-100 border border-slate-200 transition-colors text-sm">Téléchargez le rapport final</button>
        </div>
    </div>
</div>
@endsection
