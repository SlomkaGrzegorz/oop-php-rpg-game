<?php

namespace Items\Armors;

use Items\Armor;

class LeatherChestplate extends Armor{

    public function __construct()
    {
        parent::__construct("Skórzana tunika", 2, "body");
    }

}