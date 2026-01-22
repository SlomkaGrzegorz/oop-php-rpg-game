<?php
namespace Items\Armors;

use Items\Armor;

class IronChestplate extends Armor
{

    public function __construct()
    {
        parent::__construct("Żelazny napierśnik", 5, "body");
    }

}