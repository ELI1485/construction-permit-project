@extends('layouts.app')
@section('title', 'Notifications')
@section('page-title', 'Notifications')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @forelse ($notifications as $notification)
            <div class="card border-0 shadow-sm mb-3 {{ !$notification->is_read ? 'border-start border-warning border-3' : '' }}">
                <div class="card-body d-flex align-items-start gap-3">
                    <div class="flex-shrink-0">
                        @if(!$notification->is_read)
                            <div class="rounded-circle bg-warning" style="width:10px;height:10px;margin-top:6px;"></div>
                        @else
                            <div class="rounded-circle bg-secondary bg-opacity-25" style="width:10px;height:10px;margin-top:6px;"></div>
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start">
                            <h6 class="mb-1 fw-bold small">{{ $notification->titre }}</h6>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-2 small text-muted">{{ $notification->message }}</p>
                        <div class="d-flex gap-2">
                            @if($notification->permit)
                                <a href="{{ route('citizen.permits.show', $notification->permit_id) }}" class="btn btn-sm btn-outline-primary">Voir le dossier</a>
                            @endif
                            @if(!$notification->is_read)
                                <form method="POST" action="/notifications/{{ $notification->id }}/read" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Marquer lu</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5 text-muted">
                <i class="bi bi-bell-slash fs-1 d-block mb-3"></i>
                <p>Aucune notification pour le moment.</p>
            </div>
        @endforelse

        @if ($notifications->hasPages())
            <div class="mt-3">{{ $notifications->links() }}</div>
        @endif
    </div>
</div>
@endsection
