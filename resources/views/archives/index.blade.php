@extends('layouts.app')

@section('title', 'الأرشيف')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-1">الأرشيف المركزي</h1>
        <p class="text-slate-500 text-sm">الوصول للطلبات والتراخيص القديمة والمغلقة.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 text-center">
        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-slate-800 mb-2">لا يوجد ملفات في الأرشيف حالياً</h3>
        <p class="text-slate-500 max-w-md mx-auto">سيتم نقل جميع الطلبات المغلقة والمنتهية صلاحيتها إلى هذه الصفحة تلقائياً
            لضمان حفظها والرجوع إليها عند الحاجة.</p>
    </div>
@endsection