<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PermisConstruct — Plateforme Intelligente de Gestion des Permis de Construire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero { background: #1B3A5C; min-height: 90vh; position: relative; overflow: hidden; }
        .hero::before { content:''; position:absolute; inset:0; background: radial-gradient(circle at 20% 50%, rgba(201,162,39,0.08) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(201,162,39,0.05) 0%, transparent 40%); }
        .hero .content { position: relative; z-index: 1; }
        .btn-gold { background: #C9A227; color: #1B3A5C; border: none; font-weight: 700; }
        .btn-gold:hover { background: #e0b532; color: #1B3A5C; }
        .btn-outline-light-custom { border: 2px solid rgba(255,255,255,0.3); color: white; }
        .btn-outline-light-custom:hover { background: rgba(255,255,255,0.1); color: white; border-color: rgba(255,255,255,0.5); }
        .feature-card { border: 1px solid #e9ecef; border-radius: 12px; padding: 2rem; transition: transform 0.15s, box-shadow 0.15s; }
        .feature-card:hover { transform: translateY(-4px); box-shadow: 0 8px 25px rgba(0,0,0,0.08); }
        .feature-icon { width: 56px; height: 56px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1rem; }
        .role-card { text-align: center; padding: 1.5rem; border-radius: 12px; border: 1px solid #e9ecef; transition: border-color 0.2s; }
        .role-card:hover { border-color: #C9A227; }
        .navbar-brand { font-weight: 700; color: #1B3A5C !important; }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                @include('components.logo-svg')
                <span>PermisConstruct</span>
            </a>
            <div class="d-flex align-items-center gap-3">
                @auth
                    <a href="{{ url('/') }}" class="btn btn-sm btn-outline-secondary">Tableau de bord</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary">Connexion</a>
                    <a href="{{ route('register') }}" class="btn btn-sm text-white" style="background:#1B3A5C;">Créer un compte</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center text-white" style="padding-top:80px;">
        <div class="container content text-center">
            <div class="mb-4">
                <svg width="80" height="80" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="100" r="95" stroke="#1B3A5C" stroke-width="10" fill="none"/>
                    <circle cx="100" cy="100" r="80" stroke="white" stroke-width="8" fill="none"/>
                    <circle cx="100" cy="100" r="72" fill="#1B3A5C"/>
                    <path d="M65 150 L65 90 C65 60 100 35 100 35 C100 35 135 60 135 90 L135 150" stroke="#C9A227" stroke-width="6" fill="none"/>
                    <path d="M72 150 L72 95 C72 70 100 48 100 48 C100 48 128 70 128 95 L128 150" stroke="#C9A227" stroke-width="4" fill="none"/>
                    <rect x="78" y="100" width="8" height="50" fill="#C9A227"/>
                    <rect x="89" y="85" width="10" height="65" fill="#C9A227"/>
                    <rect x="102" y="90" width="10" height="60" fill="#C9A227"/>
                    <rect x="115" y="105" width="8" height="45" fill="#C9A227"/>
                    <rect x="93" y="70" width="3" height="15" fill="#C9A227"/>
                    <polygon points="94.5,62 91,70 98,70" fill="#C9A227"/>
                    <polygon points="100,75 88,110 95,110 95,130 105,130 105,110 112,110" fill="#C9A227" opacity="0.6"/>
                </svg>
            </div>
            <h1 class="display-4 fw-bold mb-3">Gestion Intelligente des<br><span style="color:#C9A227;">Permis de Construire</span></h1>
            <p class="lead text-white-50 mb-5 mx-auto" style="max-width:600px;">Simplifiez le dépôt, le suivi et le traitement de vos demandes de permis de construire grâce à l'intelligence artificielle.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('register') }}" class="btn btn-gold btn-lg px-4 py-2">Commencer maintenant <i class="bi bi-arrow-right ms-2"></i></a>
                <a href="{{ route('login') }}" class="btn btn-outline-light-custom btn-lg px-4 py-2">Se connecter</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="color:#1B3A5C;">Comment ça fonctionne ?</h2>
                <p class="text-muted">Notre plateforme accompagne chaque étape de votre demande.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card bg-white h-100">
                        <div class="feature-icon" style="background:rgba(27,58,92,0.1);color:#1B3A5C;"><i class="bi bi-file-earmark-plus"></i></div>
                        <h5 class="fw-bold">Déposez votre dossier</h5>
                        <p class="text-muted small">Soumettez votre demande en ligne avec tous les documents nécessaires.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card bg-white h-100">
                        <div class="feature-icon" style="background:rgba(201,162,39,0.1);color:#C9A227;"><i class="bi bi-robot"></i></div>
                        <h5 class="fw-bold">Analyse IA automatique</h5>
                        <p class="text-muted small">L'IA évalue votre dossier, détecte les anomalies et calcule le risque.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card bg-white h-100">
                        <div class="feature-icon" style="background:rgba(27,58,92,0.1);color:#1B3A5C;"><i class="bi bi-bell"></i></div>
                        <h5 class="fw-bold">Suivi en temps réel</h5>
                        <p class="text-muted small">Notifications instantanées à chaque changement de statut.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Roles Section -->
    <section class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="color:#1B3A5C;">Pour tous les acteurs</h2>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="role-card">
                        <i class="bi bi-person fs-2" style="color:#1B3A5C;"></i>
                        <h6 class="fw-bold mt-2">Citoyen</h6>
                        <p class="text-muted small mb-0">Déposez et suivez vos demandes</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="role-card">
                        <i class="bi bi-building fs-2" style="color:#1B3A5C;"></i>
                        <h6 class="fw-bold mt-2">Architecte</h6>
                        <p class="text-muted small mb-0">Gérez les dossiers assignés</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="role-card">
                        <i class="bi bi-shield-check fs-2" style="color:#1B3A5C;"></i>
                        <h6 class="fw-bold mt-2">Agent Urbanisme</h6>
                        <p class="text-muted small mb-0">Validez les demandes</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="role-card">
                        <i class="bi bi-clipboard2-check fs-2" style="color:#1B3A5C;"></i>
                        <h6 class="fw-bold mt-2">Service Technique</h6>
                        <p class="text-muted small mb-0">Révisez la conformité</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4" style="background:#1B3A5C;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2 text-white">
                    @include('components.logo-svg')
                    <span class="fw-bold">PermisConstruct</span>
                </div>
                <p class="text-white-50 small mb-0">&copy; {{ date('Y') }} PermisConstruct. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
