@extends('layouts.app')

@section('title', 'فضاء المواطن')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800 mb-1">فضاء المواطن</h1>
    <p class="text-slate-500 text-sm">متابعة حالة طلباتك واستخراج التراخيص الجاهزة.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <a href="/permits/create" class="bg-blue-600 text-white rounded-2xl p-6 shadow-sm shadow-blue-200 hover:bg-blue-700 transition-all flex flex-col items-center justify-center gap-3 h-32 group">
        <svg class="w-8 h-8 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        <span class="font-bold">تقديم طلب ترخيص جديد</span>
    </a>
    <a href="/permits" class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:border-blue-200 transition-all flex flex-col items-center justify-center gap-3 h-32 group">
        <svg class="w-8 h-8 text-blue-600 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <span class="font-bold text-slate-700">تتبع طلباتي السابقة</span>
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4">آخر التحديثات</h3>
    <div class="space-y-4">
        @include('components.alerts', ['type' => 'success', 'message' => 'تم إصدار رخصة البناء الخاصة بك. يمكنك تحميلها الآن.'])
        @include('components.alerts', ['type' => 'warning', 'message' => 'هناك فاتورة مستحقة الدفع لطلبك رقم #REQ-2026-005.'])
    </div>
</div>
@endsection
