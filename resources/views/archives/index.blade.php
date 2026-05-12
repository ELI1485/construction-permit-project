@extends('layouts.app')
@section('title', 'Archives')
@section('page-title', 'Dossiers Archivés')

@section('content')
<div class="space-y-6">
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Référence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Citoyen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivé par</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Raison</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($archives as $archive)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-navy-800">{{ $archive->permit?->reference_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $archive->permit?->citizen?->prenom }} {{ $archive->permit?->citizen?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $archive->permit?->permitType?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $archive->archivedBy?->prenom }} {{ $archive->archivedBy?->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $archive->archive_date?->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($archive->archive_reason, 40) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">Aucune archive.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($archives->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">{{ $archives->links() }}</div>
        @endif
    </div>
</div>
@endsection
