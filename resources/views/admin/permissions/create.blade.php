@extends('layouts.app')
@section('title', 'Créer une Permission')
@section('page-title', 'Nouvelle Permission')

@section('content')
<div class="max-w-lg">
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <form method="POST" action="{{ route('admin.permissions.store') }}" class="p-6 space-y-5">
            @csrf
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom <span class="text-red-500">*</span></label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none sm:text-sm"
                    placeholder="ex: manage_users">
                @error('nom') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none sm:text-sm"
                    placeholder="Description optionnelle...">{{ old('description') }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.permissions.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Annuler</a>
                <button type="submit" class="rounded-lg bg-navy-800 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-navy-700 transition">Créer</button>
            </div>
        </form>
    </div>
</div>
@endsection
