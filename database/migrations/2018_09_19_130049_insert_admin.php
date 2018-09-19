<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\User;
use App\Enums\RoleEnum;

class InsertAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new User();
        $user
            ->setName('Admin')
            ->setEmail('admin@admin.com')
            ->setPasswordAttribute('secret#123')
            ->setRole(RoleEnum::ADMIN)
            ->save();
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
