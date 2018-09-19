<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Role;
use App\Enums\RoleEnum;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = new Role();
        $admin->setName(RoleEnum::ADMIN)->save();

        $seller = new Role();
        $seller->setName(RoleEnum::SELLER)->save();

        $customer = new Role();
        $customer->setName(RoleEnum::CUSTOMER)->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
