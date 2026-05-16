@extends('layouts.app')

@section('title', 'archives')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-1">Archives centrales</h1>
        <p class="text-slate-500 text-sm">Accédez aux applications et licences anciennes et fermées.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 text-center">
        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-slate-800 mb-2">Il n'y a actuellement aucun fichier dans l'archive</h3>
        <p class="text-slate-500 max-w-md mx-auto">Toutes les commandes clôturées et expirées seront automatiquement déplacées vers cette page.
            Assurer sa conservation et sa référence en cas de besoin.</p>
    </div>
@endsection