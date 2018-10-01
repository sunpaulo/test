<?php

namespace App\Models;

use App\Enums\Role;
use App\Models\Interfaces\RoleInterface;

class Seller extends User implements RoleInterface
{
    public function getUserRole()
    {
        return Role::SELLER;
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function rates()
    {
        return $this->hasMany(Seller::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
