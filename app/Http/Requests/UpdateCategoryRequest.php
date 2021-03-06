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
            'title' => 'required|string|min:5|max:50|unique:category,title,' . $this->category->id,
            'parent_id' => 'nullable|integer|exists:' . Category::getTableName() . ',id'
        ];
    }
}