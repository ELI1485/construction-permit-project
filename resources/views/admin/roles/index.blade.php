@extends('layouts.app')
@section('title', 'Gestion des Rôles')
@section('page-title', 'Rôles')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.roles.create') }}" class="btn btn-navy"><i class="bi bi-plus-circle me-2"></i>Nouveau rôle</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class="fw-medium">{{ ucfirst(str_replace('_', ' ', $role->nom)) }}</td>
                            <td>
                                @forelse ($role->permissions as $perm)
                                    <span class="badge bg-light text-dark me-1">{{ $perm->nom }}</span>
                                @empty
                                    <span class="text-muted small">Aucune</span>
                                @endforelse
                            </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-outline-primary me-1">Modifier</a>
                                <form method="POST" action="{{ route('admin.roles.destroy', $role) }}" class="d-inline" onsubmit="return confirm('Supprimer ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
