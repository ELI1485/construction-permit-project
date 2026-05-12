<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tableau de bord') — {{ config('app.name', 'PermisConstruct') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
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
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-full font-sans" x-data="{ sidebarOpen: false }">
    <div class="min-h-full">
        {{-- Mobile sidebar overlay --}}
        <div x-show="sidebarOpen" x-cloak class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
            <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900/80" @click="sidebarOpen = false"></div>
            <div class="fixed inset-0 flex">
                <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative mr-16 flex w-full max-w-xs flex-1">
                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                            <span class="sr-only">Fermer</span>
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    @include('components.sidebar')
                </div>
            </div>
        </div>

        {{-- Desktop sidebar --}}
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            @include('components.sidebar')
        </div>

        {{-- Main content area --}}
        <div class="lg:pl-72">
            {{-- Top navbar --}}
            @include('components.navbar')

            {{-- Page content --}}
            <main class="py-6 px-4 sm:px-6 lg:px-8">
                @include('components.alerts')
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
