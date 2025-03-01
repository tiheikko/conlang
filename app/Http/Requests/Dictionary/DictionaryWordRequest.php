<?php

namespace App\Http\Requests\Dictionary;

use Illuminate\Foundation\Http\FormRequest;

class DictionaryWordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'word' => 'required|string',
            'definition' => 'required|string',
        ];
    }
}
