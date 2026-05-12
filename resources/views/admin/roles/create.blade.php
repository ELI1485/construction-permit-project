@extends('layouts.app')
@section('title', 'Créer un Rôle')
@section('page-title', 'Nouveau Rôle')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label fw-medium">Nom du rôle <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required placeholder="ex: superviseur">
                        @error('nom') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary">Annuler</a>
                        <button type="submit" class="btn btn-navy">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
