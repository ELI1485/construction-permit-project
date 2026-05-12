@extends('layouts.app')

@section('title', 'لوحة القيادة الإدارية - رُخْصَتِي')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-extrabold text-slate-800 mb-1">لوحة القيادة — الإدارة المركزية</h1>
        <p class="text-slate-500 text-sm">نظرة شاملة على أداء منصة رُخْصَتِي وحالة الملفات.</p>
    </div>

    {{-- KPI Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center text-[#006399] shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-medium">إجمالي المستخدمين</p>
                <h3 class="text-2xl font-extrabold text-slate-800">{{ number_format($totalUsers) }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-medium">إجمالي الطلبات</p>
                <h3 class="text-2xl font-extrabold text-slate-800">{{ number_format($totalPermits) }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl bg-red-50 flex items-center justify-center text-red-600 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-medium">ملفات عالية الخطورة</p>
                <h3 class="text-2xl font-extrabold text-slate-800">{{ $highRisk }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-medium">أنواع الحالات</p>
                <h3 class="text-2xl font-extrabold text-slate-800">{{ $byStatus->count() }}</h3>
            </div>
        </div>
    </div>

    {{-- Status Breakdown --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <h3 class="text-lg font-bold text-slate-800 mb-6">توزيع الطلبات حسب الحالة</h3>
        @if($byStatus->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($byStatus as $status)
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full" style="background-color: {{ $status->couleur ?? '#6c757d' }}"></div>
                        <span class="text-sm font-medium text-slate-700">{{ $status->nom }}</span>
                    </div>
                    <span class="text-lg font-extrabold text-slate-800">{{ $status->permits_count }}</span>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-slate-400 text-sm text-center py-6">لا توجد بيانات حالياً.</p>
        @endif
    </div>

    {{-- Admin Quick Links --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('users.index') }}" class="group bg-white border border-slate-200 rounded-2xl p-5 shadow-xs hover:border-[#006399] hover:shadow-md transition-all flex items-center gap-4">
            <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center text-[#006399] group-hover:bg-[#006399] group-hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <div>
                <p class="font-bold text-slate-800 text-sm">إدارة المستخدمين</p>
                <p class="text-xs text-slate-400 mt-0.5">الأدوار والصلاحيات</p>
            </div>
        </a>
        <a href="{{ route('admin.statistics') }}" class="group bg-white border border-slate-200 rounded-2xl p-5 shadow-xs hover:border-[#006399] hover:shadow-md transition-all flex items-center gap-4">
            <div class="w-11 h-11 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div>
                <p class="font-bold text-slate-800 text-sm">الإحصائيات المفصلة</p>
                <p class="text-xs text-slate-400 mt-0.5">تقارير الأداء الشهرية</p>
            </div>
        </a>
        <a href="{{ route('admin.archives') }}" class="group bg-white border border-slate-200 rounded-2xl p-5 shadow-xs hover:border-[#006399] hover:shadow-md transition-all flex items-center gap-4">
            <div class="w-11 h-11 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 group-hover:bg-slate-600 group-hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
            </div>
            <div>
                <p class="font-bold text-slate-800 text-sm">الأرشيف</p>
                <p class="text-xs text-slate-400 mt-0.5">الملفات المؤرشفة والمنتهية</p>
            </div>
        </a>
    </div>

</div>
@endsection
