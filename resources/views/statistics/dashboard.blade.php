@extends('layouts.app')

@section('title', 'لوحة القيادة والإحصائيات')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800 mb-2">نظرة عامة والإحصائيات</h1>
    <p class="text-slate-500">تابع حالة التراخيص والطلبات عبر المنصة.</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm font-medium">إجمالي التراخيص</p>
            <h3 class="text-2xl font-bold text-slate-800">1,245</h3>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm font-medium">مقبولة</p>
            <h3 class="text-2xl font-bold text-slate-800">854</h3>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm font-medium">قيد المعالجة</p>
            <h3 class="text-2xl font-bold text-slate-800">312</h3>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm font-medium">مرفوضة</p>
            <h3 class="text-2xl font-bold text-slate-800">79</h3>
        </div>
    </div>
</div>

<!-- Charts Area -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <h3 class="text-lg font-bold text-slate-800 mb-4">التطور الشهري للطلبات</h3>
        <div class="h-64 flex items-end justify-between gap-2 border-b border-slate-100 pb-4">
            <!-- Mock Chart Bars -->
            <div class="w-full bg-blue-100 rounded-t-sm h-[40%] hover:bg-blue-200 transition-colors"></div>
            <div class="w-full bg-blue-200 rounded-t-sm h-[60%] hover:bg-blue-300 transition-colors"></div>
            <div class="w-full bg-blue-300 rounded-t-sm h-[50%] hover:bg-blue-400 transition-colors"></div>
            <div class="w-full bg-blue-400 rounded-t-sm h-[80%] hover:bg-blue-500 transition-colors"></div>
            <div class="w-full bg-blue-500 rounded-t-sm h-[70%] hover:bg-blue-600 transition-colors"></div>
            <div class="w-full bg-blue-600 rounded-t-sm h-[90%] hover:bg-blue-700 transition-colors"></div>
            <div class="w-full bg-blue-700 rounded-t-sm h-[100%] hover:bg-blue-800 transition-colors"></div>
        </div>
        <div class="flex justify-between mt-2 text-xs text-slate-400 font-medium">
            <span>يناير</span>
            <span>فبراير</span>
            <span>مارس</span>
            <span>أبريل</span>
            <span>مايو</span>
            <span>يونيو</span>
            <span>يوليو</span>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <h3 class="text-lg font-bold text-slate-800 mb-4">النشاطات الأخيرة</h3>
        <div class="space-y-4">
            <div class="flex gap-4 items-start">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </div>
                <div>
                    <p class="text-slate-800 font-medium">تم تقديم طلب ترخيص جديد</p>
                    <p class="text-sm text-slate-500">رقم الطلب #12345 • قبل 10 دقائق</p>
                </div>
            </div>
            <div class="flex gap-4 items-start">
                <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <p class="text-slate-800 font-medium">الموافقة على الترخيص التجاري</p>
                    <p class="text-sm text-slate-500">رقم الطلب #12340 • قبل ساعتين</p>
                </div>
            </div>
            <div class="flex gap-4 items-start">
                <div class="w-10 h-10 rounded-full bg-amber-50 flex items-center justify-center text-amber-600 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <div>
                    <p class="text-slate-800 font-medium">مراجعة وثائق الطلب</p>
                    <p class="text-sm text-slate-500">رقم الطلب #12342 • قبل 5 ساعات</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
