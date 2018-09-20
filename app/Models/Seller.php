<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Models\Interfaces\RoleInterface;

class Seller extends User implements RoleInterface
{
    public function getUserRole()
    {
        return RoleEnum::SELLER;
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'seller_id');
    }
}
