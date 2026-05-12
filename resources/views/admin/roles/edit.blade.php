@extends('layouts.app')
@section('title', 'Modifier le Rôle')
@section('page-title', 'Modifier: ' . ucfirst(str_replace('_', ' ', $role->nom)))

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <!-- Edit Name -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Informations</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label for="nom" class="form-label fw-medium">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $role->nom) }}" required>
                        @error('nom') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-navy">Mettre à jour</button>
                </form>
            </div>
        </div>

        <!-- Permissions -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Permissions</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.roles.permissions.sync', $role) }}">
                    @csrf
                    <div class="row g-2">
                        @foreach ($permissions as $perm)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permission_ids[]" value="{{ $perm->id }}" id="perm_{{ $perm->id }}" {{ $role->permissions->contains($perm->id) ? 'checked' : '' }}>
                                    <label class="form-check-label small" for="perm_{{ $perm->id }}">{{ $perm->nom }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-gold mt-3">Synchroniser les permissions</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
