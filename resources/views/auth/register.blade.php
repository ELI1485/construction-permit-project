<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription — {{ config('app.name', 'PermisConstruct') }}</title>
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
</head>
<body class="h-full font-sans">
    <div class="flex min-h-full">
        {{-- Left panel - Branding --}}
        <div class="hidden lg:flex lg:w-1/2 lg:flex-col lg:justify-center lg:items-center bg-navy-800 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-32 h-32 border-2 border-gold-500 rounded-full"></div>
                <div class="absolute bottom-20 right-20 w-48 h-48 border-2 border-gold-500 rounded-full"></div>
                <div class="absolute top-1/3 right-10 w-24 h-24 border border-gold-400 rounded-full"></div>
            </div>
            <div class="relative z-10 text-center px-12">
                <x-logo class="h-32 w-32 mx-auto mb-8" />
                <h1 class="text-3xl font-bold text-white mb-4">PermisConstruct</h1>
                <p class="text-navy-200 text-lg leading-relaxed">Rejoignez la plateforme et gérez vos demandes de permis de construire en toute simplicité.</p>
            </div>
        </div>

        {{-- Right panel - Register form --}}
        <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-16 overflow-y-auto">
            <div class="mx-auto w-full max-w-md">
                {{-- Mobile logo --}}
                <div class="lg:hidden flex flex-col items-center mb-8">
                    <x-logo class="h-16 w-16 mb-3" />
                    <h2 class="text-xl font-bold text-navy-800">PermisConstruct</h2>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mb-2">Créer un compte</h2>
                <p class="text-sm text-gray-500 mb-6">Remplissez les informations pour vous inscrire</p>

                @if ($errors->any())
                    <div class="mb-4 rounded-md bg-red-50 p-4 border border-red-200">
                        <ul class="list-disc list-inside text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none transition sm:text-sm"
                                placeholder="Nom">
                        </div>
                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none transition sm:text-sm"
                                placeholder="Prénom">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none transition sm:text-sm"
                            placeholder="votre@email.com">
                    </div>

                    <div>
                        <label for="cin" class="block text-sm font-medium text-gray-700 mb-1">CIN</label>
                        <input type="text" id="cin" name="cin" value="{{ old('cin') }}" required
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none transition sm:text-sm"
                            placeholder="AB123456">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="role_id" class="block text-sm font-medium text-gray-700 mb-1">Rôle</label>
                            <select id="role_id" name="role_id" required
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none transition sm:text-sm">
                                <option value="">Choisir...</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ ucfirst(str_replace('_', ' ', $role->nom)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="district_id" class="block text-sm font-medium text-gray-700 mb-1">District</label>
                            <select id="district_id" name="district_id" required
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none transition sm:text-sm">
                                <option value="">Choisir...</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                        {{ $district->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <input type="password" id="password" name="password" required
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none transition sm:text-sm"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-navy-800 focus:ring-2 focus:ring-navy-800/20 focus:outline-none transition sm:text-sm"
                            placeholder="••••••••">
                    </div>

                    <button type="submit" class="w-full rounded-lg bg-navy-800 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-navy-700 focus:outline-none focus:ring-2 focus:ring-navy-800 focus:ring-offset-2 transition mt-2">
                        Créer mon compte
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-500">
                    Déjà inscrit ?
                    <a href="{{ route('login') }}" class="font-semibold text-gold-600 hover:text-gold-500 transition">Se connecter</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
