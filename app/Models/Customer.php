<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Models\Interfaces\RoleInterface;

class Customer extends User implements RoleInterface
{
    public function getUserRole()
    {
        return RoleEnum::CUSTOMER;
    }
}
