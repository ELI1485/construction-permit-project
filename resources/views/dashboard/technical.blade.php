@extends('layouts.app')

@section('title', 'اللجنة التقنية')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800 mb-1">الفضاء التقني</h1>
    <p class="text-slate-500 text-sm">مراجعة الجوانب التقنية وإبداء الرأي في الملفات.</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100">
        <h3 class="text-lg font-bold text-slate-800">ملفات تتطلب رأي تقني</h3>
    </div>
    <div class="p-0">
        <table class="w-full text-right text-sm">
            <thead class="bg-slate-50 text-slate-500 border-b border-slate-100">
                <tr>
                    <th class="px-6 py-4 font-medium">رقم الطلب</th>
                    <th class="px-6 py-4 font-medium">نوع المشروع</th>
                    <th class="px-6 py-4 font-medium">الآجل المتبقي</th>
                    <th class="px-6 py-4 font-medium text-center">إبداء الرأي</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-800">#REQ-2026-015</td>
                    <td class="px-6 py-4 text-slate-600">بناء مجمع سكني</td>
                    <td class="px-6 py-4 text-red-500 font-medium">يوم واحد</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg font-medium hover:bg-blue-100 transition-colors">مراجعة الملف</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
