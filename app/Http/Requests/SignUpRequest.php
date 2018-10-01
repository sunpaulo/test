<?php

namespace App\Http\Requests;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|email|max:50|unique:' . User::getTableName(),
            'password' => 'required|string|min:3|confirmed',
            'role' => 'nullable|string|in:' . Role::toValidationString()
        ];
    }
}