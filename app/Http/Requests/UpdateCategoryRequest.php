<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:50|unique:' . Category::getTableName() . ',' . $this->id,
            'parent_id' => 'nullable|integer|exists:' . Category::getTableName() . ',id'
        ];
    }
}