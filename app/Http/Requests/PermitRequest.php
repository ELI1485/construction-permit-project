<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request validation for creating/updating a permit.
 */
class PermitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'permit_type_id'  => 'required|exists:permit_types,id',
            'district_id'     => 'required|exists:districts,id',
            'project_title'   => 'required|string|max:255',
            'project_address' => 'required|string|max:500',
            'surface'         => 'required|numeric|min:1|max:100000',
            'documents'       => 'nullable|array|max:10',
            'documents.*'     => 'file|max:10240|mimes:pdf,jpg,jpeg,png',
        ];
    }

    public function messages(): array
    {
        return [
            'permit_type_id.required'  => 'Le type de permis est obligatoire.',
            'permit_type_id.exists'    => 'Le type de permis sélectionné est invalide.',
            'district_id.required'     => 'Le district est obligatoire.',
            'district_id.exists'       => 'Le district sélectionné est invalide.',
            'project_title.required'   => 'Le titre du projet est obligatoire.',
            'project_title.max'        => 'Le titre ne doit pas dépasser 255 caractères.',
            'project_address.required' => 'L\'adresse du projet est obligatoire.',
            'surface.required'         => 'La surface est obligatoire.',
            'surface.numeric'          => 'La surface doit être un nombre.',
            'surface.min'              => 'La surface doit être au moins 1 m².',
            'surface.max'              => 'La surface ne doit pas dépasser 100 000 m².',
            'documents.max'            => 'Vous ne pouvez pas joindre plus de 10 documents.',
            'documents.*.file'         => 'Chaque document doit être un fichier valide.',
            'documents.*.max'          => 'Chaque document ne doit pas dépasser 10 Mo.',
            'documents.*.mimes'        => 'Formats acceptés : PDF, JPG, PNG.',
        ];
    }
}
