<?php

namespace App\Enums\Roles;

use App\Enums\EnumHelper;

enum ModelEnum: string
{
    use EnumHelper;

    case Users = 'users';
}
