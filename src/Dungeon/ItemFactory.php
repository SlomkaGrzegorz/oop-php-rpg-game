<?php

namespace Dungeon;

use Items\Consumable;
use Items\Item;

class ItemFactory
{
    public function createConsumable(): Item
    {
        return new Consumable('Potion', rand(10, 30));
    }
}