<?php

namespace App\Enums\Roles\Rights;

use App\Enums\EnumHelper;
use App\Enums\Roles\RoleEnum;
use Spatie\Permission\Models\Role;

enum ClientPermissionsEnum: string
{
    use EnumHelper;

    case Access = 'access';
    case Create = 'create';
    case Update = 'update';
    case Destroy = 'destroy';

    public static function getByRole(): array
    {
        return [
            RoleEnum::HRManager->value => self::values(),
            RoleEnum::Commercial->value => self::values(),
            RoleEnum::Developer->value => [
                self::Access->value,
            ],
        ];
    }
}
