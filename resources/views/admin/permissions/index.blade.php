@extends('layouts.app')
@section('title', 'Gestion des Permissions')
@section('page-title', 'Permissions')

@section('content')
<div class="space-y-6">
    <div class="flex justify-end">
        <a href="{{ route('admin.permissions.create') }}" class="inline-flex items-center rounded-lg bg-navy-800 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-navy-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            Nouvelle permission
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôles associés</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($permissions as $permission)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-navy-800">{{ $permission->nom }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($permission->description, 50) ?? '—' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @forelse ($permission->roles as $role)
                                        <span class="inline-flex items-center rounded-full bg-gold-50 px-2 py-0.5 text-xs font-medium text-gold-800">{{ $role->nom }}</span>
                                    @empty
                                        <span class="text-xs text-gray-400">Aucun</span>
                                    @endforelse
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.permissions.edit', $permission) }}" class="text-navy-800 hover:text-gold-600 font-medium">Modifier</a>
                                    <form method="POST" action="{{ route('admin.permissions.destroy', $permission) }}" onsubmit="return confirm('Supprimer ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-sm text-gray-500">Aucune permission.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
