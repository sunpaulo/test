<?php

namespace App\Services\Logical;

use App\Enums\Role;
use App\Http\Requests\SignUpRequest;
use App\Models\User;

class UserManagement
{
    /**
     * @param SignUpRequest $request
     * @return User
     */
    public static function createFromRequest(SignUpRequest $request)
    {
        $user = User::create($request->all());

        return $user;
    }
}