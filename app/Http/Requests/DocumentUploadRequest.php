<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request validation for uploading a single document to a permit.
 */
class DocumentUploadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'document'         => 'required|file|max:10240|mimes:pdf,jpg,jpeg,png',
            'document_type_id' => 'nullable|exists:document_types,id',
        ];
    }

    public function messages(): array
    {
        return [
            'document.required' => 'Veuillez sélectionner un fichier.',
            'document.file'     => 'Le fichier est invalide.',
            'document.max'      => 'Le fichier ne doit pas dépasser 10 Mo.',
            'document.mimes'    => 'Formats acceptés : PDF, JPG, PNG.',
            'document_type_id.exists' => 'Le type de document sélectionné est invalide.',
        ];
    }
}
