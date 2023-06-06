<?php

namespace App\Enums\Roles\Rights;

use App\Enums\EnumHelper;

enum ModulesEnum: string
{
    use EnumHelper;

    case Clients = 'clients';

    public static function getPermissions()
    {
        return [
            self::Clients->value => ClientPermissionsEnum::class,
        ];
    }
}
