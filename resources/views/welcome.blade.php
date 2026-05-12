<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>البوابة الوطنية للتراخيص</title>
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
    <nav class="bg-white shadow-sm border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <svg class="w-8 h-8 text-[#006399]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                    <span class="text-3xl font-bold text-[#006399] tracking-tight">رخص</span>
                </div>

                <!-- Center Links -->
                <div class="hidden lg:flex space-x-8 space-x-reverse">
                    <a href="#" class="text-[#006399] font-bold flex items-center gap-1 group">
                        الرئيسية
                        <svg class="w-4 h-4 text-[#006399] transition-transform group-hover:translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-[#006399] font-medium flex items-center gap-1 transition-colors group">
                        دليل الخدمات
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-[#006399] transition-transform group-hover:translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-[#006399] font-medium flex items-center gap-1 transition-colors group">
                        قاعدة المعرفة
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-[#006399] transition-transform group-hover:translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-[#006399] font-medium flex items-center gap-1 transition-colors group">
                        أحدث الأخبار
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-[#006399] transition-transform group-hover:translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                </div>

                <!-- Left Actions -->
                <div class="flex items-center gap-4">
                    <div class="hidden sm:flex items-center gap-1 text-[#006399] font-bold cursor-pointer transition-colors ml-4 border-l pl-4 border-slate-200">
                        <span>العربية</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-[#006399] border border-[#006399] px-5 py-2.5 rounded font-bold hover:bg-[#F0F8FF] transition-colors text-sm">لوحة التحكم</a>
                        @else
                            <a href="{{ route('login') }}" class="text-[#006399] border border-[#006399] px-5 py-2.5 rounded font-bold hover:bg-[#F0F8FF] transition-colors text-sm focus:ring-4 focus:ring-blue-100">تسجيل الدخول</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-[#006399] text-white px-5 py-2.5 rounded font-bold hover:bg-[#005180] transition-colors shadow-sm focus:ring-4 focus:ring-blue-100 text-sm">إنشاء حساب</a>
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
        <div class="max-w-4xl mx-auto mt-20 px-4 text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#334155] mb-6 tracking-tight leading-tight">المنصة الرقمية الموحدة لإصدار التراخيص</h1>
            <p class="text-slate-500 text-base md:text-lg leading-relaxed mb-10 max-w-3xl mx-auto">
                يعتمد الآلاف من الأفراد والمؤسسات محلياً ودولياً على هذه البوابة لإنجاز معاملاتهم واستخراج التصاريح الإدارية والعمرانية بكل سهولة وسرعة وفي بيئة رقمية متكاملة.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                <button class="bg-[#006399] text-white px-8 py-3.5 rounded-lg font-bold hover:bg-[#005180] transition-all shadow-md shadow-blue-200 flex items-center justify-center gap-2 text-lg">
                    تقديم طلب جديد
                </button>
                <button class="bg-white border-2 border-[#006399] text-[#006399] px-8 py-3.5 rounded-lg font-bold hover:bg-[#F0F8FF] transition-all shadow-sm flex items-center justify-center gap-2 text-lg">
                    متابعة حالة الملف
                </button>
            </div>
        </div>

        <div class="w-24 h-1 bg-slate-200 mx-auto rounded-full mt-24 mb-16"></div>

        <!-- Personas / Roles Section -->
        <div class="text-center px-4 mb-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-[#334155] mb-4">بوابة ذكية تخدم جميع فئات المجتمع</h2>
            <p class="text-slate-500 text-lg max-w-2xl mx-auto">الرجاء اختيار الفئة التي تنتمي إليها لنقدم لك تجربة مخصصة لمتطلباتك</p>
        </div>

        <!-- Role Selection Cards -->
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1 -->
            <button class="group relative bg-white border border-slate-200 rounded-2xl p-8 flex flex-col items-center justify-center gap-6 shadow-sm hover:shadow-xl hover:border-[#006399]/40 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-28 h-28 rounded-full bg-[#F0F8FF] flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-14 h-14 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#006399]">إدارة</h3>
                <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#006399] rounded-2xl transition-colors"></div>
            </button>

            <!-- Card 2 -->
            <button class="group relative bg-white border border-slate-200 rounded-2xl p-8 flex flex-col items-center justify-center gap-6 shadow-sm hover:shadow-xl hover:border-[#006399]/40 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-28 h-28 rounded-full bg-[#F0F8FF] flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-14 h-14 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#006399]">مختص</h3>
                <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#006399] rounded-2xl transition-colors"></div>
            </button>

            <!-- Card 3 -->
            <button class="group relative bg-white border border-slate-200 rounded-2xl p-8 flex flex-col items-center justify-center gap-6 shadow-sm hover:shadow-xl hover:border-[#006399]/40 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-28 h-28 rounded-full bg-[#F0F8FF] flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-14 h-14 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#006399]">مكتب هندسي</h3>
                <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#006399] rounded-2xl transition-colors"></div>
            </button>

            <!-- Card 4 (Active/Selected state example) -->
            <button class="group relative bg-white border-2 border-[#006399] rounded-2xl p-8 flex flex-col items-center justify-center gap-6 shadow-md shadow-blue-100/50 transition-all duration-300 transform -translate-y-2">
                <div class="w-28 h-28 rounded-full bg-[#E6F3FF] flex items-center justify-center">
                    <svg class="w-14 h-14 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#006399]">فرد / مواطن</h3>
                <!-- Check Icon for selected state -->
                <div class="absolute top-4 left-4 text-[#006399]">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                </div>
            </button>
        </div>

    </main>

</body>
</html>
