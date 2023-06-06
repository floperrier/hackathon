<?php

namespace App\Console\Commands;

use App\Enums\Roles\ModelEnum;
use App\Enums\Roles\PermissionsEnum;
use App\Enums\Roles\Rights\ModulesEnum;
use App\Enums\Roles\RoleEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\WildcardPermission;
use Illuminate\Support\Str;

class MakeRoles extends Command
{
    protected $signature = 'make:roles';

    protected $description = 'Generate default roles for users';

    public function handle()
    {
        $this->info('Role seed starts');
        $this->deleteRecords();
        $this->seedRoles();
        $this->createPermissions();
        $this->setPermissionsToRoles();

        $this->newLine();
        $this->alert('Role successfully seeded');

        return Command::SUCCESS;
    }

    private function deleteRecords()
    {
        $this->info('/* Flush All Roles records */');
        $bar = $this->output->createProgressBar(6);

        DB::table('model_has_permissions')->delete();
        $bar->advance();

        DB::table('model_has_roles')->delete();
        $bar->advance();

        DB::table('model_has_roles')->delete();
        $bar->advance();

        DB::table('roles')->delete();
        $bar->advance();

        DB::table('role_has_permissions')->delete();
        $bar->advance();

        DB::table('permissions')->delete();
        $bar->advance();

        $bar->finish();
    }

    private function seedRoles()
    {
        $this->newLine();
        $this->info('/* Seed all roles */');

        $rolebar = $this->output->createProgressBar(count(RoleEnum::values()));
        foreach (RoleEnum::values() as $role) {
            $rolebar->advance();
            Role::create(['name' => $role]);
        }
        $rolebar->finish();
        $this->newLine();
    }

    public function createPermissions()
    {
        $modelPb = $this->output->createProgressBar(count(ModelEnum::values()));
        foreach (ModelEnum::values() as $permissions) {
            foreach (PermissionsEnum::cases() as $perm) {
                Permission::create(['name' => $permissions.WildcardPermission::PART_DELIMITER.Str::lower($perm->name)]);
            }
            Permission::create(['name' => $permissions.WildcardPermission::PART_DELIMITER.WildcardPermission::WILDCARD_TOKEN]);
            $modelPb->advance();
        }
        $modelPb->finish();
        $this->newLine();
    }

    public function setPermissionsToRoles()
    {
        $bar = $this->output->createProgressBar(\count(ModulesEnum::cases()));
        $bar->start();
        foreach (ModulesEnum::getPermissions() as $module => $permissions) {
            $this->syncPermissions($permissions, $module);
        }
        $bar->advance();
        $bar->finish();
    }

    private function syncPermissions($rightsEnum, string $module)
    {
        foreach ($rightsEnum::values() as $right) {
            Permission::create(['name' => $module.WildcardPermission::PART_DELIMITER.$right]);
        }

        foreach ($rightsEnum::getByRole() as $roleName => $rights) {
            $role = Role::findByName($roleName);
            $role->givePermissionTo(Arr::map($rights, fn ($r) => $module.WildcardPermission::PART_DELIMITER.$r));
        }
    }
}
