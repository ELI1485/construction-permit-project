<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tableau de bord') — {{ config('app.name', 'PermisConstruct') }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        :root {
            --navy-800: #1B3A5C;
            --navy-700: #243b53;
            --navy-600: #334e68;
            --navy-100: #d9e2ec;
            --gold-500: #C9A227;
            --gold-400: #e0b532;
            --gold-600: #a3831f;
        }
        body { font-family: 'Inter', sans-serif; background: #f8f9fa; }
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: var(--navy-800);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
            transition: transform 0.3s;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.75);
            padding: 0.7rem 1.25rem;
            border-radius: 0.5rem;
            margin: 0.15rem 0.75rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .sidebar .nav-link.active { background: var(--gold-500); color: var(--navy-800); font-weight: 600; }
        .sidebar-brand {
            padding: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-brand span { color: #fff; font-weight: 700; font-size: 1.1rem; }
        .sidebar-section { color: rgba(255,255,255,0.4); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.05em; padding: 1rem 1.25rem 0.4rem; font-weight: 600; }
        .main-content { margin-left: 260px; min-height: 100vh; }
        .top-navbar {
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1030;
        }
        .stat-card { border: none; border-radius: 0.75rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08); transition: transform 0.15s; }
        .stat-card:hover { transform: translateY(-2px); }
        .stat-card .stat-icon { width: 48px; height: 48px; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; }
        .badge-status { padding: 0.35em 0.75em; border-radius: 50px; font-size: 0.75rem; font-weight: 500; }
        .table th { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.03em; color: #6c757d; font-weight: 600; border-top: none; }
        .btn-navy { background: var(--navy-800); color: #fff; border: none; }
        .btn-navy:hover { background: var(--navy-700); color: #fff; }
        .btn-gold { background: var(--gold-500); color: var(--navy-800); border: none; font-weight: 600; }
        .btn-gold:hover { background: var(--gold-400); color: var(--navy-800); }
        .page-header { margin-bottom: 1.5rem; }
        .page-header h1 { font-size: 1.5rem; font-weight: 700; color: var(--navy-800); margin: 0; }
        .sidebar-user { padding: 1rem 1.25rem; border-top: 1px solid rgba(255,255,255,0.1); margin-top: auto; }
        .sidebar-user .user-name { color: #fff; font-size: 0.875rem; font-weight: 500; }
        .sidebar-user .user-role { color: rgba(255,255,255,0.5); font-size: 0.75rem; }
        @media (max-width: 991.98px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar d-flex flex-column" id="sidebar">
        <div class="sidebar-brand">
            @include('components.logo-svg')
            <span>PermisConstruct</span>
        </div>

        <nav class="nav flex-column mt-3 flex-grow-1">
            @php $role = auth()->user()->role?->nom; @endphp

            <div class="sidebar-section">Navigation</div>

            @if($role === 'citoyen')
                <a class="nav-link {{ request()->routeIs('citizen.dashboard') ? 'active' : '' }}" href="{{ route('citizen.dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a>
                <a class="nav-link {{ request()->routeIs('citizen.permits') ? 'active' : '' }}" href="{{ route('citizen.permits') }}"><i class="bi bi-file-earmark-text"></i> Mes Permis</a>
                <a class="nav-link {{ request()->routeIs('citizen.permits.create') ? 'active' : '' }}" href="{{ route('citizen.permits.create') }}"><i class="bi bi-plus-circle"></i> Nouvelle Demande</a>
            @elseif($role === 'architecte')
                <a class="nav-link {{ request()->routeIs('architect.dashboard') ? 'active' : '' }}" href="{{ route('architect.dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a>
                <a class="nav-link {{ request()->routeIs('architect.permits') ? 'active' : '' }}" href="{{ route('architect.permits') }}"><i class="bi bi-file-earmark-text"></i> Dossiers</a>
            @elseif($role === 'agent_urbanisme')
                <a class="nav-link {{ request()->routeIs('agent.dashboard') ? 'active' : '' }}" href="{{ route('agent.dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a>
                <a class="nav-link {{ request()->routeIs('agent.permits') ? 'active' : '' }}" href="{{ route('agent.permits') }}"><i class="bi bi-file-earmark-text"></i> Dossiers</a>
            @elseif($role === 'service_technique')
                <a class="nav-link {{ request()->routeIs('technical.dashboard') ? 'active' : '' }}" href="{{ route('technical.dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a>
                <a class="nav-link {{ request()->routeIs('technical.permits') ? 'active' : '' }}" href="{{ route('technical.permits') }}"><i class="bi bi-clipboard2-check"></i> Révisions</a>
            @elseif($role === 'administrateur')
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a>
                <a class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}" href="{{ route('admin.users') }}"><i class="bi bi-people"></i> Utilisateurs</a>
                <a class="nav-link {{ request()->routeIs('admin.roles*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="bi bi-shield-check"></i> Rôles</a>
                <a class="nav-link {{ request()->routeIs('admin.permissions*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}"><i class="bi bi-key"></i> Permissions</a>
                <a class="nav-link {{ request()->routeIs('admin.statistics') ? 'active' : '' }}" href="{{ route('admin.statistics') }}"><i class="bi bi-bar-chart-line"></i> Statistiques</a>
                <a class="nav-link {{ request()->routeIs('admin.archives') ? 'active' : '' }}" href="{{ route('admin.archives') }}"><i class="bi bi-archive"></i> Archives</a>
            @endif

            <div class="sidebar-section mt-3">Général</div>
            <a class="nav-link {{ request()->routeIs('notifications*') ? 'active' : '' }}" href="{{ route('notifications.index') }}">
                <i class="bi bi-bell"></i> Notifications
                @php $unreadCount = auth()->user()->notifications()->where('is_read', false)->count(); @endphp
                @if($unreadCount > 0)
                    <span class="badge bg-warning text-dark ms-auto">{{ $unreadCount }}</span>
                @endif
            </a>
        </nav>

        <div class="sidebar-user">
            <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-weight:700;color:var(--navy-800);font-size:0.8rem;">
                    {{ strtoupper(substr(auth()->user()->prenom ?? 'U', 0, 1)) }}{{ strtoupper(substr(auth()->user()->nom ?? '', 0, 1)) }}
                </div>
                <div>
                    <div class="user-name">{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</div>
                    <div class="user-role">{{ ucfirst(str_replace('_', ' ', $role ?? '')) }}</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-secondary d-lg-none" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="bi bi-list"></i>
                </button>
                <div class="page-header">
                    <h1>@yield('page-title', 'Tableau de bord')</h1>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('notifications.index') }}" class="btn btn-sm btn-outline-secondary position-relative">
                    <i class="bi bi-bell"></i>
                    @if($unreadCount > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.6rem;">{{ $unreadCount }}</span>
                    @endif
                </a>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        {{ auth()->user()->prenom }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="p-4">
            @include('components.alerts')
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery + DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    @stack('scripts')
</body>
</html>
