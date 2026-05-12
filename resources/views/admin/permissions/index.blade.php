@extends('layouts.app')
@section('title', 'Gestion des Permissions')
@section('page-title', 'Permissions')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.permissions.create') }}" class="btn btn-navy"><i class="bi bi-plus-circle me-2"></i>Nouvelle permission</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Rôles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="fw-medium">{{ $permission->nom }}</td>
                            <td class="text-muted small">{{ Str::limit($permission->description, 50) ?? '—' }}</td>
                            <td>
                                @forelse ($permission->roles as $role)
                                    <span class="badge bg-light text-dark">{{ $role->nom }}</span>
                                @empty
                                    <span class="text-muted small">Aucun</span>
                                @endforelse
                            </td>
                            <td>
                                <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-sm btn-outline-primary me-1">Modifier</a>
                                <form method="POST" action="{{ route('admin.permissions.destroy', $permission) }}" class="d-inline" onsubmit="return confirm('Supprimer ?')">
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
