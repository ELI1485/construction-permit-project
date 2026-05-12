<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request validation for creating/updating a permission.
 */
class PermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $permissionId = $this->route('permission')?->id ?? $this->route('permission');

        return [
            'nom'         => 'required|string|max:150|unique:permissions,nom,' . $permissionId,
            'description' => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required'     => 'Le nom de la permission est obligatoire.',
            'nom.max'          => 'Le nom ne doit pas dépasser 150 caractères.',
            'nom.unique'       => 'Ce nom de permission existe déjà.',
            'description.max'  => 'La description ne doit pas dépasser 2000 caractères.',
        ];
    }
}
