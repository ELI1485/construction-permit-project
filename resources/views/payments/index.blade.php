@extends('layouts.app')

@section('title', 'Frais et cotisations')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">Frais et cotisations</h1>
        <p class="text-slate-500 text-sm">Suivi des factures et des frais des demandes de licence.</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <p class="text-slate-500 text-sm font-medium mb-1">Revenu total</p>
        <h3 class="text-2xl font-bold text-slate-800">124,500 <span class="text-sm font-normal text-slate-500">Dirham</span></h3>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <p class="text-slate-500 text-sm font-medium mb-1">Factures en attente de paiement</p>
        <h3 class="text-2xl font-bold text-slate-800">12 <span class="text-sm font-normal text-slate-500">facture</span></h3>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <p class="text-slate-500 text-sm font-medium mb-1">Frais de retard</p>
        <h3 class="text-2xl font-bold text-red-600">3 <span class="text-sm font-normal text-red-400">Factures</span></h3>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-right text-sm">
            <thead class="bg-slate-50 text-slate-500 border-b border-slate-100">
                <tr>
                    <th class="px-6 py-4 font-medium">Numéro de facture</th>
                    <th class="px-6 py-4 font-medium">Numéro de commande associé</th>
                    <th class="px-6 py-4 font-medium">Montant</th>
                    <th class="px-6 py-4 font-medium">Date de sortie</th>
                    <th class="px-6 py-4 font-medium">l'état</th>
                    <th class="px-6 py-4 font-medium text-center">Options de performances</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-800">#INV-00120</td>
                    <td class="px-6 py-4 text-blue-600">#REQ-2026-001</td>
                    <td class="px-6 py-4 font-bold text-slate-800">2,500 Dirham</td>
                    <td class="px-6 py-4 text-slate-500">11 Peut 2026</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-600 border border-amber-200">
                            En attendant de performer
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center flex justify-center gap-2">
                        <button class="p-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors" title="Paiement électronique">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-800">#INV-00118</td>
                    <td class="px-6 py-4 text-blue-600">#REQ-2026-005</td>
                    <td class="px-6 py-4 font-bold text-slate-800">1,200 Dirham</td>
                    <td class="px-6 py-4 text-slate-500">01 Peut 2026</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-600 border border-green-200">
                            Performance réalisée
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button class="p-2 text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200 transition-colors" title="Téléchargez le reçu">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
