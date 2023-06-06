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
        foreach (Arr::where(\App\Enums\Roles\RoleEnum::values(), fn($value) => $value != RoleEnum::Administrator->value) as $role) {
            User::factory(10)->create()->each(function ($user) use ($role) {
                $user->assignRole($role);
            });
        }
    }
}
