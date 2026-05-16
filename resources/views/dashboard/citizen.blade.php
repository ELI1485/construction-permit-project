@extends('layouts.app')

@section('title', 'Espace Citoyen - Ma Licence')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">
    
    <!-- Top Greeting Banner matching Rokhas.ma exact layout -->
    <div class="bg-gradient-to-l from-blue-50/50 via-white to-white rounded-3xl border border-blue-100/60 p-8 shadow-xs relative overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            
            <!-- Persona Illustration & Bubble -->
            <div class="flex flex-col items-center md:items-start text-center md:text-right md:w-1/3 relative z-10">
                <div class="bg-white px-6 py-3 rounded-2xl shadow-xs border border-blue-50 text-[#006399] font-bold text-lg mb-4 relative inline-block">
                    En tant que citoyen, je peux :
                    <!-- Callout Tail -->
                    <span class="absolute bottom-[-8px] left-1/2 transform -translate-x-1/2 md:left-8 w-4 h-4 bg-white border-b border-l border-blue-50 rotate-45"></span>
                </div>
                <!-- Premium High-Fidelity SVG Vector representing the user guide avatar -->
                <div class="w-32 h-32 rounded-full bg-gradient-to-tr from-blue-100 to-blue-50 flex items-center justify-center p-2 shadow-inner mx-auto md:mx-0 mt-2">
                    <svg class="w-24 h-24 text-[#006399]" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4.5" fill="#006399" opacity="0.2"/>
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="#006399"/>
                    </svg>
                </div>
            </div>

            <!-- Actionable Capabilities Checklist -->
            <div class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-4 text-slate-700">
                <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-blue-50/40 transition-colors">
                    <svg class="w-5 h-5 text-[#006399] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-sm font-medium leading-relaxed">Connaître les étapes pour obtenir une licence, les documents requis et les participants...</span>
                </div>
                
                <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-blue-50/40 transition-colors">
                    <svg class="w-5 h-5 text-[#006399] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-sm font-medium leading-relaxed">Déposer une demande numérique pour obtenir une licence dans le domaine de la construction ou le domaine économique</span>
                </div>

                <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-blue-50/40 transition-colors">
                    <svg class="w-5 h-5 text-[#006399] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-sm font-medium leading-relaxed">Suivez la progression de l'action sur la plateforme et recevez une notification à chaque étape importante</span>
                </div>

                <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-blue-50/40 transition-colors">
                    <svg class="w-5 h-5 text-[#006399] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-sm font-medium leading-relaxed">Explorez les portails géographiques des licences accordées dans un périmètre géographique spécifique</span>
                </div>

                <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-blue-50/40 transition-colors md:col-span-2">
                    <svg class="w-5 h-5 text-[#006399] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-sm font-medium leading-relaxed">Soumettre des expositions concernant des fichiers sous licence qui font l'objet d'une recherche sur les avantages et les inconvénients</span>
                </div>
            </div>

        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('permits.create') }}" class="group bg-[#006399] text-white rounded-2xl p-6 shadow-md shadow-blue-200 hover:bg-[#005180] transition-all flex items-center justify-between">
            <div class="space-y-1">
                <span class="block text-lg font-bold">Soumettre une nouvelle demande de licence</span>
                <span class="block text-xs text-blue-100">Déposer le dossier de permis de construire ou d'autorisation économique et joindre les documents requis</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </div>
        </a>

        <a href="{{ route('permits.index') }}" class="group bg-white border border-slate-200 rounded-2xl p-6 shadow-xs hover:border-[#006399] transition-all flex items-center justify-between">
            <div class="space-y-1">
                <span class="block text-lg font-bold text-[#006399]">Suivre mes commandes précédentes</span>
                <span class="block text-xs text-slate-500">Prévisualisez l'avancement du traitement des dossiers, des commissions tenues et de l'extraction des licences</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-[#006399] group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </div>
        </a>
    </div>

    <!-- Active Applications List Table -->
    <div class="bg-white rounded-2xl shadow-xs border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Mes fichiers actuels sont suivis</h3>
            <span class="text-xs font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-600">{{ $recentPermits->count() ?? 0 }} Demandes finales</span>
        </div>
        
        @if(isset($recentPermits) && $recentPermits->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-right border-collapse">
                    <thead>
                        <tr class="bg-slate-50 text-slate-400 text-xs font-bold border-b border-slate-100">
                            <th class="p-4">Numéro de dossier</th>
                            <th class="p-4">Type de licence</th>
                            <th class="p-4">Titre du projet</th>
                            <th class="p-4">Espace</th>
                            <th class="p-4">Date de dépôt</th>
                            <th class="p-4">l'état</th>
                            <th class="p-4 text-center">procédures</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-50">
                        @foreach($recentPermits as $permit)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="p-4 font-bold text-[#006399]">{{ $permit->reference_number ?? 'PC-'.rand(1000,9999) }}</td>
                                <td class="p-4 text-slate-700 font-medium">{{ $permit->permitType?->nom ?? $permit->permit_type ?? 'Permis de construire' }}</td>
                                <td class="p-4 text-slate-500 max-w-xs truncate">{{ $permit->project_address ?? 'indéfini' }}</td>
                                <td class="p-4 text-slate-600">{{ $permit->surface ?? 0 }} M²</td>
                                <td class="p-4 text-slate-500 text-xs">{{ $permit->created_at?->format('Y-m-d') ?? now()->format('Y-m-d') }}</td>
                                <td class="p-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold 
                                        @if(($permit->status?->nom ?? $permit->status) == 'Soumis' || ($permit->status?->nom ?? $permit->status) == 'submitted') bg-amber-50 text-amber-600 border border-amber-200/60
                                        @elseif(($permit->status?->nom ?? $permit->status) == 'Validé' || ($permit->status?->nom ?? $permit->status) == 'approved') bg-emerald-50 text-emerald-600 border border-emerald-200/60
                                        @else bg-blue-50 text-[#006399] border border-blue-200/60 @endif">
                                        {{ $permit->status?->nom ?? $permit->status ?? 'En cours' }}
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    <a href="{{ route('permits.show', $permit->id) }}" class="text-xs text-[#006399] hover:underline font-bold">Afficher les détails</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center text-slate-400 space-y-3">
                <svg class="w-12 h-12 mx-auto stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <p>Aucune demande de licence n'est actuellement enregistrée dans votre compte</p>
                <a href="{{ route('permits.create') }}" class="inline-block text-xs text-[#006399] font-bold underline hover:text-blue-800">Commencez à soumettre votre première candidature ici</a>
            </div>
        @endif
    </div>

</div>
@endsection
