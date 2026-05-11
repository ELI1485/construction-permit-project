@extends('layouts.app')

@section('title', 'تفاصيل الترخيص')

@section('content')
<div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div class="flex items-center gap-4">
        <a href="/permits" class="p-2 text-slate-400 hover:text-slate-600 bg-white rounded-lg border border-slate-200 shadow-sm transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
        <div>
            <div class="flex items-center gap-3 mb-1">
                <h1 class="text-2xl font-bold text-slate-800">طلب رقم #REQ-2026-001</h1>
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-600 border border-amber-200">قيد المعالجة</span>
            </div>
            <p class="text-slate-500 text-sm">تم التقديم في 11 مايو 2026</p>
        </div>
    </div>
    <div class="flex gap-2 text-sm">
        <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-700 rounded-lg font-bold hover:bg-slate-50 transition-colors shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            طباعة
        </button>
        <button class="px-5 py-2.5 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition-colors shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
            تعديل الطلب
        </button>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Info -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 pb-4 border-b border-slate-100">المعلومات الأساسية</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <span class="block text-sm text-slate-400 font-medium mb-1">نوع الترخيص</span>
                    <span class="block text-slate-800 font-bold">رخصة بناء تجاري</span>
                </div>
                <div>
                    <span class="block text-sm text-slate-400 font-medium mb-1">صاحب الطلب</span>
                    <span class="block text-slate-800 font-bold">شركة الأفق للمقاولات</span>
                </div>
                <div>
                    <span class="block text-sm text-slate-400 font-medium mb-1">المنطقة / المدينة</span>
                    <span class="block text-slate-800 font-bold">الدار البيضاء - المعاريف</span>
                </div>
                <div>
                    <span class="block text-sm text-slate-400 font-medium mb-1">المساحة الإجمالية</span>
                    <span class="block text-slate-800 font-bold">1,250 متر مربع</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 pb-4 border-b border-slate-100">الوثائق المرفقة</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-100 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-red-100 text-red-600 flex items-center justify-center">
                            <span class="text-xs font-bold">PDF</span>
                        </div>
                        <div>
                            <p class="font-bold text-slate-700 text-sm">المخطط الهندسي المعتمد</p>
                            <p class="text-xs text-slate-400">تم الرفع في 11 مايو 2026</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </button>
                </div>
                <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-100 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                            <span class="text-xs font-bold">JPG</span>
                        </div>
                        <div>
                            <p class="font-bold text-slate-700 text-sm">صورة سند الملكية</p>
                            <p class="text-xs text-slate-400">تم الرفع في 11 مايو 2026</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Timeline Sidebar -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 h-fit">
        <h3 class="text-lg font-bold text-slate-800 mb-6">مسار الطلب</h3>
        <div class="space-y-6 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-200 before:to-transparent">
            
            <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white shrink-0 z-10 shadow-sm border-4 border-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div class="w-[calc(100%-3rem)] md:w-[calc(50%-2.5rem)] pr-4 md:pr-0 md:pl-4 text-right">
                    <div class="bg-slate-50 p-3 rounded-lg border border-slate-100">
                        <h4 class="font-bold text-slate-800 text-sm mb-1">تقديم الطلب</h4>
                        <time class="text-xs text-slate-400">11 مايو 2026, 09:00 ص</time>
                    </div>
                </div>
            </div>

            <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-amber-500 text-white shrink-0 z-10 shadow-sm border-4 border-white">
                    <div class="w-2.5 h-2.5 bg-white rounded-full"></div>
                </div>
                <div class="w-[calc(100%-3rem)] md:w-[calc(50%-2.5rem)] pr-4 md:pr-0 md:pl-4 text-right">
                    <div class="bg-amber-50 p-3 rounded-lg border border-amber-100">
                        <h4 class="font-bold text-amber-800 text-sm mb-1">مراجعة الوثائق</h4>
                        <time class="text-xs text-amber-600/70">قيد الإنجاز حالياً...</time>
                    </div>
                </div>
            </div>

            <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-200 shrink-0 z-10 border-4 border-white"></div>
                <div class="w-[calc(100%-3rem)] md:w-[calc(50%-2.5rem)] pr-4 md:pr-0 md:pl-4 text-right">
                    <div class="p-3">
                        <h4 class="font-bold text-slate-400 text-sm">الموافقة النهائية</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
