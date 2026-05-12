@extends('layouts.app')
@section('title', 'Modifier le Rôle')
@section('page-title', 'Modifier: ' . ucfirst(str_replace('_', ' ', $role->nom)))

@section('content')
<div class="max-w-2xl space-y-6">
    {{-- Edit name --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Informations du rôle</h3>
        </div>
        <form method="POST" action="{{ route('admin.roles.update', $role) }}" class="p-6 space-y-5">
            @csrf @method('PUT')
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $role->nom) }}" required
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none sm:text-sm">
                @error('nom') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="rounded-lg bg-navy-800 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-navy-700 transition">Mettre à jour</button>
            </div>
        </form>
    </div>

    {{-- Permissions sync --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Permissions</h3>
        </div>
        <form method="POST" action="{{ route('admin.roles.permissions.sync', $role) }}" class="p-6">
            @csrf
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @foreach ($permissions as $perm)
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="permission_ids[]" value="{{ $perm->id }}" {{ $role->permissions->contains($perm->id) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-gray-300 text-navy-800 focus:ring-navy-800">
                        <span class="text-sm text-gray-700">{{ $perm->nom }}</span>
                    </label>
                @endforeach
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit" class="rounded-lg bg-gold-500 px-5 py-2.5 text-sm font-bold text-navy-900 shadow-sm hover:bg-gold-400 transition">Synchroniser</button>
            </div>
        </form>
    </div>
</div>
@endsection
