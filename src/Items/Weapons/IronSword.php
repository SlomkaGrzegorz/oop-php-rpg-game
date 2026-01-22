<?php

namespace Items\Weapons;

use Items\Weapon;

class IronSword extends Weapon
{
    public function __construct()
    {
        parent::__construct('Żelazny Miecz', 8);
    }
}