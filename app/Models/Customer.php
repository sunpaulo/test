<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Models\Interfaces\RoleInterface;

class Customer extends User implements RoleInterface
{
    public function newQuery()
    {
        return parent::newQuery()->where('role', RoleEnum::CUSTOMER);
    }
}
