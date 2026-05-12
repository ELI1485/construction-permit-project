<div class="flex grow flex-col gap-y-5 overflow-y-auto bg-navy-800 px-6 pb-4">
    {{-- Logo --}}
    <div class="flex h-16 shrink-0 items-center gap-3 border-b border-navy-700 pb-2 mt-4">
        <x-logo class="h-10 w-10" />
        <span class="text-lg font-bold text-white tracking-tight">PermisConstruct</span>
    </div>

    {{-- Navigation --}}
    <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
                <ul role="list" class="-mx-2 space-y-1">
                    @php $role = auth()->user()->role?->nom; @endphp

                    {{-- Dashboard link for all roles --}}
                    @if($role === 'citoyen')
                        <x-sidebar-link href="{{ route('citizen.dashboard') }}" icon="home" :active="request()->routeIs('citizen.dashboard')">Tableau de bord</x-sidebar-link>
                        <x-sidebar-link href="{{ route('citizen.permits') }}" icon="document" :active="request()->routeIs('citizen.permits*')">Mes Permis</x-sidebar-link>
                        <x-sidebar-link href="{{ route('citizen.permits.create') }}" icon="plus" :active="request()->routeIs('citizen.permits.create')">Nouveau Permis</x-sidebar-link>
                    @elseif($role === 'architecte')
                        <x-sidebar-link href="{{ route('architect.dashboard') }}" icon="home" :active="request()->routeIs('architect.dashboard')">Tableau de bord</x-sidebar-link>
                        <x-sidebar-link href="{{ route('architect.permits') }}" icon="document" :active="request()->routeIs('architect.permits*')">Dossiers Assignés</x-sidebar-link>
                    @elseif($role === 'agent_urbanisme')
                        <x-sidebar-link href="{{ route('agent.dashboard') }}" icon="home" :active="request()->routeIs('agent.dashboard')">Tableau de bord</x-sidebar-link>
                        <x-sidebar-link href="{{ route('agent.permits') }}" icon="document" :active="request()->routeIs('agent.permits*')">Dossiers</x-sidebar-link>
                    @elseif($role === 'service_technique')
                        <x-sidebar-link href="{{ route('technical.dashboard') }}" icon="home" :active="request()->routeIs('technical.dashboard')">Tableau de bord</x-sidebar-link>
                        <x-sidebar-link href="{{ route('technical.permits') }}" icon="document" :active="request()->routeIs('technical.permits*')">Révisions Techniques</x-sidebar-link>
                    @elseif($role === 'administrateur')
                        <x-sidebar-link href="{{ route('admin.dashboard') }}" icon="home" :active="request()->routeIs('admin.dashboard')">Tableau de bord</x-sidebar-link>
                        <x-sidebar-link href="{{ route('admin.users') }}" icon="users" :active="request()->routeIs('admin.users*')">Utilisateurs</x-sidebar-link>
                        <x-sidebar-link href="{{ route('admin.roles.index') }}" icon="shield" :active="request()->routeIs('admin.roles*')">Rôles</x-sidebar-link>
                        <x-sidebar-link href="{{ route('admin.permissions.index') }}" icon="key" :active="request()->routeIs('admin.permissions*')">Permissions</x-sidebar-link>
                        <x-sidebar-link href="{{ route('admin.statistics') }}" icon="chart" :active="request()->routeIs('admin.statistics')">Statistiques</x-sidebar-link>
                        <x-sidebar-link href="{{ route('admin.archives') }}" icon="archive" :active="request()->routeIs('admin.archives')">Archives</x-sidebar-link>
                    @endif
                </ul>
            </li>

            <li>
                <div class="text-xs font-semibold leading-6 text-navy-300 uppercase tracking-wider">Général</div>
                <ul role="list" class="-mx-2 mt-2 space-y-1">
                    <x-sidebar-link href="{{ route('notifications.index') }}" icon="bell" :active="request()->routeIs('notifications*')">
                        Notifications
                        @php $unread = auth()->user()->notifications()->where('is_read', false)->count(); @endphp
                        @if($unread > 0)
                            <span class="ml-auto inline-flex items-center rounded-full bg-gold-500 px-2 py-0.5 text-xs font-medium text-navy-900">{{ $unread }}</span>
                        @endif
                    </x-sidebar-link>
                </ul>
            </li>

            {{-- User info at bottom --}}
            <li class="mt-auto">
                <div class="flex items-center gap-x-3 rounded-md px-2 py-3 border-t border-navy-700 pt-4">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gold-500 text-navy-900 font-bold text-sm">
                        {{ strtoupper(substr(auth()->user()->prenom ?? 'U', 0, 1)) }}{{ strtoupper(substr(auth()->user()->nom ?? '', 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</p>
                        <p class="text-xs text-navy-300 truncate">{{ ucfirst(str_replace('_', ' ', auth()->user()->role?->nom ?? '')) }}</p>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</div>
