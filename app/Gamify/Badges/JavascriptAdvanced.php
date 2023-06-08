<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class JavascriptAdvanced extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Avancé en Javascript';

    public $level = 3;

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        return $user->languagesRanks->where('language_name', 'javascript')->first()?->rank >= -1;
    }
}
