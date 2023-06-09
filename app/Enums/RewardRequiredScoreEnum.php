<?php

namespace App\Enums;

use App\Enums\EnumHelper;

enum RewardRequiredScoreEnum: int
{
    use EnumHelper;

    case TEN = 10;
    case TWENTY = 20;
    case THIRTY = 30;
    case FORTY = 40;
    case FIFTY = 50;
    case SIXTY = 60;
    case SEVENTY = 70;
    case EIGHTY = 80;
    case NINETY = 90;
    case HUNDRED = 100;
}

