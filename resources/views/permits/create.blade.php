@extends('layouts.app')

@section('title', 'تقديم طلب ترخيص جديد')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 mb-1">تقديم طلب ترخيص جديد</h1>
        <p class="text-slate-500 text-sm">يرجى تعبئة النموذج التالي بدقة لضمان معالجة طلبك بأسرع وقت.</p>
    </div>
    <a href="/permits" class="text-slate-500 hover:text-slate-700 bg-white border border-slate-200 px-4 py-2 rounded-lg font-medium transition-colors text-sm">
        عودة للقائمة
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden max-w-4xl">
    <!-- Progress Steps -->
    <div class="bg-slate-50/50 p-6 border-b border-slate-100">
        <div class="flex items-center justify-between relative">
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-slate-200 -z-10"></div>
            <div class="absolute right-0 top-1/2 -translate-y-1/2 w-1/3 h-1 bg-blue-600 -z-10"></div>
            
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow-sm">1</div>
                <span class="text-sm font-bold text-blue-600">البيانات الأساسية</span>
            </div>
            
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-white border-2 border-blue-600 text-blue-600 flex items-center justify-center font-bold shadow-sm">2</div>
                <span class="text-sm font-bold text-slate-700">تفاصيل المشروع</span>
            </div>
            
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-white border-2 border-slate-200 text-slate-400 flex items-center justify-center font-bold">3</div>
                <span class="text-sm font-medium text-slate-500">المرفقات والوثائق</span>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Field -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">نوع الترخيص <span class="text-red-500">*</span></label>
                <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    <option value="">اختر نوع الترخيص...</option>
                    <option value="building">رخصة بناء جديدة</option>
                    <option value="modification">رخصة تعديل/ترميم</option>
                    <option value="commercial">رخصة تجارية</option>
                </select>
            </div>

            <!-- Field -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">اسم صاحب الطلب / الشركة <span class="text-red-500">*</span></label>
                <input type="text" placeholder="أدخل الاسم الكامل" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </div>

            <!-- Field -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">رقم الهوية / السجل التجاري <span class="text-red-500">*</span></label>
                <input type="text" placeholder="رقم الهوية أو السجل" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </div>

            <!-- Field -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700">المدينة / المنطقة <span class="text-red-500">*</span></label>
                <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    <option value="">اختر المدينة...</option>
                    <option value="rabat">الرباط</option>
                    <option value="casablanca">الدار البيضاء</option>
                    <option value="marrakech">مراكش</option>
                </select>
            </div>
            
            <!-- Full Width Field -->
            <div class="space-y-2 md:col-span-2">
                <label class="block text-sm font-bold text-slate-700">ملاحظات إضافية</label>
                <textarea rows="4" placeholder="أي تفاصيل أخرى ترغب بإضافتها للطلب..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all resize-none"></textarea>
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-4 border-t border-slate-100 pt-6">
            <button type="button" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition-colors">إلغاء</button>
            <button type="button" class="px-8 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition-colors shadow-md shadow-blue-200">التالي: تفاصيل المشروع</button>
        </div>
    </form>
</div>
@endsection
