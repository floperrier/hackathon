<?php

namespace App\Enums\Roles;

use App\Enums\EnumHelper;

enum RoleEnum: string
{
    use EnumHelper;

    case HRManager = 'hr_manager';
    case Commercial = 'commercial';
    case Developer = 'developer';
}
