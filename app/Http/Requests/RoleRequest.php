<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request validation for creating/updating a role.
 */
class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $roleId = $this->route('role')?->id ?? $this->route('role');

        return [
            'nom' => 'required|string|max:100|unique:roles,nom,' . $roleId,
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom du rôle est obligatoire.',
            'nom.max'      => 'Le nom du rôle ne doit pas dépasser 100 caractères.',
            'nom.unique'   => 'Ce nom de rôle existe déjà.',
        ];
    }
}
