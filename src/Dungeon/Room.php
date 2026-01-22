<?php

namespace Dungeon;

use Character\Character;
use Items\Item;

class Room
{
    private string $name;
    private ?Character $enemy;
    private ?Item $item;
    private bool $isBossRoom;
    /** @var int[] */
    private array $connections = [];

    public function __construct(string $name, ?Character $enemy = null, ?Item $item = null, bool $isBossRoom = false)
    {
        $this->name = $name;
        $this->enemy = $enemy;
        $this->item = $item;
        $this->isBossRoom = $isBossRoom;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isBossRoom(): bool
    {
        return $this->isBossRoom;
    }

    public function hasEnemy(): bool
    {
        return $this->enemy !== null;
    }

    public function getEnemy(): ?Character
    {
        return $this->enemy;
    }

    public function setEnemy(?Character $enemy): void
    {
        $this->enemy = $enemy;
    }

    public function clearEnemy(): void
    {
        $this->enemy = null;
    }

    public function hasItem(): bool
    {
        return $this->item !== null;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): void
    {
        $this->item = $item;
    }

    public function clearItem(): void
    {
        $this->item = null;
    }

    public function connect(int $roomIndex): void
    {
        if (!in_array($roomIndex, $this->connections, true)) {
            $this->connections[] = $roomIndex;
        }
    }

    /** @return int[] */
    public function getConnections(): array
    {
        return $this->connections;
    }
}
