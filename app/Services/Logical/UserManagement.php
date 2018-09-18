<?php

namespace App\Services\Logical;

use App\Http\Requests\SignUpRequest;
use App\Models\User;

class UserManagement
{
    public static function createFromRequest(SignUpRequest $request)
    {
        $user = User::create($request->all());

        return $user;
    }
}