<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'article_category_id' => 'required|exists:article_categories,id',
            'title' => 'required|string|min:3|max:255',
            'file' => 'nullable|file|mimes:jpeg,jpg,png,gif',
            'content' => 'required|string|min:3',
        ];
    }
}
