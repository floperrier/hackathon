<?php

namespace Database\Seeders;

use App\Enums\Roles\RoleEnum;
use App\Models\LanguageRank;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        foreach (\App\Enums\Roles\RoleEnum::values() as $role) {
            User::factory(20)->create()->each(function ($user) use ($role) {
                $user->assignRole($role);

                if ($role != RoleEnum::Developer->value) {
                    $user->update([
                        'client_id' => null,
                        'job_title' => null,
                        'salary' => null,
                        'available' => null,
                    ]);
                }
            });
        }
    }
}
