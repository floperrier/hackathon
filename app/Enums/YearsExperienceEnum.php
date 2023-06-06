<?php

namespace App\Enums;

use App\Enums\EnumHelper;

enum YearsExperienceEnum: string
{
    use EnumHelper;

    case NONE = 'none';
    case LESSTHANONE = 'lessThanOne';
    case ONEYEAR = 'one';
    case TWOYEARS = 'two';
    case THREEYEARS = 'three';
    case FOURYEARS = 'four';
    case FIVEYEARSORMORE = 'fiveOrMore';
}
