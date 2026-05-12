@extends('layouts.app')
@section('title', 'Notifications')
@section('page-title', 'Notifications')

@section('content')
<div class="space-y-4">
    @forelse ($notifications as $notification)
        <div class="bg-white shadow-sm rounded-xl border {{ $notification->is_read ? 'border-gray-100' : 'border-gold-300 bg-gold-50/30' }} overflow-hidden">
            <div class="px-6 py-4 flex items-start justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 mt-0.5">
                        @if(!$notification->is_read)
                            <div class="h-3 w-3 rounded-full bg-gold-500"></div>
                        @else
                            <div class="h-3 w-3 rounded-full bg-gray-300"></div>
                        @endif
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-navy-800">{{ $notification->titre }}</h4>
                        <p class="text-sm text-gray-600 mt-1">{{ $notification->message }}</p>
                        <div class="flex items-center gap-3 mt-2">
                            <span class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}</span>
                            @if($notification->permit)
                                <a href="{{ route('citizen.permits.show', $notification->permit_id) }}" class="text-xs font-medium text-navy-800 hover:text-gold-600">Voir le dossier</a>
                            @endif
                        </div>
                    </div>
                </div>
                @if(!$notification->is_read)
                    <form method="POST" action="/notifications/{{ $notification->id }}/read">
                        @csrf
                        <button type="submit" class="text-xs text-gray-500 hover:text-navy-800 font-medium whitespace-nowrap">Marquer lu</button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <div class="bg-white shadow-sm rounded-xl border border-gray-100 px-6 py-16 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/></svg>
            <p class="text-sm text-gray-500">Aucune notification pour le moment.</p>
        </div>
    @endforelse

    @if ($notifications->hasPages())
        <div class="pt-4">{{ $notifications->links() }}</div>
    @endif
</div>
@endsection
