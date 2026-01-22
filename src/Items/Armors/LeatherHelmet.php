<?php
namespace Items\Armors;

use Items\Armor;

class LeatherHelmet extends Armor
{

    public function __construct()
    {
        parent::__construct("Skórzany hełm", 2, "head");
    }

}