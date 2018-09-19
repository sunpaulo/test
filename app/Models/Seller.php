<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Models\Interfaces\UserRoleInterface;

class Seller extends User implements UserRoleInterface
{
    public function getUserRole()
    {
        return RoleEnum::SELLER;
    }
}
