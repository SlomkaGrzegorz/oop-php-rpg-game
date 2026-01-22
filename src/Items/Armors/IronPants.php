<?php
namespace Items\Armors;

use Items\Armor;

class IronPants extends Armor
{

    public function __construct()
    {
        parent::__construct("Żelazne nogawice", 5, "legs");
    }

}