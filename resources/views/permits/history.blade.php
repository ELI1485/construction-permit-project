@extends('layouts.app')

@section('title', 'Date de commande')

@section('content')
<div class="mb-8 flex items-center gap-4">
    <a href="javascript:history.back()" class="p-2 text-slate-400 hover:text-slate-600 bg-white rounded-lg border border-slate-200 shadow-sm transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </a>
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">Historique de la commande #REQ-2026-001</h1>
        <p class="text-slate-500 text-sm">Suivre toutes les modifications et actions apportées à ce fichier.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
    <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-slate-200 before:via-slate-200 before:to-transparent">
        
        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-slate-500 shrink-0 z-10 border-4 border-slate-100 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
            </div>
            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] pr-4 md:pr-0 md:pl-4 text-right">
                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-bold text-slate-800">Modifier la charte d'ingénierie</h4>
                        <time class="text-xs font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded">aujourd'hui, 10:30 p</time>
                    </div>
                    <p class="text-sm text-slate-600">Il s'est levé <span class="font-bold">Ahmed Al-Muhandis</span> En téléchargeant une version modifiée du plan architectural en réponse aux commentaires du comité.</p>
                </div>
            </div>
        </div>

        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-amber-500 shrink-0 z-10 border-4 border-amber-100 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] pr-4 md:pr-0 md:pl-4 text-right">
                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-bold text-slate-800">Exprimer les commentaires du comité</h4>
                        <time class="text-xs text-slate-400">12 Peut 2026</time>
                    </div>
                    <p class="text-sm text-slate-600">Les notes ont été enregistrées par <span class="font-bold">Comité de reconstruction</span> Concernant l'avant.</p>
                </div>
            </div>
        </div>

        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-green-500 shrink-0 z-10 border-4 border-green-100 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] pr-4 md:pr-0 md:pl-4 text-right">
                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-bold text-slate-800">Soumettre la candidature</h4>
                        <time class="text-xs text-slate-400">11 Peut 2026</time>
                    </div>
                    <p class="text-sm text-slate-600">La candidature originale a été soumise avec succès via le portail en ligne.</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
