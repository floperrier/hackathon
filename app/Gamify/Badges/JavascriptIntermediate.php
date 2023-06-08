<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class JavascriptIntermediate extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Intermédiaire en Javascript';

    public $level = 2;

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        return $user->languagesRanks->where('language_name', 'javascript')->first()?->rank >= -4;
    }
}
