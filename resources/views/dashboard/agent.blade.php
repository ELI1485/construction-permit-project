@extends('layouts.app')

@section('title', 'لوحة قيادة الموظف')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800 mb-1">مرحباً، {{ auth()->user()->name ?? 'الموظف' }}</h1>
    <p class="text-slate-500 text-sm">لديك مهام تحتاج للمعالجة اليوم.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 border-r-4 border-r-amber-500">
        <p class="text-slate-500 text-sm font-medium mb-1">ملفات بانتظار المراجعة</p>
        <h3 class="text-2xl font-bold text-slate-800">8</h3>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 border-r-4 border-r-blue-500">
        <p class="text-slate-500 text-sm font-medium mb-1">لجان مبرمجة اليوم</p>
        <h3 class="text-2xl font-bold text-slate-800">2</h3>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4">الملفات المستعجلة</h3>
    <ul class="space-y-4">
        <li class="flex justify-between items-center bg-slate-50 p-4 rounded-xl">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-xs">مهم</div>
                <div>
                    <h4 class="font-bold text-slate-800">ملف رقم #REQ-2026-042</h4>
                    <p class="text-sm text-slate-500">تجاوز الأجل القانوني بيومين</p>
                </div>
            </div>
            <a href="/permits/show" class="text-blue-600 hover:underline text-sm font-bold">معالجة فورية</a>
        </li>
    </ul>
</div>
@endsection
