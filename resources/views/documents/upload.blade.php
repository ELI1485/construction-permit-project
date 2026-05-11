@extends('layouts.app')

@section('title', 'رفع وثيقة جديدة')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-1">إضافة وثيقة جديدة</h1>
        <p class="text-slate-500 text-sm">قم برفع الوثائق المتعلقة بطلبات التراخيص.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form class="space-y-6">
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">نوع الوثيقة</label>
                <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    <option value="">اختر نوع الوثيقة...</option>
                    <option value="plan">مخطط هندسي</option>
                    <option value="identity">وثيقة تعريفية</option>
                    <option value="property">سند ملكية</option>
                </select>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">الملف المرفق</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-xl hover:border-blue-500 hover:bg-blue-50/50 transition-all cursor-pointer group">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-400 group-hover:text-blue-500 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-slate-600 justify-center">
                            <label for="file-upload" class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                <span>اختر ملفاً للرفع</span>
                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">أو اسحب وأفلت الملف هنا</p>
                        </div>
                        <p class="text-xs text-slate-500">PNG, JPG, PDF حتى 10MB</p>
                    </div>
                </div>
            </div>

            <button type="button" class="w-full px-8 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition-colors shadow-md shadow-blue-200">رفع الوثيقة</button>
        </form>
    </div>
</div>
@endsection
