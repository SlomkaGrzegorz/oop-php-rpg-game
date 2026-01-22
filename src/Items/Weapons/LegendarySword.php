<?php


namespace Items\Weapons;

use Items\Weapon;

class LegendarySword extends Weapon
{
    public function __construct()
    {
        parent::__construct('Miecz Legendarnego Wojownika', 15);
    }
}