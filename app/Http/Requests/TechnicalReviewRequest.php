<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request validation for submitting a technical review.
 */
class TechnicalReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'conformite' => 'required|boolean',
            'remarque'   => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'conformite.required' => 'Veuillez indiquer la conformité.',
            'conformite.boolean'  => 'La conformité doit être vrai ou faux.',
            'remarque.max'        => 'La remarque ne doit pas dépasser 2000 caractères.',
        ];
    }
}
