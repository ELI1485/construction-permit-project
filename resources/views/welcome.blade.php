<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PermisConstruct') }} — Plateforme de Permis de Construire</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            navy: { 50: '#f0f4f8', 100: '#d9e2ec', 200: '#bcccdc', 300: '#9fb3c8', 400: '#6d8dad', 500: '#486581', 600: '#334e68', 700: '#243b53', 800: '#1B3A5C', 900: '#102a43' },
                            gold: { 50: '#fdf8e8', 100: '#f9edcc', 200: '#f3db99', 300: '#edc966', 400: '#e0b532', 500: '#C9A227', 600: '#a3831f', 700: '#7d6418', 800: '#574510', 900: '#312708' },
                        },
                        fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] },
                    }
                }
            }
        </script>
    @endif
</head>
<body class="h-full font-sans bg-white">
    {{-- Navigation --}}
    <nav class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-3">
                    <x-logo class="h-10 w-10" />
                    <span class="text-xl font-bold text-navy-800">PermisConstruct</span>
                </div>
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/') }}" class="text-sm font-medium text-navy-800 hover:text-navy-600 transition">Tableau de bord</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-navy-800 hover:text-navy-600 transition">Connexion</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center rounded-lg bg-navy-800 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-navy-700 transition">
                            Créer un compte
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-800 via-navy-800 to-navy-900"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-64 h-64 border-2 border-gold-500 rounded-full"></div>
            <div class="absolute bottom-10 right-32 w-96 h-96 border border-gold-400 rounded-full"></div>
            <div class="absolute top-1/2 left-1/3 w-40 h-40 border border-gold-300 rounded-full"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <x-logo class="h-24 w-24 mx-auto mb-8" />
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight">
                Gestion des Permis<br>
                <span class="text-gold-400">de Construire</span>
            </h1>
            <p class="text-lg sm:text-xl text-navy-200 max-w-2xl mx-auto mb-10 leading-relaxed">
                Simplifiez le dépôt, le suivi et le traitement de vos demandes de permis de construire grâce à notre plateforme numérique.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-lg bg-gold-500 px-8 py-3.5 text-base font-bold text-navy-900 shadow-lg hover:bg-gold-400 transition">
                    Commencer maintenant
                    <svg class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-lg border-2 border-white/30 px-8 py-3.5 text-base font-semibold text-white hover:bg-white/10 transition">
                    Se connecter
                </a>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-navy-800 mb-4">Comment ça fonctionne ?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Notre plateforme accompagne chaque étape de votre demande de permis de construire.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-navy-800 text-white mb-5">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-800 mb-2">Déposez votre dossier</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Soumettez votre demande en ligne avec tous les documents nécessaires en quelques clics.</p>
                </div>
                {{-- Feature 2 --}}
                <div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-gold-500 text-navy-900 mb-5">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.745 3.745 0 011.043 3.296A3.745 3.745 0 0121 12z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-800 mb-2">Suivi en temps réel</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Suivez l'avancement de votre dossier à chaque étape du processus de validation.</p>
                </div>
                {{-- Feature 3 --}}
                <div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-navy-800 text-white mb-5">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-800 mb-2">Notifications instantanées</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Recevez des alertes à chaque changement de statut de votre demande.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Roles Section --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-navy-800 mb-4">Pour tous les acteurs</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Que vous soyez citoyen, architecte ou agent, notre plateforme s'adapte à votre rôle.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center p-6 rounded-xl border border-gray-100 hover:border-gold-300 transition">
                    <div class="w-14 h-14 bg-navy-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-7 w-7 text-navy-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                    </div>
                    <h3 class="font-bold text-navy-800 mb-1">Citoyen</h3>
                    <p class="text-sm text-gray-500">Déposez et suivez vos demandes</p>
                </div>
                <div class="text-center p-6 rounded-xl border border-gray-100 hover:border-gold-300 transition">
                    <div class="w-14 h-14 bg-navy-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-7 w-7 text-navy-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342"/></svg>
                    </div>
                    <h3 class="font-bold text-navy-800 mb-1">Architecte</h3>
                    <p class="text-sm text-gray-500">Gérez les dossiers assignés</p>
                </div>
                <div class="text-center p-6 rounded-xl border border-gray-100 hover:border-gold-300 transition">
                    <div class="w-14 h-14 bg-navy-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-7 w-7 text-navy-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                    </div>
                    <h3 class="font-bold text-navy-800 mb-1">Agent Urbanisme</h3>
                    <p class="text-sm text-gray-500">Validez les demandes</p>
                </div>
                <div class="text-center p-6 rounded-xl border border-gray-100 hover:border-gold-300 transition">
                    <div class="w-14 h-14 bg-navy-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-7 w-7 text-navy-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17l-5.384 3.183 1.03-5.996L2.12 7.58l6.02-.876L10.68 1.5l2.54 5.204 6.02.876-4.947 4.777 1.03 5.996L11.42 15.17z"/></svg>
                    </div>
                    <h3 class="font-bold text-navy-800 mb-1">Service Technique</h3>
                    <p class="text-sm text-gray-500">Révisez la conformité</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-navy-900 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <x-logo class="h-8 w-8" />
                    <span class="text-white font-bold">PermisConstruct</span>
                </div>
                <p class="text-navy-300 text-sm">&copy; {{ date('Y') }} PermisConstruct. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>
