<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 — Accès refusé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body{font-family:'Inter',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;background:#f8f9fa;}</style>
</head>
<body>
    <div class="text-center">
        <div class="mb-4">
            <i class="bi bi-shield-lock text-danger" style="font-size:4rem;"></i>
        </div>
        <h1 class="fw-bold" style="color:#1B3A5C;">403</h1>
        <h4 class="text-muted mb-3">Accès refusé</h4>
        <p class="text-muted mb-4">Vous n'avez pas les autorisations nécessaires pour accéder à cette page.</p>
        <a href="{{ url('/') }}" class="btn text-white" style="background:#1B3A5C;">
            <i class="bi bi-house me-2"></i>Retour à l'accueil
        </a>
    </div>
</body>
</html>
