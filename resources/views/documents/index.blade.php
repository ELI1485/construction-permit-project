@extends('layouts.app')

@section('title', 'الوثائق')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">المكتبة الوثائقية</h1>
        <p class="text-slate-500 text-sm">إدارة وتصفح جميع الوثائق المرفقة بالطلبات.</p>
    </div>
    <button class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
        رفع وثيقة جديدة
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Document Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow group cursor-pointer">
        <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center text-red-600 mb-4 group-hover:scale-110 transition-transform">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
        </div>
        <h3 class="font-bold text-slate-800 mb-1">المخطط الهندسي للمشروع</h3>
        <p class="text-xs text-slate-500 mb-4">PDF • 2.4 MB • قبل يومين</p>
        <div class="flex items-center gap-2">
            <button class="flex-1 bg-slate-50 text-slate-600 py-2 rounded-lg font-medium hover:bg-slate-100 transition-colors text-sm">عرض</button>
            <button class="flex-1 bg-blue-50 text-blue-600 py-2 rounded-lg font-medium hover:bg-blue-100 transition-colors text-sm">تحميل</button>
        </div>
    </div>

    <!-- Document Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow group cursor-pointer">
        <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 mb-4 group-hover:scale-110 transition-transform">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <h3 class="font-bold text-slate-800 mb-1">صور الموقع</h3>
        <p class="text-xs text-slate-500 mb-4">JPG • 4.1 MB • قبل أسبوع</p>
        <div class="flex items-center gap-2">
            <button class="flex-1 bg-slate-50 text-slate-600 py-2 rounded-lg font-medium hover:bg-slate-100 transition-colors text-sm">عرض</button>
            <button class="flex-1 bg-blue-50 text-blue-600 py-2 rounded-lg font-medium hover:bg-blue-100 transition-colors text-sm">تحميل</button>
        </div>
    </div>
</div>
@endsection
