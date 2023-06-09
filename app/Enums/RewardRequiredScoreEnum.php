<?php

namespace App\Enums;

use App\Enums\EnumHelper;

enum RewardRequiredScoreEnum: int
{
    use EnumHelper;

    case HUNDRED = 100;
    case FIVEHUNDRED = 500;
    case THOUSAND = 1000;
    case TWOTHOUSAND = 2000;
    case FIVETHOUSAND = 5000;
}
