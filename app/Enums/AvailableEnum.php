<?php

namespace App\Enums;

use App\Enums\EnumHelper;

enum AvailableEnum: string
{
    use EnumHelper;

    case AVAILABLE = 'available';
    case ASSIGNED = 'assigned';
    case NOTAVAILABLE = 'notAvailable';
}
