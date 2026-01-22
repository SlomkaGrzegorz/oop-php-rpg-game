<?php

namespace Dungeon;

class Dungeon
{
    /** @var Room[] */
    private array $rooms;

    /** @param Room[] $rooms */
    public function __construct(array $rooms)
    {
        $this->rooms = $rooms;
    }

    public function getRoom(int $index): ?Room
    {
        return $this->rooms[$index] ?? null;
    }

    /** @return Room[] */
    public function getRooms(): array
    {
        return $this->rooms;
    }
}
