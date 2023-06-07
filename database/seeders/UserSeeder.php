<?php

namespace Database\Seeders;

use App\Enums\Roles\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    public function run()
    {
        foreach (\App\Enums\Roles\RoleEnum::values() as $role) {
            User::factory(20)->create()->each(function ($user) use ($role) {
                $user->assignRole($role);
            });
        }
    }
}
