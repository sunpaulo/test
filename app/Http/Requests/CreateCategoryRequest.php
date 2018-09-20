<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:1|max:50|unique:category',
            'parent_id' => 'nullable|integer|exists:category,id'
        ];
    }
}