<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول - رُخْصَتِي</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Tajawal', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50/30 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-3 group mb-2">
            <img src="{{ asset('images/logo.png') }}" alt="شعار رخصتي"
                 class="w-12 h-12 object-contain group-hover:scale-105 transition-transform" />
            <div class="flex flex-col items-start leading-tight">
                <span class="text-3xl font-extrabold text-[#006399] tracking-tight leading-none">رُخْصَتِي</span>
                <span class="text-xs font-bold text-[#D4AF37] tracking-widest uppercase">Rokhsati</span>
            </div>
        </a>
        <h2 class="mt-4 text-center text-2xl font-bold text-slate-800 tracking-tight">
            تسجيل الدخول إلى حسابك
        </h2>
        <p class="mt-2 text-center text-sm text-slate-500">
            أو
            <a href="{{ route('register') }}" class="font-bold text-[#006399] hover:text-[#005180] transition-colors">
                قم بإنشاء حساب جديد
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md px-4 sm:px-0">
        <div class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 border border-slate-100 rounded-2xl sm:px-10 backdrop-blur-sm">
            
            <!-- Global Errors Alert -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 text-red-700 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-6" action="{{ url('/login') }}" method="POST">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2">
                        البريد الإلكتروني
                    </label>
                    <div class="relative">
                        <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                            class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm"
                            placeholder="name@example.com">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-slate-700 mb-2">
                        كلمة المرور
                    </label>
                    <div class="relative">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 text-[#006399] focus:ring-[#006399] border-slate-300 rounded cursor-pointer">
                        <label for="remember_me" class="mr-2 block text-sm text-slate-600 cursor-pointer">
                            تذكرني
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-bold text-[#006399] hover:text-[#005180] transition-colors">
                            نسيت كلمة المرور؟
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-[#006399] hover:bg-[#005180] focus:outline-none focus:ring-4 focus:ring-[#006399]/20 transition-all">
                        دخول
                    </button>
                </div>
            </form>

            <!-- Back to home -->
            <div class="mt-6 pt-6 border-t border-slate-100 text-center">
                <a href="{{ url('/') }}" class="text-sm text-slate-400 hover:text-slate-600 transition-colors inline-flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    العودة إلى الصفحة الرئيسية
                </a>
            </div>

        </div>
    </div>

</body>
</html>
