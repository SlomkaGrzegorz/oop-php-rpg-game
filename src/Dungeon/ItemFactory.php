<?php

namespace Dungeon;

use Items\Consumable;
use Items\Item;
use Items\Weapons\LegendarySword;
use Items\Weapons\IronSword;
use Items\Weapons\WoodenSword;
use Items\Armors\IronPants;
use Items\Armors\IronHelmet;
use Items\Armors\IronChestplate;
use Items\Armors\IronBoots;
use Items\Armors\LeatherBoots;
use Items\Armors\LeatherPants;
use Items\Armors\LeatherHelmet;
use Items\Armors\LeatherChestplate;





class ItemFactory
{
    public function createConsumable(): Item
    {
        return new Consumable('Potion', rand(10, 30));
    }

    public function createItem(): Item{
        $items = [
            new LegendarySword(),
            new IronSword(),
            new WoodenSword(),
            new LeatherBoots(),
            new LeatherPants(),
            new LeatherHelmet(),
            new LeatherChestplate(),
            new IronBoots(),
            new IronPants(),
            new IronHelmet(),
            new IronChestplate(),
            new Consumable("Small Potion", rand(10, 25)),
            new Consumable("Potion", rand(26, 40))
        ];
        $randomkey = array_rand($items);

        return $items[$randomkey];
    }

}