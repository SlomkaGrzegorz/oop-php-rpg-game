<?php

namespace Character;

use Items\Item;

class Inventory
{
    /** @var Item[] */
    private array $items = [];

    public function add(Item $item): void
    {
        $this->items[] = $item;
    }

    /** @return Item[] */
    public function all(): array
    {
        return $this->items;
    }

    public function get(int $index): Item
    {
        if (!isset($this->items[$index])) {
            throw new \OutOfBoundsException('Niepoprawny numer przedmiotu.');
        }

        return $this->items[$index];
    }

    public function remove(Item $item): void
    {
        foreach ($this->items as $index => $stored) {
            if ($stored === $item) {
                unset($this->items[$index]);
                $this->items = array_values($this->items);
                break;
            }
        }
    }

    public function isEmpty(): bool
    {
        return $this->items === [];
    }
}
