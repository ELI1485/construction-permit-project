<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إنشاء حساب جديد - رخص</title>
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
<body class="bg-[#FDFDFC] text-slate-800 antialiased min-h-screen flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8 selection:bg-[#006399] selection:text-white">

    <div class="sm:mx-auto sm:w-full sm:max-w-xl text-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 group mb-2">
            <div class="w-12 h-12 rounded-xl bg-[#006399] flex items-center justify-center text-white shadow-md group-hover:scale-105 transition-transform">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
            </div>
            <span class="text-3xl font-extrabold text-[#006399] tracking-tight">رخص</span>
        </a>
        <h2 class="mt-4 text-center text-2xl font-bold text-slate-800 tracking-tight">
            إنشاء حساب جديد
        </h2>
        <p class="mt-2 text-center text-sm text-slate-500">
            في البداية، اختر نوع المستخدم الذي يتوافق تمامًا مع احتياجاتك أو وظيفتك.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-4xl">
        <div class="bg-white py-8 px-4 shadow-xl shadow-slate-100 border border-slate-100 rounded-2xl sm:px-10">
            
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

            <form class="space-y-8" action="{{ url('/register') }}" method="POST">
                @csrf

                <!-- ================= ROLE SELECTION GRID ================= -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-4 pb-2 border-b border-slate-100">
                        صفة المستخدم المطلوبة <span class="text-red-500">*</span>
                    </label>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($roles as $role)
                            @if($role->nom != 'administrateur')
                                <label class="relative flex items-center justify-between p-4 bg-white border-2 border-slate-100 rounded-xl cursor-pointer hover:border-blue-200 transition-all group overflow-hidden">
                                    <input type="radio" name="role_id" value="{{ $role->id }}" required class="peer sr-only">
                                    
                                    <!-- Role Texts -->
                                    <div class="space-y-1 pr-2 max-w-[80%]">
                                        <p class="text-sm font-bold text-slate-800 group-hover:text-[#006399] transition-colors">
                                            {{ $role->nom }}
                                        </p>
                                        <p class="text-xs text-slate-400 font-medium leading-relaxed">
                                            @if($role->nom == 'مواطن')
                                                الفرد الذي يقوم بتقديم الطلبات بصفته الشخصية
                                            @elseif(str_contains($role->nom, 'المعنوي'))
                                                ممثل مؤسسة خاصة أو عمومية (شركة، إدارة، جمعية، إلخ)
                                            @elseif(str_contains($role->nom, 'معماري'))
                                                عضو في الهيئة الجهوية للمهندسين المعماريين
                                            @elseif(str_contains($role->nom, 'طوبوغرافي'))
                                                عضو في الهيئة الجهوية للمساحين الطوبوغرافيين
                                            @elseif(str_contains($role->nom, 'منعش'))
                                                ممثل أحد المنعشين العقاريين المسؤول عن طلبات الربط بالشبكات
                                            @elseif(str_contains($role->nom, 'مختص'))
                                                مهندس متخصص مسؤول عن إعداد وتقديم الملفات التقنية الخاصة بالتجزئات والمجموعات السكنية
                                            @elseif(str_contains($role->nom, 'ترابية'))
                                                موظف أو ممثل منتخب في الجماعة الترابية، أو المقاطعة، أو الإقليم، أو العمالة
                                            @elseif(str_contains($role->nom, 'اللجنة'))
                                                موظف في مصلحة خارجية (ممثل عن إدارة وزارية، وكلاء الاتصال، المكاتب الوطنية)
                                            @elseif(str_contains($role->nom, 'الاتصالات'))
                                                ممثل شركة الاتصالات أو مزود الخدمة لطلبات احتلال الملك العام
                                            @elseif(str_contains($role->nom, 'الماء'))
                                                ممثل شركة شبكات الماء والكهرباء لطلبات الترخيص لاحتلال الملك العام
                                            @else
                                                مستخدم معتمد في المنصة
                                            @endif
                                        </p>
                                    </div>

                                    <!-- Side Icons -->
                                    <div class="text-slate-400 group-hover:text-[#006399] transition-colors pl-1">
                                        @if($role->nom == 'مواطن')
                                            <!-- Citizen silhouette -->
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                        @elseif(str_contains($role->nom, 'المعنوي'))
                                            <!-- Tie/Businessman -->
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 6h-1.5v11c0 .55-.45 1-1 1H8.5c-.55 0-1-.45-1-1V9H6c-.55 0-1-.45-1-1s.45-1 1-1h12c.55 0 1 .45 1 1s-.45 1-1 1z"/></svg>
                                        @elseif(str_contains($role->nom, 'معماري'))
                                            <!-- Drafting compass -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3L4 19h16L12 3zm0 5v4m-3 3h6"></path></svg>
                                        @elseif(str_contains($role->nom, 'طوبوغرافي'))
                                            <!-- Tripod / Surveyor -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19L12 5l7 14M12 12h.01M8 15h8"></path></svg>
                                        @elseif(str_contains($role->nom, 'منعش'))
                                            <!-- Developer hardhat -->
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3c-4.97 0-9 4.03-9 9v1h18v-1c0-4.97-4.03-9-9-9zm0 2c3.86 0 7 3.14 7 7H5c0-3.86 3.14-7 7-7z"/></svg>
                                        @elseif(str_contains($role->nom, 'مختص'))
                                            <!-- Specialized Engineer helmet -->
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 10v1a7 7 0 01-14 0v-1m14 0a2 2 0 00-2-2H7a2 2 0 00-2 2m14 0h-2M5 10h2"></path></svg>
                                        @elseif(str_contains($role->nom, 'ترابية'))
                                            <!-- Government Communes Building -->
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 7v2h22V7L12 2zM2 10h2v9H2v-9zm6 0h2v9H8v-9zm6 0h2v9h-2v-9zm6 0h2v9h-2v-9zM1 20h22v2H1v-2z"/></svg>
                                        @elseif(str_contains($role->nom, 'اللجنة'))
                                            <!-- Committee multiple users -->
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                                        @elseif(str_contains($role->nom, 'الاتصالات'))
                                            <!-- Antenna Waves -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                                        @else
                                            <!-- Wave streams -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                        @endif
                                    </div>

                                    <!-- Peer Checked Styles Overlay -->
                                    <div class="absolute inset-0 border-2 border-transparent peer-checked:border-[#006399] peer-checked:bg-blue-50/5 rounded-xl pointer-events-none transition-all"></div>
                                    
                                    <!-- Checked blue border element -->
                                    <div class="absolute top-0 right-0 w-2 h-full bg-[#006399] opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- ================= USER PROFILE INPUTS ================= -->
                <div class="border-t border-slate-100 pt-6">
                    <label class="block text-sm font-bold text-slate-700 mb-4">
                        البيانات الشخصية ومعلومات الدخول
                    </label>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="prenom" class="block text-sm font-bold text-slate-700 mb-2">
                                الاسم الشخصي <span class="text-red-500">*</span>
                            </label>
                            <input id="prenom" name="prenom" type="text" required value="{{ old('prenom') }}"
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm"
                                placeholder="محمد">
                        </div>

                        <div>
                            <label for="nom" class="block text-sm font-bold text-slate-700 mb-2">
                                الاسم العائلي <span class="text-red-500">*</span>
                            </label>
                            <input id="nom" name="nom" type="text" required value="{{ old('nom') }}"
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm"
                                placeholder="العلوي">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="cin" class="block text-sm font-bold text-slate-700 mb-2">
                                رقم البطاقة الوطنية (CIN) <span class="text-red-500">*</span>
                            </label>
                            <input id="cin" name="cin" type="text" required value="{{ old('cin') }}"
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm"
                                placeholder="AB123456">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-bold text-slate-700 mb-2">
                                البريد الإلكتروني <span class="text-red-500">*</span>
                            </label>
                            <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm"
                                placeholder="name@example.com">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="district_id" class="block text-sm font-bold text-slate-700 mb-2">
                            العمالة / الإقليم <span class="text-red-500">*</span>
                        </label>
                        <select id="district_id" name="district_id" required
                            class="block w-full px-4 py-3 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm">
                            <option value="">-- اختر الإقليم أو الجماعة --</option>
                            @foreach ($districts->groupBy('region') as $regionName => $regionDistricts)
                                <optgroup label="{{ $regionName }}">
                                    @foreach ($regionDistricts as $district)
                                        <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                            {{ $district->nom }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="password" class="block text-sm font-bold text-slate-700 mb-2">
                                كلمة المرور <span class="text-red-500">*</span>
                            </label>
                            <input id="password" name="password" type="password" required
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm"
                                placeholder="••••••••">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-2">
                                تأكيد كلمة المرور <span class="text-red-500">*</span>
                            </label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#006399]/20 focus:border-[#006399] transition-all text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-[#006399] hover:bg-[#005180] focus:outline-none focus:ring-4 focus:ring-[#006399]/20 transition-all mt-6">
                        تسجيل الحساب
                    </button>
                </div>
            </form>

            <!-- Login switch link -->
            <div class="mt-6 pt-6 border-t border-slate-100 text-center">
                <p class="text-sm text-slate-500">
                    هل لديك حساب مسبقاً؟
                    <a href="{{ route('login') }}" class="font-bold text-[#006399] hover:underline transition-all">
                        تسجيل الدخول
                    </a>
                </p>
                <a href="{{ url('/') }}" class="mt-4 text-xs text-slate-400 hover:text-slate-600 transition-colors inline-flex items-center gap-1">
                    العودة إلى الصفحة الرئيسية
                </a>
            </div>

        </div>
    </div>

</body>
</html>
