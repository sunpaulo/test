<?php

use App\Models\User;

class UserTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(User::class, self::USERS_COUNT)->create();
    }
}
