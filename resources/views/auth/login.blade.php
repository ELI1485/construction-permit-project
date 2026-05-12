<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion — PermisConstruct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; min-height: 100vh; }
        .auth-left { background: #1B3A5C; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .auth-left .content { text-align: center; color: white; padding: 2rem; }
        .auth-left h1 { font-weight: 700; margin-bottom: 1rem; }
        .auth-left p { color: rgba(255,255,255,0.7); font-size: 1.1rem; }
        .auth-right { display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .auth-form { width: 100%; max-width: 400px; padding: 2rem; }
        .btn-navy { background: #1B3A5C; color: #fff; border: none; }
        .btn-navy:hover { background: #243b53; color: #fff; }
        .form-control:focus { border-color: #1B3A5C; box-shadow: 0 0 0 0.2rem rgba(27,58,92,0.15); }
    </style>
</head>
<body>
    <div class="row g-0">
        <!-- Left Brand Panel -->
        <div class="col-lg-6 d-none d-lg-flex auth-left">
            <div class="content">
                @include('components.logo-svg')
                <h1 class="mt-4">PermisConstruct</h1>
                <p>Plateforme Intelligente de Gestion<br>des Permis de Construire</p>
                <div class="mt-4">
                    <div class="d-flex align-items-center gap-3 justify-content-center mb-3">
                        <i class="bi bi-check-circle text-warning fs-5"></i>
                        <span class="text-white-50">Dépôt en ligne simplifié</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 justify-content-center mb-3">
                        <i class="bi bi-check-circle text-warning fs-5"></i>
                        <span class="text-white-50">Suivi en temps réel</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 justify-content-center">
                        <i class="bi bi-check-circle text-warning fs-5"></i>
                        <span class="text-white-50">Analyse IA automatique</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Form Panel -->
        <div class="col-lg-6 auth-right bg-white">
            <div class="auth-form">
                <div class="text-center d-lg-none mb-4">
                    @include('components.logo-svg')
                    <h5 class="mt-2 fw-bold" style="color:#1B3A5C;">PermisConstruct</h5>
                </div>

                <h3 class="fw-bold mb-1">Connexion</h3>
                <p class="text-muted mb-4">Accédez à votre espace personnel</p>

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <small><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first() }}</small>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-medium">Adresse e-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="votre@email.com">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label small fw-medium">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="••••••••">
                    </div>
                    <button type="submit" class="btn btn-navy w-100 py-2 fw-semibold">Se connecter</button>
                </form>

                <p class="text-center mt-4 text-muted small">
                    Pas encore de compte ? <a href="{{ route('register') }}" class="fw-semibold" style="color:#C9A227;">Créer un compte</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
