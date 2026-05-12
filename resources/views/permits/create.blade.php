@extends('layouts.app')
@section('title', 'Nouvelle Demande de Permis')
@section('page-title', 'Nouvelle Demande')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h6 class="mb-0 fw-bold"><i class="bi bi-file-earmark-plus me-2"></i>Soumettre une demande de permis de construire</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('citizen.permits.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <!-- Permit Type -->
                        <div class="col-md-6">
                            <label for="permit_type_id" class="form-label fw-medium">Type de permis <span class="text-danger">*</span></label>
                            <select class="form-select" id="permit_type_id" name="permit_type_id" required>
                                <option value="">Sélectionner...</option>
                                @foreach ($permitTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('permit_type_id') == $type->id ? 'selected' : '' }}>{{ $type->nom }}</option>
                                @endforeach
                            </select>
                            @error('permit_type_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- District -->
                        <div class="col-md-6">
                            <label for="district_id" class="form-label fw-medium">District <span class="text-danger">*</span></label>
                            <select class="form-select" id="district_id" name="district_id" required>
                                <option value="">Sélectionner...</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->nom }}</option>
                                @endforeach
                            </select>
                            @error('district_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Project Title -->
                        <div class="col-12">
                            <label for="project_title" class="form-label fw-medium">Titre du projet <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="project_title" name="project_title" value="{{ old('project_title') }}" required placeholder="Ex: Construction d'une villa R+1">
                            @error('project_title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                            <label for="project_address" class="form-label fw-medium">Adresse du projet <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="project_address" name="project_address" rows="2" required placeholder="Adresse complète du terrain">{{ old('project_address') }}</textarea>
                            @error('project_address') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Surface -->
                        <div class="col-md-4">
                            <label for="surface" class="form-label fw-medium">Surface (m²) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="surface" name="surface" value="{{ old('surface') }}" required min="1" step="0.01" placeholder="150">
                            @error('surface') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Documents Upload -->
                        <div class="col-12">
                            <label class="form-label fw-medium">Documents justificatifs</label>
                            <div class="border rounded p-4 text-center bg-light">
                                <i class="bi bi-cloud-arrow-up fs-1 text-muted"></i>
                                <p class="text-muted small mb-2 mt-2">Glissez vos fichiers ici ou cliquez pour sélectionner</p>
                                <input type="file" class="form-control" name="documents[]" multiple accept=".pdf,.jpg,.jpeg,.png">
                                <p class="text-muted small mt-2 mb-0">PDF, JPG, PNG — Max 10 MB par fichier</p>
                            </div>
                            @error('documents.*') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Info box -->
                        <div class="col-12">
                            <div class="alert alert-info small mb-0">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Documents requis :</strong> CIN, Plan architectural, Titre foncier, Plan de situation, Quittance fiscale.
                                L'analyse IA évaluera automatiquement votre dossier après soumission.
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('citizen.permits') }}" class="btn btn-outline-secondary">Annuler</a>
                        <button type="submit" class="btn btn-navy">
                            <i class="bi bi-send me-2"></i>Soumettre la demande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
