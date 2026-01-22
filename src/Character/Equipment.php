<?php

namespace Character;

use Items\Equippable;

class Equipment
{
    /** @var array<string, ?Equippable> */
    private array $slots;

    /** @param string[] $slots */
    public function __construct(array $slots = ['head', 'body', 'legs', 'feet', 'weapon'])
    {
        $this->slots = array_fill_keys($slots, null);
    }

    public function equip(Equippable $item): ?Equippable
    {
        $slot = $item->getSlot();
        if (!array_key_exists($slot, $this->slots)) {
            throw new \InvalidArgumentException("Niepoprawny slot: $slot");
        }

        $previous = $this->slots[$slot];
        $this->slots[$slot] = $item;

        return $previous;
    }

    public function unequip(string $slot): ?Equippable
    {
        if (!array_key_exists($slot, $this->slots)) {
            throw new \InvalidArgumentException("Niepoprawny slot: $slot");
        }

        $previous = $this->slots[$slot];
        $this->slots[$slot] = null;

        return $previous;
    }

    /** @return array<string, ?Equippable> */
    public function all(): array
    {
        return $this->slots;
    }
}
