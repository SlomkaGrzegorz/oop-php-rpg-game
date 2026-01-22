<?php
namespace Items\Armors;

use Items\Armor;

class LeatherPants extends Armor
{

    public function __construct()
    {
        parent::__construct("Skórzane spodnie", 2, "legs");
    }

}