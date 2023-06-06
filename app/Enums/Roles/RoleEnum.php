<?php

namespace App\Enums\Roles;

use App\Enums\EnumHelper;

enum RoleEnum: string
{
    use EnumHelper;

    case Administrator = 'admin';
    case Developer = 'developer';
}
