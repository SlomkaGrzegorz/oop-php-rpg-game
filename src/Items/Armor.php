<?php

namespace Items;

use Character\Character;

class Armor extends Item implements Equippable
{
    private int $defenseBonus;
    private string $slot;

    public function __construct(string $name, int $defenseBonus, string $slot = 'body')
    {
        parent::__construct($name);
        $this->defenseBonus = $defenseBonus;
        $this->slot = $slot;
    }

    public function use(Character $character): void
    {
        $character->equip($this);
    }

    public function getSlot(): string
    {
        return $this->slot;
    }

    public function getDefenseBonus(): int
    {
        return $this->defenseBonus;
    }
}

