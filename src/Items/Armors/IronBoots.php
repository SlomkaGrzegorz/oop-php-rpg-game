<?php
namespace Items\Armors;

use Items\Armor;

class IronBoots extends Armor
{

    public function __construct()
    {
        parent::__construct("Żelazne buty", 5, "feet");
    }

}