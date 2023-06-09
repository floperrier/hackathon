<?php

use App\Enums\RewardRequiredScoreEnum;
use App\Enums\YearsExperienceEnum;

return [
    'required_scores' => [
        RewardRequiredScoreEnum::HUNDRED->value => '100',
        RewardRequiredScoreEnum::FIVEHUNDRED->value => '500',
        RewardRequiredScoreEnum::THOUSAND->value => '1000',
        RewardRequiredScoreEnum::TWOTHOUSAND->value => '2000',
        RewardRequiredScoreEnum::FIVETHOUSAND->value => '5000',
    ],
];
