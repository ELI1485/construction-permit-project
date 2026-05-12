<header class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
    {{-- Mobile menu button --}}
    <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
        <span class="sr-only">Ouvrir le menu</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
    </button>

    <div class="h-6 w-px bg-gray-200 lg:hidden"></div>

    <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
        {{-- Page title --}}
        <div class="flex items-center">
            <h1 class="text-lg font-semibold text-navy-800">@yield('page-title', 'Tableau de bord')</h1>
        </div>

        <div class="flex flex-1 items-center justify-end gap-x-4 lg:gap-x-6">
            {{-- Notifications --}}
            <a href="{{ route('notifications.index') }}" class="relative -m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/></svg>
                @php $unreadCount = auth()->user()->notifications()->where('is_read', false)->count(); @endphp
                @if($unreadCount > 0)
                    <span class="absolute -top-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-gold-500 text-xs font-bold text-navy-900">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</span>
                @endif
            </a>

            <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-200"></div>

            {{-- User dropdown --}}
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center gap-x-2 -m-1.5 p-1.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-navy-800 text-white text-sm font-bold">
                        {{ strtoupper(substr(auth()->user()->prenom ?? 'U', 0, 1)) }}
                    </div>
                    <span class="hidden lg:flex lg:items-center">
                        <span class="text-sm font-medium text-gray-700">{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</span>
                        <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
                    </span>
                </button>
                <div x-show="open" @click.away="open = false" x-cloak x-transition class="absolute right-0 z-10 mt-2.5 w-48 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full px-3 py-1 text-left text-sm text-gray-900 hover:bg-gray-50">Se déconnecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
