@props(['type' => 'info', 'message' => ''])

@php
    $classes = [
        'info' => 'bg-blue-50 text-blue-800 border-blue-200',
        'success' => 'bg-green-50 text-green-800 border-green-200',
        'warning' => 'bg-amber-50 text-amber-800 border-amber-200',
        'error' => 'bg-red-50 text-red-800 border-red-200',
    ][$type];
    
    $icon = [
        'info' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
        'success' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
        'warning' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>',
        'error' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
    ][$type];
@endphp

<div class="flex items-center p-4 mb-4 text-sm rounded-lg border {{ $classes }}" role="alert">
    <svg class="flex-shrink-0 inline w-5 h-5 me-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        {!! $icon !!}
    </svg>
    <span class="sr-only">تنبيه</span>
    <div>
        <span class="font-medium">{{ $message }}</span> {{ $slot }}
    </div>
</div>
