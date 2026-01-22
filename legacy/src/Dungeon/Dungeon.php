<?php

namespace Src\Dungeon;

class Dungeon
{
    public function __construct(
        private array $rooms,
        private Room $startRoom
    ) {}

    public function getStartRoom(): Room
    {
        return $this->startRoom;
    }

    public function getRoom(int $id): Room
    {
        return $this->rooms[$id];
    }
}
