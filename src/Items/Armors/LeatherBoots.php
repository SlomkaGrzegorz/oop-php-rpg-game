<?php
namespace Items\Armors;

use Items\Armor;

class LeatherBoots extends Armor
{

    public function __construct()
    {
        parent::__construct("Skórzane buty", 2, "feet");
    }

}