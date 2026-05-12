@extends('layouts.app')
@section('title', 'Nouvelle Demande de Permis')
@section('page-title', 'Nouvelle Demande')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-base font-semibold text-navy-800">Soumettre une demande de permis de construire</h3>
            <p class="text-sm text-gray-500 mt-1">Remplissez tous les champs obligatoires et joignez les documents nécessaires.</p>
        </div>

        <form method="POST" action="{{ route('citizen.permits.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                {{-- Permit type --}}
                <div>
                    <label for="permit_type_id" class="block text-sm font-medium text-gray-700 mb-1">Type de permis <span class="text-red-500">*</span></label>
                    <select id="permit_type_id" name="permit_type_id" required
                        class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none sm:text-sm">
                        <option value="">Sélectionner...</option>
                        @foreach ($permitTypes as $type)
                            <option value="{{ $type->id }}" {{ old('permit_type_id') == $type->id ? 'selected' : '' }}>{{ $type->nom }}</option>
                        @endforeach
                    </select>
                    @error('permit_type_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- District --}}
                <div>
                    <label for="district_id" class="block text-sm font-medium text-gray-700 mb-1">District <span class="text-red-500">*</span></label>
                    <select id="district_id" name="district_id" required
                        class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none sm:text-sm">
                        <option value="">Sélectionner...</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->nom }}</option>
                        @endforeach
                    </select>
                    @error('district_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Project title --}}
            <div>
                <label for="project_title" class="block text-sm font-medium text-gray-700 mb-1">Titre du projet <span class="text-red-500">*</span></label>
                <input type="text" id="project_title" name="project_title" value="{{ old('project_title') }}" required
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none sm:text-sm"
                    placeholder="Ex: Construction d'une villa R+1">
                @error('project_title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Address --}}
            <div>
                <label for="project_address" class="block text-sm font-medium text-gray-700 mb-1">Adresse du projet <span class="text-red-500">*</span></label>
                <textarea id="project_address" name="project_address" rows="2" required
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none sm:text-sm"
                    placeholder="Adresse complète du terrain">{{ old('project_address') }}</textarea>
                @error('project_address') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Surface --}}
            <div class="max-w-xs">
                <label for="surface" class="block text-sm font-medium text-gray-700 mb-1">Surface (m²) <span class="text-red-500">*</span></label>
                <input type="number" id="surface" name="surface" value="{{ old('surface') }}" required min="1" step="0.01"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none sm:text-sm"
                    placeholder="150">
                @error('surface') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Documents --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Documents (PDF, JPG, PNG)</label>
                <div class="mt-1 flex justify-center rounded-lg border-2 border-dashed border-gray-300 px-6 py-8 hover:border-navy-400 transition">
                    <div class="text-center">
                        <svg class="mx-auto h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"/></svg>
                        <div class="mt-3">
                            <label for="documents" class="cursor-pointer rounded-md font-semibold text-navy-800 hover:text-gold-600">
                                <span>Choisir des fichiers</span>
                                <input id="documents" name="documents[]" type="file" class="sr-only" multiple accept=".pdf,.jpg,.jpeg,.png">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">PDF, JPG, PNG jusqu'à 10MB</p>
                    </div>
                </div>
                @error('documents.*') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Submit --}}
            <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                <a href="{{ route('citizen.permits') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Annuler</a>
                <button type="submit" class="inline-flex items-center rounded-lg bg-navy-800 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-navy-700 transition">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                    Soumettre la demande
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
