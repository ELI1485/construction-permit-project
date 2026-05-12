@extends('layouts.app')

@section('title', 'لوحة قيادة الإدارة')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800 mb-1">لوحة القيادة - الإدارة المركزية</h1>
    <p class="text-slate-500 text-sm">نظرة شاملة على أداء المنصة والملفات العالقة.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm font-medium">إجمالي المستخدمين</p>
            <h3 class="text-2xl font-bold text-slate-800">4,521</h3>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm font-medium">ملفات متجاوزة للأجل</p>
            <h3 class="text-2xl font-bold text-slate-800">14</h3>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
    <h3 class="text-lg font-bold text-slate-800 mb-4">التوزيع الشهري للطلبات</h3>
    @include('components.charts')
</div>
@endsection
