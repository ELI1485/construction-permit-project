@extends('layouts.app')

@section('title', 'تعديل الترخيص')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">تعديل طلب الترخيص #REQ-2026-001</h1>
        <p class="text-slate-500 text-sm">تحديث بيانات الطلب أو إرفاق مستندات إضافية.</p>
    </div>
    <a href="/permits" class="text-slate-500 hover:text-slate-700 bg-white border border-slate-200 px-4 py-2 rounded-lg font-medium transition-colors text-sm">
        إلغاء التعديل
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden max-w-4xl">
    <form class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Field -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">نوع الترخيص <span class="text-red-500">*</span></label>
                <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    <option value="building" selected>رخصة بناء تجاري</option>
                    <option value="modification">رخصة تعديل/ترميم</option>
                    <option value="commercial">رخصة تجارية</option>
                </select>
            </div>

            <!-- Field -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">اسم صاحب الطلب / الشركة <span class="text-red-500">*</span></label>
                <input type="text" value="شركة الأفق للمقاولات" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </div>

            <!-- Field -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">المساحة الإجمالية (م²)</label>
                <input type="number" value="1250" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </div>

            <!-- Field -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">المدينة / المنطقة <span class="text-red-500">*</span></label>
                <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    <option value="casablanca" selected>الدار البيضاء - المعاريف</option>
                    <option value="rabat">الرباط</option>
                    <option value="marrakech">مراكش</option>
                </select>
            </div>
            
            <!-- Full Width Field -->
            <div class="space-y-2 md:col-span-2">
                <label class="block text-sm font-bold text-slate-700">ملاحظات إضافية</label>
                <textarea rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all resize-none">يرجى تسريع الإجراءات نظراً لبدء أعمال الحفر قريباً.</textarea>
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-4 border-t border-slate-100 pt-6">
            <button type="button" class="px-8 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition-colors shadow-md shadow-blue-200">حفظ التعديلات</button>
        </div>
    </form>
</div>
@endsection
