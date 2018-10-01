<?php

namespace App\Models;

use App\Enums\Role;
use App\Models\Interfaces\RoleInterface;

class Customer extends User implements RoleInterface
{
    public function getUserRole()
    {
        return Role::CUSTOMER;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }
}
