<?php

use App\Enums\YearsExperienceEnum;

return [
    'years_experience' => [
        YearsExperienceEnum::NONE->value => 'Aucune expérience',
        YearsExperienceEnum::LESSTHANONE->value => 'Moins d\'un an',
        YearsExperienceEnum::ONEYEAR->value => '1 an',
        YearsExperienceEnum::TWOYEARS->value => '2 ans',
        YearsExperienceEnum::THREEYEARS->value => '3 ans',
        YearsExperienceEnum::FOURYEARS->value => '4 ans',
        YearsExperienceEnum::FIVEYEARSORMORE->value => '5 ans ou plus',
    ],
];
