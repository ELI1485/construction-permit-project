<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portail National des Permis - Rokhsati</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap" rel="stylesheet" />
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        body { font-family: 'Tajawal', sans-serif; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-slate-800 antialiased min-h-screen flex flex-col selection:bg-[#006399] selection:text-white overflow-x-hidden">

    <!-- Navbar -->
    <nav class="bg-white shadow-xs border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2.5">
                    <div class="w-10 h-10 rounded-xl bg-[#006399] flex items-center justify-center text-white shadow-xs">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-extrabold text-[#006399] tracking-tight leading-none">Rokhsati</span>
                        <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mt-0.5">Rokhsati</span>
                    </div>
                </div>

                <!-- Center Links -->
                <div class="hidden lg:flex space-x-8">
                    <a href="#" class="text-[#006399] font-bold flex items-center gap-1 group">
                        Accueil
                        <svg class="w-4 h-4 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-[#006399] font-medium flex items-center gap-1 transition-colors">
                        Guide des services
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-[#006399] font-medium flex items-center gap-1 transition-colors">
                        Base de connaissances
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-[#006399] font-medium flex items-center gap-1 transition-colors">
                        Statistiques et chiffres
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center gap-3">
                    <!-- Multilingual Language Toggle Dropdown -->
                    <div class="relative group inline-block text-left mr-2 border-r pr-3 border-slate-200">
                        <button class="inline-flex items-center gap-1 text-xs font-bold text-slate-600 hover:text-[#006399] py-2 transition-colors">
                            <svg class="w-3.5 h-3.5 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                            <span>Français</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <!-- Language Menu Items -->
                        <div class="absolute right-0 mt-1 w-28 bg-white rounded-xl shadow-lg border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden text-left">
                            <a href="?lang=fr" class="block px-3 py-2 text-xs font-bold text-[#006399] bg-blue-50/50">Français (FR)</a>
                            <a href="?lang=ar" class="block px-3 py-2 text-xs font-medium text-slate-600 hover:bg-slate-50 text-right">arabe (AR)</a>
                            <a href="?lang=en" class="block px-3 py-2 text-xs font-medium text-slate-600 hover:bg-slate-50">English (EN)</a>
                        </div>
                    </div>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-[#006399] border border-[#006399] px-5 py-2.5 rounded-xl font-bold hover:bg-[#F0F8FF] transition-colors text-sm">Tableau de bord</a>
                        @else
                            <a href="{{ route('login') }}" class="text-[#006399] border border-[#006399] px-5 py-2.5 rounded-xl font-bold hover:bg-[#F0F8FF] transition-colors text-sm">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-[#006399] text-white px-5 py-2.5 rounded-xl font-bold hover:bg-[#005180] transition-colors shadow-xs text-sm">Créer un compte</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow pb-24">
        
        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto mt-16 px-4 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-[#006399] text-xs font-bold mb-6">
                <span class="w-2 h-2 rounded-full bg-[#006399] animate-pulse"></span>
                Inspiré par l'écosystème numérique officiel du Royaume du Maroc
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#334155] mb-6 tracking-tight leading-tight">Plateforme numérique unifiée pour les permis d'urbanisme et d'activités économiques</h1>
            <p class="text-slate-500 text-base md:text-lg leading-relaxed mb-10 max-w-3xl mx-auto">
                Un portail numérique intégré permettant aux citoyens, professionnels et administrations de déposer, suivre et traiter les demandes de permis d'urbanisme, commerciaux et de raccordement aux réseaux avec transparence et rapidité.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                <a href="{{ route('permits.create') }}" class="bg-[#006399] text-white px-8 py-4 rounded-xl font-bold hover:bg-[#005180] transition-all shadow-md shadow-blue-200 flex items-center justify-center gap-2 text-base sm:text-lg">
                    Soumettre une nouvelle demande
                </a>
                <a href="{{ route('permits.index') }}" class="bg-white border-2 border-[#006399] text-[#006399] px-8 py-4 rounded-xl font-bold hover:bg-[#F0F8FF] transition-all shadow-xs flex items-center justify-center gap-2 text-base sm:text-lg">
                    Suivre le statut des dossiers
                </a>
            </div>
        </div>

        <!-- Official Service Modules Grid -->
        <div class="max-w-6xl mx-auto px-4 mt-20">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest text-center mb-8">Domaines et services numériques disponibles sur la plateforme</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Module 1 -->
                <div class="bg-gradient-to-b from-white to-slate-50 border border-slate-100 p-6 rounded-2xl shadow-xs hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-[#006399] flex items-center justify-center font-bold mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 10v1a7 7 0 01-14 0v-1m14 0a2 2 0 00-2-2H7a2 2 0 00-2 2m14 0h-2M5 10h2"></path></svg>
                    </div>
                    <h3 class="font-bold text-slate-800 text-base mb-1">Permis d'urbanisme et de construction</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Permis de construire, lotissements, ensembles immobiliers et morcellements fonciers.</p>
                </div>

                <!-- Module 2 -->
                <div class="bg-gradient-to-b from-white to-slate-50 border border-slate-100 p-6 rounded-2xl shadow-xs hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-[#006399] flex items-center justify-center font-bold mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-slate-800 text-base mb-1">Permis économiques</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Licences pour activités commerciales, industrielles, de services et établissements touristiques.</p>
                </div>

                <!-- Module 3 -->
                <div class="bg-gradient-to-b from-white to-slate-50 border border-slate-100 p-6 rounded-2xl shadow-xs hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-[#006399] flex items-center justify-center font-bold mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-slate-800 text-base mb-1">Raccordement aux réseaux publics</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Demandes de raccordement aux réseaux d'eau potable, d'électricité et d'assainissement.</p>
                </div>

                <!-- Module 4 -->
                <div class="bg-gradient-to-b from-white to-slate-50 border border-slate-100 p-6 rounded-2xl shadow-xs hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-[#006399] flex items-center justify-center font-bold mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5a2 2 0 01-2 2H5a2 2 0 01-2-2V3.935A9.004 9.004 0 018 3.935zM15 3.935V5a2 2 0 002 2h1a2 2 0 002-2V3.935A9.004 9.004 0 0015 3.935z"></path></svg>
                    </div>
                    <h3 class="font-bold text-slate-800 text-base mb-1">Occupation du domaine public</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Autorisations d'occupation temporaire du domaine public pour construction ou passage de réseaux.</p>
                </div>
            </div>
        </div>

        <div class="w-24 h-1 bg-slate-200 mx-auto rounded-full mt-20 mb-12"></div>

        <!-- Personas / Roles Section -->
        <div class="text-center px-4 mb-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-[#334155] mb-4">Un portail intelligent au service de toutes les catégories de la société</h2>
            <p class="text-slate-500 text-base max-w-2xl mx-auto">Veuillez sélectionner votre catégorie pour une expérience personnalisée</p>
        </div>

        <!-- Role Selection Cards -->
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1 -->
            <a href="{{ url('/dashboard/admin') }}" class="group relative bg-white border border-slate-200 rounded-2xl p-8 flex flex-col items-center justify-center gap-6 shadow-xs hover:shadow-xl hover:border-[#006399]/40 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-24 h-24 rounded-full bg-[#F0F8FF] flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-12 h-12 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-[#006399] text-center">Administration et services compétents</h3>
                <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#006399] rounded-2xl transition-colors"></div>
            </a>

            <!-- Card 2 -->
            <a href="{{ url('/dashboard/agent') }}" class="group relative bg-white border border-slate-200 rounded-2xl p-8 flex flex-col items-center justify-center gap-6 shadow-xs hover:shadow-xl hover:border-[#006399]/40 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-24 h-24 rounded-full bg-[#F0F8FF] flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-12 h-12 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-[#006399] text-center">Membres de commission</h3>
                <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#006399] rounded-2xl transition-colors"></div>
            </a>

            <!-- Card 3 -->
            <a href="{{ url('/dashboard/architect') }}" class="group relative bg-white border border-slate-200 rounded-2xl p-8 flex flex-col items-center justify-center gap-6 shadow-xs hover:shadow-xl hover:border-[#006399]/40 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-24 h-24 rounded-full bg-[#F0F8FF] flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-12 h-12 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M12 3L4 19h16L12 3z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-[#006399] text-center">Professionnels (Architectes)</h3>
                <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#006399] rounded-2xl transition-colors"></div>
            </a>

            <!-- Card 4 -->
            <a href="{{ url('/dashboard/citizen') }}" class="group relative bg-white border-2 border-[#006399] rounded-2xl p-8 flex flex-col items-center justify-center gap-6 shadow-md shadow-blue-50 transition-all duration-300 transform -translate-y-2 block w-full text-center">
                <div class="w-24 h-24 rounded-full bg-[#E6F3FF] flex items-center justify-center mx-auto">
                    <svg class="w-12 h-12 text-[#006399]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-[#006399] text-center">Citoyens et Entreprises</h3>
                <div class="absolute top-4 right-4 text-[#006399]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                </div>
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 py-8 text-center text-xs text-slate-400">
        <p>© 2026 Plateforme Numérique Unifiée des Permis. Tous droits réservés.</p>
    </footer>

</body>
</html>
