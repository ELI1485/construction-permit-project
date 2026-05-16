@extends('layouts.app')

@section('title', 'Paramètres')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800 mb-1">Paramètres système</h1>
    <p class="text-slate-500 text-sm">Configurer et personnaliser les options de la plateforme.</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden flex flex-col md:flex-row">
    <!-- Sidebar Settings -->
    <div class="w-full md:w-64 bg-slate-50 border-b md:border-b-0 md:border-l border-slate-100 p-4 space-y-1">
        <button class="w-full text-right px-4 py-2.5 rounded-lg bg-blue-100 text-blue-700 font-bold transition-colors">Paramètres généraux</button>
        <button class="w-full text-right px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 font-medium transition-colors">Paramètres de licence</button>
        <button class="w-full text-right px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 font-medium transition-colors">Paramètres du comité</button>
        <button class="w-full text-right px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 font-medium transition-colors">Gérer les documents requis</button>
    </div>

    <!-- Setting Content -->
    <div class="flex-1 p-8">
        <h3 class="text-lg font-bold text-slate-800 mb-6">Paramètres généraux</h3>
        
        <form class="space-y-6 max-w-lg">
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">Nom de la plateforme</label>
                <input type="text" value="Le guichet unique national des autorisations d'administration territoriale" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">E-mail d'assistance technique</label>
                <input type="email" value="support@rokhas.ma" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </div>

            <div class="flex items-center justify-between py-3 border-b border-slate-100">
                <div>
                    <h4 class="font-bold text-slate-700">Activer les notifications par e-mail</h4>
                    <p class="text-sm text-slate-500">Envoyer des notifications automatiques lorsque l'état du fichier change</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                </label>
            </div>

            <button type="button" class="px-6 py-2.5 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition-colors shadow-sm">Enregistrer les paramètres</button>
        </form>
    </div>
</div>
@endsection
