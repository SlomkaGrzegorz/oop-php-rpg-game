<?php

namespace Items\Weapons;

use Items\Weapon;

class WoodenSword extends Weapon
{
    public function __construct()
    {
        parent::__construct('Drewniany Miecz', 2);
    }
}