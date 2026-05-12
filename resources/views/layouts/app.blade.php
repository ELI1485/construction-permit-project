<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'رُخْصَتِي - منصة التراخيص الرقمية')</title>
    <meta name="description" content="منصة رُخْصَتِي الرقمية للحصول على تراخيص البناء والتعمير في المملكة المغربية">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <!-- Alpine.js for dropdowns -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Tajawal', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
    @yield('head')
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col selection:bg-[#006399] selection:text-white">

    <!-- Top Navbar -->
    @include('components.navbar')

    <div class="flex flex-1 overflow-hidden" style="height: calc(100vh - 64px)">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8 bg-slate-50/50">
            @include('components.alerts')
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
