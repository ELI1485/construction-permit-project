@extends('layouts.app')

@section('title', 'فضاء المهندس المعماري - رُخْصَتِي')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 mb-1">
                مرحباً، {{ auth()->user()->nom }} {{ auth()->user()->prenom }} 👋
            </h1>
            <p class="text-slate-500 text-sm">فضاء المهندس المعماري — متابعة المشاريع ورفع المخططات.</p>
        </div>
        <a href="{{ route('permits.create') }}"
           class="inline-flex items-center gap-2 bg-[#006399] text-white px-5 py-2.5 rounded-xl font-bold hover:bg-[#005180] transition-colors shadow-md shadow-blue-200 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            إيداع ملف مشروع جديد
        </a>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 border-r-4 border-r-[#006399]">
            <p class="text-slate-500 text-sm font-medium mb-1">مشاريع بوصفي مهندساً</p>
            <h3 class="text-3xl font-extrabold text-slate-800">{{ $permits->total() }}</h3>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 border-r-4 border-r-amber-400">
            <p class="text-slate-500 text-sm font-medium mb-1">قيد الدراسة</p>
            <h3 class="text-3xl font-extrabold text-slate-800">
                {{ $permits->filter(fn($p) => str_contains($p->status?->nom ?? '', 'étude'))->count() }}
            </h3>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 border-r-4 border-r-emerald-400">
            <p class="text-slate-500 text-sm font-medium mb-1">مقبول</p>
            <h3 class="text-3xl font-extrabold text-slate-800">
                {{ $permits->filter(fn($p) => str_contains($p->status?->nom ?? '', 'Validé'))->count() }}
            </h3>
        </div>
    </div>

    {{-- Permits Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">ملفاتي كمهندس معماري</h3>
            <span class="text-xs font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-600">{{ $permits->total() }} ملف</span>
        </div>

        @if($permits->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-right text-sm">
                    <thead class="bg-slate-50 text-slate-500 border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4 font-medium">رقم المرجع</th>
                            <th class="px-6 py-4 font-medium">المواطن</th>
                            <th class="px-6 py-4 font-medium">نوع الترخيص</th>
                            <th class="px-6 py-4 font-medium">تاريخ التقديم</th>
                            <th class="px-6 py-4 font-medium">الحالة</th>
                            <th class="px-6 py-4 font-medium text-center">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($permits as $permit)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-[#006399]">{{ $permit->reference_number }}</td>
                            <td class="px-6 py-4 text-slate-700">
                                {{ $permit->citizen?->nom }} {{ $permit->citizen?->prenom }}
                            </td>
                            <td class="px-6 py-4 text-slate-600">{{ $permit->permitType?->nom ?? '—' }}</td>
                            <td class="px-6 py-4 text-slate-500 text-xs">{{ $permit->created_at?->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold"
                                      style="background-color: {{ $permit->status?->couleur ?? '#6c757d' }}20; color: {{ $permit->status?->couleur ?? '#6c757d' }}; border: 1px solid {{ $permit->status?->couleur ?? '#6c757d' }}40">
                                    {{ $permit->status?->nom ?? '—' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('permits.show', $permit->id) }}"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-50 text-[#006399] rounded-lg text-xs font-bold hover:bg-[#006399] hover:text-white transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    عرض
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100">
                {{ $permits->links() }}
            </div>
        @else
            <div class="p-12 text-center text-slate-400 space-y-3">
                <svg class="w-12 h-12 mx-auto stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <p class="font-medium">لا توجد ملفات مرتبطة بحسابك بعد</p>
                <a href="{{ route('permits.create') }}" class="inline-block text-xs text-[#006399] font-bold underline hover:text-blue-800">ابدأ بإيداع ملفك الأول</a>
            </div>
        @endif
    </div>

</div>
@endsection
