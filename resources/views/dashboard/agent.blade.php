@extends('layouts.app')

@section('title', 'لوحة قيادة الموظف - رُخْصَتِي')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 mb-1">
                مرحباً، {{ auth()->user()?->nom }} {{ auth()->user()?->prenom }} 👋
            </h1>
            <p class="text-slate-500 text-sm">موظف مراجعة ملفات التراخيص — لديك <strong class="text-[#006399]">{{ $pending }}</strong> ملف ينتظر المعالجة.</p>
        </div>
        <a href="{{ route('permits.index') }}"
           class="inline-flex items-center gap-2 bg-[#006399] text-white px-5 py-2.5 rounded-xl font-bold hover:bg-[#005180] transition-colors shadow-md shadow-blue-200 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            عرض كل الملفات
        </a>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 border-r-4 border-r-amber-400">
            <p class="text-slate-500 text-sm font-medium mb-1">ملفات بانتظار المراجعة</p>
            <h3 class="text-3xl font-extrabold text-slate-800">{{ $pending }}</h3>
            <p class="text-xs text-amber-500 font-medium mt-1">قيد الدراسة والمعالجة</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 border-r-4 border-r-red-400">
            <p class="text-slate-500 text-sm font-medium mb-1">ملفات ذات خطورة عالية</p>
            <h3 class="text-3xl font-extrabold text-slate-800">{{ $highRisk }}</h3>
            <p class="text-xs text-red-500 font-medium mt-1">تتطلب مراجعة عاجلة</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 border-r-4 border-r-[#006399]">
            <p class="text-slate-500 text-sm font-medium mb-1">إجمالي الملفات المعروضة</p>
            <h3 class="text-3xl font-extrabold text-slate-800">{{ $recent->count() }}</h3>
            <p class="text-xs text-[#006399] font-medium mt-1">آخر الملفات الواردة</p>
        </div>
    </div>

    {{-- Permits Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">الملفات الأخيرة المستوجبة للمراجعة</h3>
            <span class="text-xs font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-600">{{ $recent->count() }} ملف</span>
        </div>

        @if($recent->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-right text-sm">
                    <thead class="bg-slate-50 text-slate-500 border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4 font-medium">رقم المرجع</th>
                            <th class="px-6 py-4 font-medium">المواطن</th>
                            <th class="px-6 py-4 font-medium">نوع الترخيص</th>
                            <th class="px-6 py-4 font-medium">الحالة</th>
                            <th class="px-6 py-4 font-medium">مستوى الخطورة</th>
                            <th class="px-6 py-4 font-medium text-center">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($recent as $permit)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-[#006399]">{{ $permit->reference_number }}</td>
                            <td class="px-6 py-4 text-slate-700">
                                {{ $permit->citizen?->nom }} {{ $permit->citizen?->prenom }}
                            </td>
                            <td class="px-6 py-4 text-slate-600">{{ $permit->permitType?->nom ?? '—' }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColors = [
                                        'Soumis' => 'bg-blue-50 text-blue-600 border-blue-200',
                                        "En cours d'étude" => 'bg-amber-50 text-amber-600 border-amber-200',
                                        'Validé techniquement' => 'bg-teal-50 text-teal-600 border-teal-200',
                                        'Validé administrativement' => 'bg-emerald-50 text-emerald-600 border-emerald-200',
                                        'Refusé' => 'bg-red-50 text-red-600 border-red-200',
                                        'Documents complémentaires demandés' => 'bg-orange-50 text-orange-600 border-orange-200',
                                    ];
                                    $statusClass = $statusColors[$permit->status?->nom] ?? 'bg-slate-100 text-slate-600 border-slate-200';
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold border {{ $statusClass }}">
                                    {{ $permit->status?->nom ?? '—' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($permit->risk_level === 'High')
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-200">عالية</span>
                                @elseif($permit->risk_level === 'Medium')
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-600 border border-amber-200">متوسطة</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-200">منخفضة</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('permits.show', $permit->id) }}"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 bg-[#006399] text-white rounded-lg text-xs font-bold hover:bg-[#005180] transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    مراجعة
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center text-slate-400 space-y-3">
                <svg class="w-12 h-12 mx-auto stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <p class="font-medium">لا توجد ملفات في الانتظار حالياً</p>
            </div>
        @endif
    </div>

</div>
@endsection
