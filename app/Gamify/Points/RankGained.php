<?php

namespace App\Gamify\Points;

use QCod\Gamify\PointType;

class RankGained extends PointType
{
    public $rank;

    /**
     * Point constructor
     *
     * @param $subject
     */
    public function __construct($subject, $rank)
    {
        $this->subject = $subject;
        $this->rank = $rank;
    }

    public function getPoints()
    {
        return match($this->rank) {
            -8 => 10,
            -7 => 15,
            -6 => 20,
            -5 => 25,
            -4 => 30,
            -3 => 35,
            -2 => 40,
            -1 => 45,
            0 => 50,
            1 => 55,
            2 => 60,
            3 => 65,
            4 => 70,
            5 => 75,
            6 => 80,
            7 => 85,
            8 => 90,
            default => 20,
        };
    }

    /**
     * User who will be receive points
     *
     * @return mixed
     */
    public function payee()
    {
        return $this->getSubject()->user;
    }
}
