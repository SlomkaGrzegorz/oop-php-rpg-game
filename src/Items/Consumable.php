<?php

namespace Items;

use Character\Character;

class Consumable extends Item
{
    private int $healAmount;

    public function __construct(string $name, int $healAmount)
    {
        parent::__construct($name);
        $this->healAmount = $healAmount;
    }

    public function use(Character $character): void
    {
        $character->consume($this);
    }

    public function getHealAmount(): int
    {
        return $this->healAmount;
    }
}
