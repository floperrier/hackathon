<?php

namespace Database\Seeders;

use App\Enums\Roles\RoleEnum;
use App\Models\Partner\Network;
use App\Models\Partner\Office;
use App\Models\Partner\WealthManager;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        Artisan::call('make:roles');
        // Artisan::call('make:admin admin@test.com admin');

        foreach (RoleEnum::values() as $role) {
            $user = User::factory()->create([
                'email' => $role.'@test.com',
                'password' => Hash::make('admin'),
                'name' => Str::title(Str::replace('_', ' ', $role)),
            ]);
            $user->assignRole($role);
        }
    }
}
