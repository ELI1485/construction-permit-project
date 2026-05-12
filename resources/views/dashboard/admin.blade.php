@extends('layouts.app')
@section('title', 'Tableau de bord — Administration')
@section('page-title', 'Administration')

@section('content')
<div class="space-y-6">
    {{-- Stats cards --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-navy-800 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Utilisateurs</p>
                    <p class="text-2xl font-bold text-navy-800">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-gold-500 p-3">
                    <svg class="h-6 w-6 text-navy-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Total Permis</p>
                    <p class="text-2xl font-bold text-gold-600">{{ $totalPermits }}</p>
                </div>
            </div>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-red-600 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Haut risque</p>
                    <p class="text-2xl font-bold text-red-600">{{ $highRisk }}</p>
                </div>
            </div>
        </div>
        <div class="overflow-hidden rounded-xl bg-white px-4 py-5 shadow-sm border border-gray-100 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-lg bg-green-600 p-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500">Statuts</p>
                    <p class="text-2xl font-bold text-green-700">{{ $byStatus->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Status distribution --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Répartition par statut</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach ($byStatus as $status)
                    <div class="text-center p-4 rounded-lg border border-gray-100">
                        <div class="inline-flex items-center justify-center w-10 h-10 rounded-full mb-2" style="background-color: {{ $status->couleur }}20;">
                            <div class="w-3 h-3 rounded-full" style="background-color: {{ $status->couleur }};"></div>
                        </div>
                        <p class="text-2xl font-bold text-navy-800">{{ $status->permits_count }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $status->nom }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Quick links --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('admin.users') }}" class="flex items-center gap-4 bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:border-gold-300 transition">
            <div class="flex-shrink-0 rounded-lg bg-navy-50 p-3">
                <svg class="h-6 w-6 text-navy-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
            </div>
            <div>
                <p class="font-semibold text-navy-800">Utilisateurs</p>
                <p class="text-sm text-gray-500">Gérer les comptes</p>
            </div>
        </a>
        <a href="{{ route('admin.roles.index') }}" class="flex items-center gap-4 bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:border-gold-300 transition">
            <div class="flex-shrink-0 rounded-lg bg-navy-50 p-3">
                <svg class="h-6 w-6 text-navy-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
            </div>
            <div>
                <p class="font-semibold text-navy-800">Rôles</p>
                <p class="text-sm text-gray-500">Gérer les rôles</p>
            </div>
        </a>
        <a href="{{ route('admin.statistics') }}" class="flex items-center gap-4 bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:border-gold-300 transition">
            <div class="flex-shrink-0 rounded-lg bg-navy-50 p-3">
                <svg class="h-6 w-6 text-navy-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
            </div>
            <div>
                <p class="font-semibold text-navy-800">Statistiques</p>
                <p class="text-sm text-gray-500">Voir les rapports</p>
            </div>
        </a>
    </div>
</div>
@endsection
