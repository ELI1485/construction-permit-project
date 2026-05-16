@extends('layouts.app')

@section('title', 'Inspections sur le terrain')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">Inspections sur le terrain</h1>
        <p class="text-slate-500 text-sm">Programmation et suivi des comités de suivi et d'inspection des chantiers.</p>
    </div>
    <a href="#" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Planifier un nouvel aperçu
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-right text-sm">
            <thead class="bg-slate-50 text-slate-500 border-b border-slate-100">
                <tr>
                    <th class="px-6 py-4 font-medium">numéro de commande</th>
                    <th class="px-6 py-4 font-medium">le site</th>
                    <th class="px-6 py-4 font-medium">Date de contrôle</th>
                    <th class="px-6 py-4 font-medium">Le comité désigné</th>
                    <th class="px-6 py-4 font-medium">l'état</th>
                    <th class="px-6 py-4 font-medium text-center">Rapport d'inspection</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-800">#REQ-2026-001</td>
                    <td class="px-6 py-4 text-slate-600">Rue Hassan II, Casablanca</td>
                    <td class="px-6 py-4 text-slate-600">18 Peut 2026</td>
                    <td class="px-6 py-4 text-slate-600">Comité régional de suivi</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-600 border border-amber-200">
                            Programmé
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button class="text-sm text-slate-400 font-medium bg-slate-50 px-3 py-1.5 rounded-lg cursor-not-allowed">
                            indisponible
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-800">#REQ-2026-005</td>
                    <td class="px-6 py-4 text-slate-600">Hashtag Al-Wefaq, Rabat</td>
                    <td class="px-6 py-4 text-slate-600">05 Peut 2026</td>
                    <td class="px-6 py-4 text-slate-600">Comité local de reconstruction</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-600 border border-green-200">
                            Aperçu terminé
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button class="text-sm text-blue-600 font-medium bg-blue-50 px-3 py-1.5 rounded-lg hover:bg-blue-100 transition-colors">
                            Afficher le rapport
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
