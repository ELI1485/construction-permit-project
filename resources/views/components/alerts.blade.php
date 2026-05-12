@if (session('success'))
    <div class="mb-4 rounded-md bg-green-50 p-4 border border-green-200">
        <div class="flex">
            <svg class="h-5 w-5 text-green-400 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
            <p class="ml-3 text-sm font-medium text-green-800">{{ session('success') }}</p>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="mb-4 rounded-md bg-red-50 p-4 border border-red-200">
        <div class="flex">
            <svg class="h-5 w-5 text-red-400 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd"/></svg>
            <p class="ml-3 text-sm font-medium text-red-800">{{ session('error') }}</p>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 rounded-md bg-red-50 p-4 border border-red-200">
        <div class="flex">
            <svg class="h-5 w-5 text-red-400 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">Des erreurs sont survenues</h3>
                <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
