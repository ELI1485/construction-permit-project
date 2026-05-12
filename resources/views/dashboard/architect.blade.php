@extends('layouts.app')

@section('title', 'فضاء المهندس المعماري')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800 mb-1">فضاء المهندس المعماري</h1>
    <p class="text-slate-500 text-sm">متابعة المشاريع ورفع المخططات الهندسية.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between">
        <div>
            <p class="text-slate-500 text-sm font-medium mb-1">مشاريع قيد الدراسة</p>
            <h3 class="text-2xl font-bold text-slate-800">4</h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex justify-center items-center">
        <a href="/permits/create" class="flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            إيداع ملف مشروع جديد
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4">ملاحظات اللجان على المخططات</h3>
    <div class="bg-amber-50 border border-amber-100 p-4 rounded-xl flex gap-4">
        <div class="text-amber-500 mt-1">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </div>
        <div>
            <h4 class="font-bold text-amber-800">ملف #REQ-2026-001</h4>
            <p class="text-sm text-amber-700">يرجى تعديل واجهة المبنى لتتطابق مع ضوابط التعمير بالمنطقة قبل تاريخ 20 مايو.</p>
            <a href="/documents/upload" class="inline-block mt-2 text-sm font-bold text-amber-800 hover:underline">رفع المخطط المعدل</a>
        </div>
    </div>
</div>
@endsection
