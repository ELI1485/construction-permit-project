@extends('layouts.app')
@section('title', 'Détails du Permis')
@section('page-title', 'Dossier ' . $permit->reference_number)

@section('content')
<div class="row g-4">
    <!-- Main Info -->
    <div class="col-lg-8">
        <!-- Permit Details -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold">{{ $permit->project_title }}</h6>
                <span class="badge-status fs-6" style="background-color: {{ $permit->status?->couleur }}20; color: {{ $permit->status?->couleur }};">
                    {{ $permit->status?->nom }}
                </span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="text-muted small text-uppercase">Type</div>
                        <div class="fw-medium">{{ $permit->permitType?->nom }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted small text-uppercase">Citoyen</div>
                        <div class="fw-medium">{{ $permit->citizen?->prenom }} {{ $permit->citizen?->nom }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted small text-uppercase">Surface</div>
                        <div class="fw-medium">{{ $permit->surface }} m²</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted small text-uppercase">Adresse</div>
                        <div class="fw-medium">{{ $permit->project_address }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted small text-uppercase">Date de soumission</div>
                        <div class="fw-medium">{{ $permit->submitted_at?->format('d/m/Y H:i') }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted small text-uppercase">Référence</div>
                        <div class="fw-medium font-monospace">{{ $permit->reference_number }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AI Analysis Card -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom">
                <h6 class="mb-0 fw-bold"><i class="bi bi-robot me-2"></i>Analyse IA</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="text-muted small text-uppercase">Score de Risque</div>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <div class="progress flex-grow-1" style="height: 8px;">
                                <div class="progress-bar {{ $permit->risk_score >= 70 ? 'bg-danger' : ($permit->risk_score >= 40 ? 'bg-warning' : 'bg-success') }}" style="width: {{ $permit->risk_score ?? 0 }}%;"></div>
                            </div>
                            <span class="fw-bold small">{{ $permit->risk_score ?? 'N/A' }}/100</span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-muted small text-uppercase">Niveau de Risque</div>
                        <div class="mt-1">
                            @if($permit->risk_level === 'Critical')
                                <span class="badge bg-danger">Critique</span>
                            @elseif($permit->risk_level === 'High')
                                <span class="badge bg-danger">Élevé</span>
                            @elseif($permit->risk_level === 'Medium')
                                <span class="badge bg-warning text-dark">Moyen</span>
                            @else
                                <span class="badge bg-success">{{ $permit->risk_level ?? 'N/A' }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-muted small text-uppercase">Priorité IA</div>
                        <div class="fw-medium mt-1">{{ $permit->ai_priority ?? 'Non évalué' }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted small text-uppercase">Révision technique</div>
                        <div class="mt-1">
                            @if($permit->technical_review_required)
                                <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>Requise</span>
                            @else
                                <span class="badge bg-success"><i class="bi bi-check me-1"></i>Non requise</span>
                            @endif
                        </div>
                    </div>
                </div>

                @if($permit->ai_recommendations && count($permit->ai_recommendations) > 0)
                    <hr>
                    <div class="text-muted small text-uppercase mb-2">Recommandations IA</div>
                    <ul class="list-unstyled mb-0">
                        @foreach($permit->ai_recommendations as $rec)
                            <li class="d-flex align-items-start gap-2 mb-2">
                                <i class="bi bi-lightbulb text-warning mt-1"></i>
                                <span class="small">{{ $rec }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <!-- Agent Actions -->
        @if(auth()->user()->isAgent())
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom">
                <h6 class="mb-0 fw-bold"><i class="bi bi-gear me-2"></i>Actions Agent</h6>
            </div>
            <div class="card-body d-flex flex-wrap gap-2">
                <form method="POST" action="/agent/permits/{{ $permit->id }}/validate" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-lg me-1"></i>Valider</button>
                </form>
                <form method="POST" action="/agent/permits/{{ $permit->id }}/reject" class="d-inline">
                    @csrf
                    <input type="hidden" name="commentaire" value="Refusé par agent">
                    <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg me-1"></i>Refuser</button>
                </form>
                <form method="POST" action="/agent/permits/{{ $permit->id }}/request-docs" class="d-inline">
                    @csrf
                    <input type="hidden" name="commentaire" value="Documents complémentaires requis">
                    <button type="submit" class="btn btn-warning"><i class="bi bi-paperclip me-1"></i>Demander docs</button>
                </form>
            </div>
        </div>
        @endif

        <!-- Technical Review -->
        @if(auth()->user()->isTechnical())
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom">
                <h6 class="mb-0 fw-bold"><i class="bi bi-clipboard2-check me-2"></i>Révision Technique</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/technical/permits/{{ $permit->id }}/review">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-medium">Conformité</label>
                        <div class="d-flex gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="conformite" value="1" id="conforme" required>
                                <label class="form-check-label" for="conforme">Conforme</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="conformite" value="0" id="non-conforme">
                                <label class="form-check-label" for="non-conforme">Non conforme</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="remarque" class="form-label fw-medium">Remarques</label>
                        <textarea class="form-control" id="remarque" name="remarque" rows="3" placeholder="Observations techniques..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-navy"><i class="bi bi-send me-2"></i>Soumettre la révision</button>
                </form>
            </div>
        </div>
        @endif
    </div>

    <!-- Right Sidebar -->
    <div class="col-lg-4">
        <!-- Documents -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom">
                <h6 class="mb-0 fw-bold"><i class="bi bi-paperclip me-2"></i>Documents</h6>
            </div>
            <div class="card-body">
                @if($permit->documents->count())
                    <div class="list-group list-group-flush">
                        @foreach($permit->documents as $doc)
                            <div class="list-group-item px-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-file-earmark-pdf text-danger"></i>
                                    <div>
                                        <div class="small fw-medium">{{ $doc->file_name }}</div>
                                        <div class="text-muted" style="font-size:0.7rem;">{{ $doc->uploaded_at?->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="bi bi-download"></i></a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted small text-center mb-0">Aucun document</p>
                @endif

                @if(auth()->user()->isCitoyen())
                    <hr>
                    <form method="POST" action="/permits/{{ $permit->id }}/documents" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="file" class="form-control" name="document" required>
                            <button type="submit" class="btn btn-navy"><i class="bi bi-upload"></i></button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        <!-- History Timeline -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h6 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2"></i>Historique</h6>
            </div>
            <div class="card-body">
                @if($permit->histories->count())
                    @foreach($permit->histories->sortByDesc('changed_at')->take(10) as $history)
                        <div class="d-flex gap-3 mb-3 {{ !$loop->last ? 'border-bottom pb-3' : '' }}">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                                    <i class="bi bi-arrow-right-circle text-primary small"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-muted">{{ $history->changed_at?->format('d/m/Y H:i') }}</div>
                                <div class="small">par {{ $history->changedBy?->prenom }} {{ $history->changedBy?->nom }}</div>
                                @if($history->commentaire)
                                    <div class="small text-muted mt-1 fst-italic">{{ $history->commentaire }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted small text-center mb-0">Aucun historique</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
