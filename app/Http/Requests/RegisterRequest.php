<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request validation for user registration.
 */
class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom'         => 'required|string|max:100',
            'prenom'      => 'required|string|max:100',
            'email'       => 'required|email|unique:users,email|max:255',
            'password'    => 'required|string|min:6|confirmed',
            'cin'         => 'required|string|max:20|unique:users,cin',
            'role_id'     => 'required|exists:roles,id',
            'district_id' => 'required|exists:districts,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required'         => 'Le nom est obligatoire.',
            'prenom.required'      => 'Le prénom est obligatoire.',
            'email.required'       => 'L\'adresse e-mail est obligatoire.',
            'email.unique'         => 'Cette adresse e-mail est déjà utilisée.',
            'password.required'    => 'Le mot de passe est obligatoire.',
            'password.min'         => 'Le mot de passe doit contenir au moins 6 caractères.',
            'password.confirmed'   => 'La confirmation du mot de passe ne correspond pas.',
            'cin.required'         => 'Le CIN est obligatoire.',
            'cin.unique'           => 'Ce CIN est déjà enregistré.',
            'role_id.required'     => 'Le rôle est obligatoire.',
            'role_id.exists'       => 'Le rôle sélectionné est invalide.',
            'district_id.required' => 'Le district est obligatoire.',
            'district_id.exists'   => 'Le district sélectionné est invalide.',
        ];
    }
}
