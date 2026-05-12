<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription — PermisConstruct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; min-height: 100vh; }
        .auth-left { background: #1B3A5C; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .auth-left .content { text-align: center; color: white; padding: 2rem; }
        .auth-right { display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 2rem 0; }
        .auth-form { width: 100%; max-width: 480px; padding: 2rem; }
        .btn-navy { background: #1B3A5C; color: #fff; border: none; }
        .btn-navy:hover { background: #243b53; color: #fff; }
        .form-control:focus, .form-select:focus { border-color: #1B3A5C; box-shadow: 0 0 0 0.2rem rgba(27,58,92,0.15); }
    </style>
</head>
<body>
    <div class="row g-0">
        <div class="col-lg-5 d-none d-lg-flex auth-left">
            <div class="content">
                @include('components.logo-svg')
                <h1 class="mt-4 fw-bold">PermisConstruct</h1>
                <p class="text-white-50">Rejoignez la plateforme et gérez vos demandes de permis en toute simplicité.</p>
            </div>
        </div>

        <div class="col-lg-7 auth-right bg-white">
            <div class="auth-form">
                <h3 class="fw-bold mb-1">Créer un compte</h3>
                <p class="text-muted mb-4">Remplissez les informations pour vous inscrire</p>

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Nom</label>
                            <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required placeholder="Nom">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Prénom</label>
                            <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" required placeholder="Prénom">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-medium">Adresse e-mail</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="votre@email.com">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-medium">CIN</label>
                            <input type="text" class="form-control" name="cin" value="{{ old('cin') }}" required placeholder="AB123456">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Rôle</label>
                            <select class="form-select" name="role_id" required>
                                <option value="">Choisir...</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $role->nom)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">District</label>
                            <select class="form-select" name="district_id" required>
                                <option value="">Choisir...</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Mot de passe</label>
                            <input type="password" class="form-control" name="password" required placeholder="••••••••">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Confirmer</label>
                            <input type="password" class="form-control" name="password_confirmation" required placeholder="••••••••">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-navy w-100 py-2 fw-semibold mt-4">Créer mon compte</button>
                </form>

                <p class="text-center mt-3 text-muted small">
                    Déjà inscrit ? <a href="{{ route('login') }}" class="fw-semibold" style="color:#C9A227;">Se connecter</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
