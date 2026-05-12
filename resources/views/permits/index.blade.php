@extends('layouts.app')
@section('title', 'Mes Permis')
@section('page-title', 'Dossiers de Permis')

@section('content')
<div class="space-y-6">
    {{-- Filter / actions header --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        @if(isset($statuses))
            <form method="GET" class="flex items-center gap-3">
                <select name="status" onchange="this.form.submit()" class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none">
                    <option value="">Tous les statuts</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status->nom }}" {{ request('status') === $status->nom ? 'selected' : '' }}>{{ $status->nom }}</option>
                    @endforeach
                </select>
            </form>
        @else
            <div></div>
        @endif

        @if(auth()->user()->isCitoyen())
            <a href="{{ route('citizen.permits.create') }}" class="inline-flex items-center rounded-lg bg-navy-800 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-navy-700 transition">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                Nouvelle demande
            </a>
        @endif
    </div>

    {{-- Table --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Référence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Projet</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($permits as $permit)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-navy-800">{{ $permit->reference_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ Str::limit($permit->project_title, 35) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permit->permitType?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                                    {{ $permit->status?->nom }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permit->submitted_at?->format('d/m/Y') ?? $permit->created_at->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('citizen.permits.show', $permit->id) }}" class="text-navy-800 hover:text-gold-600 font-medium">Voir détails</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">
                                Aucun dossier trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($permits->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">{{ $permits->links() }}</div>
        @endif
    </div>
</div>
@endsection
