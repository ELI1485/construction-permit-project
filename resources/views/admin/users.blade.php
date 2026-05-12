@extends('layouts.app')
@section('title', 'Gestion des Utilisateurs')
@section('page-title', 'Utilisateurs')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom">
        <h6 class="mb-0 fw-bold">Liste des utilisateurs</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="usersTable">
                <thead class="table-light">
                    <tr>
                        <th>Utilisateur</th>
                        <th>Email</th>
                        <th>CIN</th>
                        <th>Rôle</th>
                        <th>District</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:32px;height:32px;font-size:0.75rem;font-weight:700;">
                                        {{ strtoupper(substr($user->prenom ?? 'U', 0, 1)) }}{{ strtoupper(substr($user->nom ?? '', 0, 1)) }}
                                    </div>
                                    <span class="fw-medium">{{ $user->prenom }} {{ $user->nom }}</span>
                                </div>
                            </td>
                            <td class="text-muted small">{{ $user->email }}</td>
                            <td class="small">{{ $user->cin }}</td>
                            <td>
                                <form method="POST" action="/admin/users/{{ $user->id }}/role" class="d-inline">
                                    @csrf
                                    <select name="role_id" onchange="this.form.submit()" class="form-select form-select-sm" style="width:auto;">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $role->nom)) }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td class="text-muted small">{{ $user->district?->nom ?? '—' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if ($users->hasPages())
        <div class="card-footer bg-white">{{ $users->links() }}</div>
    @endif
</div>
@endsection

@push('scripts')
<script>$(document).ready(function() { $('#usersTable').DataTable({ language: { url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json' }, paging: false, info: false }); });</script>
@endpush
