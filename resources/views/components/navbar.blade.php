<nav class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo + Brand -->
            <div class="flex-shrink-0 flex items-center gap-2.5">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 group">
                    <img src="{{ asset('images/logo.png') }}" alt="شعار رخصتي"
                         class="w-10 h-10 object-contain group-hover:scale-105 transition-transform" />
                    <div class="flex flex-col leading-tight">
                        <span class="text-xl font-extrabold text-[#006399] tracking-tight leading-none">رُخْصَتِي</span>
                        <span class="text-[9px] font-bold text-[#D4AF37] tracking-widest uppercase mt-0.5">Rokhsati</span>
                    </div>
                </a>
            </div>

            <!-- Right: Notifications + User Menu -->
            <div class="flex items-center gap-3">
                <!-- Notification Bell -->
                <a href="{{ route('notifications.index') }}" class="relative p-2 text-slate-500 hover:text-[#006399] transition-colors rounded-lg hover:bg-blue-50" title="الإشعارات">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                </a>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open"
                            class="flex items-center gap-2 px-3 py-1.5 rounded-xl border border-slate-200 hover:border-[#006399] hover:bg-blue-50/50 transition-all">
                        <div class="w-8 h-8 rounded-full bg-[#006399] flex items-center justify-center text-white font-bold text-sm shadow-sm">
                            {{ mb_substr(auth()->user()->nom ?? 'م', 0, 1) }}
                        </div>
                        <div class="hidden sm:flex flex-col items-start leading-tight">
                            <span class="text-sm font-bold text-slate-700">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</span>
                            <span class="text-[10px] text-slate-400 font-medium">{{ auth()->user()->role?->nom ?? 'مستخدم' }}</span>
                        </div>
                        <svg class="w-4 h-4 text-slate-400 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Panel -->
                    <div x-show="open" x-transition
                         class="absolute left-0 mt-2 w-52 bg-white rounded-xl shadow-lg border border-slate-100 py-1 z-50">
                        <div class="px-4 py-3 border-b border-slate-100">
                            <p class="text-sm font-bold text-slate-800">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</p>
                            <p class="text-xs text-slate-400 mt-0.5">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="{{ route('dashboard') }}"
                           class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 hover:text-[#006399] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            لوحة القيادة
                        </a>
                        <div class="border-t border-slate-100 mt-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    تسجيل الخروج
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
