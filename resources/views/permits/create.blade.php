<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soumettre une nouvelle demande de licence - licences</title>
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
<body class="bg-[#FDFDFC] text-slate-800 antialiased min-h-screen flex flex-col selection:bg-[#006399] selection:text-white">

    <!-- Clean Top Bar without admin menus -->
    <header class="bg-white border-b border-slate-100 py-4 px-6 sticky top-0 z-50 shadow-xs">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                <div class="w-10 h-10 rounded-lg bg-[#006399] flex items-center justify-center text-white font-bold shadow-sm group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                </div>
                <span class="text-2xl font-bold text-[#006399] tracking-tight">Bon marché</span>
            </a>
            
            <a href="{{ url('/') }}" class="text-sm font-bold text-slate-500 hover:text-[#006399] transition-colors flex items-center gap-1 bg-slate-50 hover:bg-blue-50/50 py-2 px-4 rounded-xl border border-slate-100">
                Retour à la page principale
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
        </div>
    </header>

    <main class="flex-grow py-10 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-extrabold text-slate-800 mb-2">Soumettre une nouvelle demande de licence</h1>
                <p class="text-slate-500 text-base max-w-xl mx-auto">Veuillez suivre attentivement les trois étapes ci-dessous pour garantir que votre candidature soit traitée avec succès par voie numérique..</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl shadow-slate-100 border border-slate-100 overflow-hidden">
                <!-- Dynamic Progress Steps Indicator -->
                <div class="bg-slate-50/80 p-6 border-b border-slate-100 relative">
                    <div class="flex items-center justify-between relative max-w-2xl mx-auto">
                        <!-- Background static tracks -->
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-slate-200 -z-10 rounded-full"></div>
                        <!-- Animated blue sub-track -->
                        <div id="progressBar" class="absolute right-0 top-1/2 -translate-y-1/2 w-0 h-1 bg-[#006399] -z-10 transition-all duration-500 ease-out rounded-full"></div>
                        
                        <!-- Indicator 1 -->
                        <div class="flex flex-col items-center gap-2">
                            <div id="indicatorCircle1" class="w-10 h-10 rounded-full bg-[#006399] text-white flex items-center justify-center font-bold shadow-md transition-all duration-300">
                                1
                            </div>
                            <span id="indicatorLabel1" class="text-xs sm:text-sm font-bold text-[#006399] transition-colors duration-300">Données de base</span>
                        </div>
                        
                        <!-- Indicator 2 -->
                        <div class="flex flex-col items-center gap-2">
                            <div id="indicatorCircle2" class="w-10 h-10 rounded-full bg-white border-2 border-slate-300 text-slate-400 flex items-center justify-center font-bold shadow-xs transition-all duration-300">
                                2
                            </div>
                            <span id="indicatorLabel2" class="text-xs sm:text-sm font-bold text-slate-400 transition-colors duration-300">Détails du projet</span>
                        </div>
                        
                        <!-- Indicator 3 -->
                        <div class="flex flex-col items-center gap-2">
                            <div id="indicatorCircle3" class="w-10 h-10 rounded-full bg-white border-2 border-slate-300 text-slate-400 flex items-center justify-center font-bold transition-all duration-300">
                                3
                            </div>
                            <span id="indicatorLabel3" class="text-xs sm:text-sm font-medium text-slate-400 transition-colors duration-300">Pièces jointes et documents</span>
                        </div>
                    </div>
                </div>

                <!-- Form Wizard Container -->
                <form id="permitForm" class="p-6 sm:p-10" action="{{ url('/permits') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    @if(session('success'))
                        <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-100 text-green-700 font-bold text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 text-red-700 text-sm">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- ================= STEP 1 ================= -->
                    <div id="step1" class="wizard-step space-y-6 animate-fadeIn transition-all duration-300">
                        <div class="border-b border-slate-100 pb-4 mb-6">
                            <h2 class="text-lg font-bold text-slate-800">Première étape: Déterminer le type et l'emplacement de la licence</h2>
                            <p class="text-slate-400 text-xs mt-1">Premières informations pour orienter le dossier vers la main d'œuvre compétente</p>
                        </div>

                        <div class="space-y-8">
                            <!-- Permit Type Visual Selection Cards -->
                            <div class="space-y-3">
                                <label class="block text-sm font-bold text-slate-700">Domaine / Type de permis requis <span class="text-red-500">*</span></label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                    @foreach(\App\Models\PermitType::all() as $type)
                                        <label class="relative flex flex-col items-center justify-between p-6 bg-white border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-blue-200 hover:shadow-md transition-all group overflow-hidden">
                                            <input type="radio" name="permit_type_id" value="{{ $type->id }}" required class="peer sr-only">
                                            
                                            <!-- Icon wrapper based on permit name -->
                                            <div class="w-20 h-20 mb-4 rounded-full bg-gradient-to-b from-blue-300 via-blue-400 to-[#006399] flex items-center justify-center text-white shadow-inner group-hover:scale-105 transition-transform relative">
                                                @if(str_contains($type->nom, 'Économique'))
                                                    <!-- Avatar with Cap icon -->
                                                    <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm0 2a5 5 0 00-5 5v1h10v-1a5 5 0 00-5-5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 15c1.5 1 4.5 1 6 0"></path></svg>
                                                @elseif(str_contains($type->nom, 'Reconstruction'))
                                                    <!-- Hard hat/Helmet icon -->
                                                    <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 10v1a7 7 0 01-14 0v-1m14 0a2 2 0 00-2-2H7a2 2 0 00-2 2m14 0h-2M5 10h2m5-6v2m-4-1l1 1m6-1l-1 1"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 15c1.5 1 4.5 1 6 0"></path></svg>
                                                @elseif(str_contains($type->nom, 'Enchaînement'))
                                                    <!-- Lightbulb / streams icon -->
                                                    <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 13c1 .8 3 .8 4 0"></path></svg>
                                                @else
                                                    <!-- Classic multi-functional smile icon -->
                                                    <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0"></path></svg>
                                                @endif
                                            </div>

                                            <!-- Label text -->
                                            <span class="text-xs sm:text-sm font-bold text-slate-800 text-center leading-relaxed">{{ $type->nom }}</span>
                                            
                                            <!-- Checked active overlay styling -->
                                            <div class="absolute inset-0 border-2 border-transparent peer-checked:border-[#006399] peer-checked:bg-blue-50/5 rounded-2xl pointer-events-none transition-all"></div>
                                            
                                            <!-- Active Checkmark Indicator Badge -->
                                            <div class="absolute top-3 left-3 w-6 h-6 bg-[#006399] text-white rounded-full opacity-0 peer-checked:opacity-100 flex items-center justify-center transition-opacity shadow-xs">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- District Selection -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-slate-700">Emploi / Territoire / Zone <span class="text-red-500">*</span></label>
                                <select id="district_id" name="district_id" required class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm font-medium">
                                    <option value="">Sélectionnez la ville ou la communauté...</option>
                                    @foreach(\App\Models\District::all()->groupBy('region') as $regionName => $regionDistricts)
                                        <optgroup label="{{ $regionName }}">
                                            @foreach($regionDistricts as $dist)
                                                <option value="{{ $dist->id }}" {{ old('district_id') == $dist->id ? 'selected' : '' }}>{{ $dist->nom }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end gap-4 border-t border-slate-100 pt-6">
                            <a href="{{ url('/') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition-colors inline-block text-sm">annulation</a>
                            <button type="button" onclick="nextStep(1)" class="px-8 py-3 bg-[#006399] text-white rounded-xl font-bold hover:bg-[#005180] transition-colors shadow-md shadow-blue-200 text-sm flex items-center gap-2">
                                le prochain: Détails du projet
                                <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- ================= STEP 2 ================= -->
                    <div id="step2" class="wizard-step space-y-6 hidden animate-fadeIn transition-all duration-300">
                        <div class="border-b border-slate-100 pb-4 mb-6">
                            <h2 class="text-lg font-bold text-slate-800">La deuxième étape: Caractéristiques techniques du projet</h2>
                            <p class="text-slate-400 text-xs mt-1">Déterminer le nom, la zone et la situation géographique du projet</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Project Title -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-slate-700">Nom du demandeur / Titre du projet <span class="text-red-500">*</span></label>
                                <input id="project_title" type="text" name="project_title" required value="{{ old('project_title') }}" placeholder="Entrez votre nom complet ou votre désignation officielle" class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm font-medium">
                            </div>

                            <!-- Surface Area -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-slate-700">Espace projet (En mètres carrés) <span class="text-red-500">*</span></label>
                                <input id="surface" type="number" name="surface" required min="1" value="{{ old('surface') }}" placeholder="exemple: 120" class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm font-medium">
                            </div>

                            <!-- Address / Observations -->
                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-sm font-bold text-slate-700">Notes supplémentaires ou détails du titre complet <span class="text-red-500">*</span></label>
                                <textarea id="project_address" rows="4" name="project_address" required placeholder="Entrez les détails de l'adresse et les numéros de parcelle avec précision..." class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all resize-none text-sm font-medium">{{ old('project_address') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-between items-center border-t border-slate-100 pt-6">
                            <button type="button" onclick="prevStep(2)" class="px-6 py-3 bg-white border border-slate-200 text-slate-600 rounded-xl font-bold hover:bg-slate-50 transition-colors text-sm flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                le précédent
                            </button>
                            
                            <button type="button" onclick="nextStep(2)" class="px-8 py-3 bg-[#006399] text-white rounded-xl font-bold hover:bg-[#005180] transition-colors shadow-md shadow-blue-200 text-sm flex items-center gap-2">
                                le prochain: Pièces jointes et documents
                                <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- ================= STEP 3 ================= -->
                    <div id="step3" class="wizard-step space-y-6 hidden animate-fadeIn transition-all duration-300">
                        <div class="border-b border-slate-100 pb-4 mb-6">
                            <h2 class="text-lg font-bold text-slate-800">La troisième étape: Mise en ligne de documents administratifs et de pièces jointes</h2>
                            <p class="text-slate-400 text-xs mt-1">Merci de joindre les pièces justificatives au dossier de construction pour audit technique et administratif</p>
                        </div>

                        <!-- Instruction Box -->
                        <div class="bg-blue-50/50 border border-blue-100 rounded-xl p-4 text-xs sm:text-sm text-blue-900 space-y-2">
                            <p class="font-bold text-[#006399]">Documents obligatoires à déposer:</p>
                            <ul class="list-disc list-inside space-y-1 text-slate-700 font-medium">
                                <li>Une copie de la carte d'identité nationale (CIN) Pour le propriétaire</li>
                                <li>Certificat de propriété ou contrat de location notarié</li>
                                <li>Conceptions techniques et architecturales (Sous forme de PDF)</li>
                            </ul>
                        </div>

                        <!-- Documents File Upload Input -->
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-700">Télécharger des fichiers (PDF Ou des photos) <span class="text-red-500">*</span></label>
                            <div class="relative border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:border-[#006399] transition-colors bg-slate-50/50">
                                <input id="documents" type="file" name="documents[]" multiple required accept=".pdf,.jpg,.jpeg,.png" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                <div class="flex flex-col items-center gap-2 pointer-events-none">
                                    <svg class="w-10 h-10 text-[#006399]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="text-sm font-bold text-slate-700">Cliquez ici pour sélectionner des fichiers ou faites-les glisser et déposez-les</p>
                                    <p class="text-xs text-slate-400">Maximum par fichier: 10 Mo</p>
                                </div>
                            </div>
                            <div id="fileList" class="mt-2 flex flex-wrap gap-2"></div>
                        </div>

                        <div class="mt-8 flex justify-between items-center border-t border-slate-100 pt-6">
                            <button type="button" onclick="prevStep(3)" class="px-6 py-3 bg-white border border-slate-200 text-slate-600 rounded-xl font-bold hover:bg-slate-50 transition-colors text-sm flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                le précédent
                            </button>
                            
                            <button type="submit" class="px-8 py-3 bg-[#006399] text-white rounded-xl font-bold hover:bg-[#005180] transition-all shadow-md shadow-blue-200 text-sm flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Déposer la demande et faire le suivi du projet
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </main>

    <!-- Pure Vanilla JS for Multi-step Wizard & File Previews -->
    <script>
        function nextStep(currentStep) {
            // Validate all form fields inside the current step wrapper before advancing
            const stepContainer = document.getElementById('step' + currentStep);
            const inputs = stepContainer.querySelectorAll('input, select, textarea');
            
            for (let input of inputs) {
                if (!input.checkValidity()) {
                    input.reportValidity(); // Triggers native browser input tooltip/warning
                    return; // Abort navigation if step isn't valid
                }
            }

            // Slide out current step, slide in next step
            document.getElementById('step' + currentStep).classList.add('hidden');
            const targetStep = currentStep + 1;
            document.getElementById('step' + targetStep).classList.remove('hidden');

            // Animate progress indicators
            updateIndicators(targetStep);
            window.scrollTo({ top: document.querySelector('.wizard-step:not(.hidden)').offsetTop - 120, behavior: 'smooth' });
        }

        function prevStep(currentStep) {
            document.getElementById('step' + currentStep).classList.add('hidden');
            const targetStep = currentStep - 1;
            document.getElementById('step' + targetStep).classList.remove('hidden');

            updateIndicators(targetStep);
            window.scrollTo({ top: document.querySelector('.wizard-step:not(.hidden)').offsetTop - 120, behavior: 'smooth' });
        }

        function updateIndicators(step) {
            const bar = document.getElementById('progressBar');
            const c1 = document.getElementById('indicatorCircle1');
            const l1 = document.getElementById('indicatorLabel1');
            const c2 = document.getElementById('indicatorCircle2');
            const l2 = document.getElementById('indicatorLabel2');
            const c3 = document.getElementById('indicatorCircle3');
            const l3 = document.getElementById('indicatorLabel3');

            if (step === 1) {
                bar.style.width = '0%';
                
                // Active 1
                c1.className = "w-10 h-10 rounded-full bg-[#006399] text-white flex items-center justify-center font-bold shadow-md transition-all duration-300";
                l1.className = "text-xs sm:text-sm font-bold text-[#006399] transition-colors duration-300";
                
                // Muted 2
                c2.className = "w-10 h-10 rounded-full bg-white border-2 border-slate-300 text-slate-400 flex items-center justify-center font-bold shadow-xs transition-all duration-300";
                l2.className = "text-xs sm:text-sm font-bold text-slate-400 transition-colors duration-300";
                
                // Muted 3
                c3.className = "w-10 h-10 rounded-full bg-white border-2 border-slate-300 text-slate-400 flex items-center justify-center font-bold transition-all duration-300";
                l3.className = "text-xs sm:text-sm font-medium text-slate-400 transition-colors duration-300";
            } 
            else if (step === 2) {
                bar.style.width = '50%';
                
                // Completed 1
                c1.className = "w-10 h-10 rounded-full bg-[#006399] text-white flex items-center justify-center font-bold shadow-md transition-all duration-300";
                c1.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>`;
                l1.className = "text-xs sm:text-sm font-bold text-[#006399] transition-colors duration-300";
                
                // Active 2
                c2.className = "w-10 h-10 rounded-full bg-white border-2 border-[#006399] text-[#006399] flex items-center justify-center font-bold shadow-md transition-all duration-300";
                l2.className = "text-xs sm:text-sm font-bold text-[#006399] transition-colors duration-300";
                
                // Muted 3
                c3.className = "w-10 h-10 rounded-full bg-white border-2 border-slate-300 text-slate-400 flex items-center justify-center font-bold transition-all duration-300";
                l3.className = "text-xs sm:text-sm font-medium text-slate-400 transition-colors duration-300";
            } 
            else if (step === 3) {
                bar.style.width = '100%';
                
                // Completed 1
                c1.className = "w-10 h-10 rounded-full bg-[#006399] text-white flex items-center justify-center font-bold shadow-md transition-all duration-300";
                c1.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>`;
                l1.className = "text-xs sm:text-sm font-bold text-[#006399] transition-colors duration-300";
                
                // Completed 2
                c2.className = "w-10 h-10 rounded-full bg-[#006399] text-white flex items-center justify-center font-bold shadow-md transition-all duration-300";
                c2.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>`;
                l2.className = "text-xs sm:text-sm font-bold text-[#006399] transition-colors duration-300";
                
                // Active 3
                c3.className = "w-10 h-10 rounded-full bg-white border-2 border-[#006399] text-[#006399] flex items-center justify-center font-bold shadow-md transition-all duration-300";
                l3.className = "text-xs sm:text-sm font-bold text-[#006399] transition-colors duration-300";
            }
        }

        // Live preview of uploaded files names
        const fileInput = document.getElementById('documents');
        const fileList = document.getElementById('fileList');

        if (fileInput) {
            fileInput.addEventListener('change', function() {
                fileList.innerHTML = '';
                for (let file of this.files) {
                    const badge = document.createElement('span');
                    badge.className = "inline-flex items-center gap-1.5 px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-lg border border-blue-100";
                    badge.innerHTML = `
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        ${file.name}
                    `;
                    fileList.appendChild(badge);
                }
            });
        }
    </script>

</body>
</html>
