<?php

namespace Items;

use Character\Character;

class Weapon extends Item implements Equippable
{
    private int $attackBonus;

    public function __construct(string $name, int $attackBonus)
    {
        parent::__construct($name);
        $this->attackBonus = $attackBonus;
    }

    public function use(Character $character): void
    {
        $character->equip($this);
    }

    public function getSlot(): string
    {
        return 'weapon';
    }

    public function getAttackBonus(): int
    {
        return $this->attackBonus;
    }
}