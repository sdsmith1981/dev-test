<?php

namespace App\Http;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
