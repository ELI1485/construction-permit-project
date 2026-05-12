<aside class="w-64 bg-white border-l border-slate-200 shadow-sm hidden md:flex flex-col h-full">
    <div class="p-4 space-y-1 flex-1 overflow-y-auto">

        @php $user = auth()->user(); @endphp

        {{-- Dashboard (all roles) --}}
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('dashboard') || request()->routeIs('citizen.dashboard') || request()->routeIs('agent.dashboard') || request()->routeIs('architect.dashboard') || request()->routeIs('technical.dashboard') || request()->routeIs('admin.dashboard') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            لوحة القيادة
        </a>

        {{-- Permits (all roles) --}}
        <a href="{{ route('permits.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('permits.*') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            التراخيص
        </a>

        {{-- Citizen: new permit --}}
        @if($user?->isCitoyen())
        <a href="{{ route('permits.create') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('permits.create') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            تقديم طلب جديد
        </a>
        @endif

        {{-- Agent / Admin: Commissions --}}
        @if($user?->isAgent() || $user?->isAdmin())
        <a href="{{ route('commissions.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('commissions.*') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            اللجان
        </a>
        @endif

        {{-- Technical: inspections --}}
        @if($user?->isTechnical() || $user?->isAdmin())
        <a href="{{ route('inspections.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('inspections.*') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
            </svg>
            المعاينات التقنية
        </a>
        @endif

        {{-- Notifications (all roles) --}}
        <a href="{{ route('notifications.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('notifications.*') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            الإشعارات
        </a>

        {{-- Documents (all roles) --}}
        <a href="{{ route('documents.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('documents.*') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
            </svg>
            الوثائق
        </a>

        {{-- Admin: users + statistics + archives --}}
        @if($user?->isAdmin())
        <div class="pt-3 pb-1">
            <span class="px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">إدارة المنصة</span>
        </div>
        <a href="{{ route('users.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('users.*') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            المستخدمون
        </a>
        <a href="{{ route('admin.statistics') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('admin.statistics') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            الإحصائيات
        </a>
        <a href="{{ route('admin.archives') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-medium transition-colors {{ request()->routeIs('admin.archives') ? 'bg-[#006399] text-white shadow-sm' : 'text-slate-600 hover:text-[#006399] hover:bg-blue-50' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
            </svg>
            الأرشيف
        </a>
        @endif

    </div>

    <!-- Logout at bottom -->
    <div class="p-4 border-t border-slate-100">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-colors font-medium text-sm">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                تسجيل الخروج
            </button>
        </form>
    </div>
</aside>
