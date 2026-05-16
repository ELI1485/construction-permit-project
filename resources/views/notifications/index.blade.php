@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
<div class="mb-8 flex justify-between items-end">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">Notifications</h1>
        <p class="text-slate-500 text-sm">Suivez les dernières mises à jour sur vos commandes.</p>
    </div>
    <button class="text-sm text-blue-600 font-medium hover:text-blue-800 transition-colors">Marquer tout comme lu</button>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 divide-y divide-slate-100">
    <div class="p-6 flex gap-4 hover:bg-slate-50/50 transition-colors cursor-pointer relative">
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-12 bg-blue-600 rounded-r"></div>
        <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-600 flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <div class="flex-1">
            <div class="flex justify-between items-start mb-1">
                <h4 class="font-bold text-slate-800">Approbation de la licence commerciale</h4>
                <span class="text-xs text-slate-400 font-medium whitespace-nowrap">il y a 2 heures</span>
            </div>
            <p class="text-slate-600 text-sm">Numéro de demande de licence a été approuvé avec succès #REQ-2026-002. Vous pouvez maintenant télécharger le document.</p>
            <div class="mt-3">
                <button class="text-sm text-blue-600 font-medium bg-blue-50 px-4 py-1.5 rounded-lg hover:bg-blue-100 transition-colors inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Téléchargez la licence
                </button>
            </div>
        </div>
    </div>

    <div class="p-6 flex gap-4 hover:bg-slate-50/50 transition-colors cursor-pointer">
        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="flex-1">
            <div class="flex justify-between items-start mb-1">
                <h4 class="font-bold text-slate-800">Réception d'une nouvelle demande</h4>
                <span class="text-xs text-slate-400 font-medium whitespace-nowrap">il y a 1 jour</span>
            </div>
            <p class="text-slate-600 text-sm">Votre demande de licence a été reçue avec succès et est actuellement en cours d'examen initial.</p>
        </div>
    </div>
</div>
@endsection
