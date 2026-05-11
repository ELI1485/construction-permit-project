@extends('layouts.app')

@section('title', 'معاينة الوثيقة')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <a href="javascript:history.back()" class="p-2 text-slate-400 hover:text-slate-600 bg-white rounded-lg border border-slate-200 shadow-sm transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
        <h1 class="text-xl font-bold text-slate-800">المخطط الهندسي للمشروع.pdf</h1>
    </div>
    <div class="flex gap-2 text-sm">
        <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg font-medium hover:bg-blue-100 transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            تحميل
        </button>
    </div>
</div>

<div class="bg-slate-200 rounded-2xl shadow-inner h-[80vh] flex items-center justify-center relative overflow-hidden">
    <div class="absolute inset-0 flex items-center justify-center opacity-50">
        <svg class="w-32 h-32 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
    </div>
    <span class="relative z-10 text-slate-500 font-medium">معاينة الوثيقة غير متاحة في هذا النموذج</span>
</div>
@endsection
