@extends('layouts.app')
@section('title', 'Gestion des Utilisateurs')
@section('page-title', 'Utilisateurs')

@section('content')
<div class="space-y-6">
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Liste des utilisateurs</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CIN</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">District</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-navy-800 text-white text-xs font-bold">
                                        {{ strtoupper(substr($user->prenom ?? 'U', 0, 1)) }}{{ strtoupper(substr($user->nom ?? '', 0, 1)) }}
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $user->prenom }} {{ $user->nom }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->cin }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form method="POST" action="/admin/users/{{ $user->id }}/role" class="flex items-center gap-2">
                                    @csrf
                                    <select name="role_id" onchange="this.form.submit()" class="rounded-md border border-gray-300 px-2 py-1 text-xs focus:border-navy-800 focus:ring-1 focus:ring-navy-800 focus:outline-none">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $role->nom)) }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->district?->nom ?? '—' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">—</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">Aucun utilisateur.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($users->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">{{ $users->links() }}</div>
        @endif
    </div>
</div>
@endsection
