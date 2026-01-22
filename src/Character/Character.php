<?php

namespace Character;

use Game\Attacker;
use Items\Consumable;
use Items\Equippable;
use Items\Item;

class Character implements Attacker
{
    protected string $name;
    protected Stats $stats;
    protected Inventory $inventory;
    protected Equipment $equipment;

    public function __construct(string $name, Stats $stats, ?Inventory $inventory = null, ?Equipment $equipment = null)
    {
        $this->name = $name;
        $this->stats = $stats;
        $this->inventory = $inventory ?? new Inventory();
        $this->equipment = $equipment ?? new Equipment();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function takeDamage(int $value): void
    {
        $this->stats->takeDamage($value);
    }

    public function heal(int $value): void
    {
        $this->stats->heal($value);
    }

    public function isAlive(): bool
    {
        return $this->stats->isAlive();
    }

    public function getCurrentHp(): int
    {
        return $this->stats->getCurrentHp();
    }

    public function getMaxHp(): int
    {
        return $this->stats->getMaxHp();
    }

    public function getAttack(): int
    {
        return $this->stats->getAttack();
    }

    public function getDefense(): int
    {
        return $this->stats->getDefense();
    }

    public function addItem(Item $item): void
    {
        $this->inventory->add($item);
    }

    /** @return Item[] */
    public function getInventoryItems(): array
    {
        return $this->inventory->all();
    }

    /** @return array<string, ?Equippable> */
    public function getEquipmentItems(): array
    {
        return $this->equipment->all();
    }

    public function useItem(int $index): void
    {
        $item = $this->inventory->get($index);
        $item->use($this);
    }

    public function equip(Equippable $item): void
    {
        $previous = $this->equipment->equip($item);
        $this->inventory->remove($item);
        if ($previous) {
            $this->inventory->add($previous);
        }
    }

    public function unequip(string $slot): void
    {
        $previous = $this->equipment->unequip($slot);
        if ($previous) {
            $this->inventory->add($previous);
        }
    }

    public function consume(Consumable $consumable): void
    {
        $this->heal($consumable->getHealAmount());
        $this->inventory->remove($consumable);
    }

    public function attack(Character $target): void
    {
        $damage = max(0, $this->getAttack() - $target->getDefense());
        $target->takeDamage($damage);
    }
}
