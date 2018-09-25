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

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
