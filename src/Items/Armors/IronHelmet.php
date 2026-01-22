<?php
namespace Items\Armors;

use Items\Armor;

class IronHelmet extends Armor
{

    public function __construct()
    {
        parent::__construct("Żelazny hełm", 5, "head");
    }

}