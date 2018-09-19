<?php

namespace App\Services\Logical;

use App\Enums\RoleEnum;
use App\Http\Requests\SignUpRequest;
use App\Models\Role;
use App\Models\User;

class UserManagement
{
    /**
     * @param SignUpRequest $request
     * @return User
     */
    public static function createFromRequest(SignUpRequest $request)
    {
        /** @var User $user */
        $user = User::create($request->all());

        $role = $request->filled('role') ? $request->input('role') : RoleEnum::CUSTOMER;
        $user->attachRole(Role::where('name', $role)->first()->id);

        return $user;
    }
}