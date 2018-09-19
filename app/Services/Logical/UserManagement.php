<?php

namespace App\Services\Logical;

use App\Enums\RoleEnum;
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
        $user = new User();
        $user->setName($request->input('name'))
            ->setEmail($request->input('email'))
            ->setRole($request->filled('role') ? $request->input('role') : RoleEnum::CUSTOMER)
            ->save();

        return $user;
    }
}