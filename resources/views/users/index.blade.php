@extends('layouts.app')

@section('title', 'المستخدمين')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">إدارة المستخدمين</h1>
        <p class="text-slate-500 text-sm">إدارة حسابات وصلاحيات الموظفين والمواطنين.</p>
    </div>
    <a href="#" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
        إضافة مستخدم جديد
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <!-- Filter Bar -->
    <div class="p-4 border-b border-slate-100 flex gap-4">
        <div class="relative flex-1 max-w-md">
            <input type="text" placeholder="بحث بالاسم أو البريد..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-sm">
            <svg class="w-5 h-5 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <select class="bg-slate-50 border border-slate-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
            <option value="">جميع الأدوار</option>
            <option value="admin">مسؤول</option>
            <option value="employee">موظف</option>
            <option value="citizen">مواطن</option>
            <option value="architect">مهندس معماري</option>
        </select>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-right text-sm">
            <thead class="bg-slate-50 text-slate-500 border-b border-slate-100">
                <tr>
                    <th class="px-6 py-4 font-medium">المستخدم</th>
                    <th class="px-6 py-4 font-medium">البريد الإلكتروني</th>
                    <th class="px-6 py-4 font-medium">الدور / الصفة</th>
                    <th class="px-6 py-4 font-medium">الحالة</th>
                    <th class="px-6 py-4 font-medium text-center">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-medium text-slate-800 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">ي</div>
                        يوسف أحمد
                    </td>
                    <td class="px-6 py-4 text-slate-500">youssef@example.com</td>
                    <td class="px-6 py-4"><span class="bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-md text-xs font-medium border border-indigo-100">موظف</span></td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-green-600">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span> نشط
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button class="p-1.5 text-blue-600 hover:bg-blue-50 rounded transition-colors" title="تعديل"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-medium text-slate-800 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center font-bold">ف</div>
                        فاطمة الزهراء
                    </td>
                    <td class="px-6 py-4 text-slate-500">fatima@example.com</td>
                    <td class="px-6 py-4"><span class="bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-md text-xs font-medium border border-emerald-100">مهندس معماري</span></td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-green-600">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span> نشط
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button class="p-1.5 text-blue-600 hover:bg-blue-50 rounded transition-colors" title="تعديل"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
