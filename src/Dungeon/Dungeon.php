<?php

namespace Dungeon;

use Character\EnemyFactory;

final class Dungeon
{
    private array $rooms = [];

    public function __construct()
    {
        $count = rand(4, 10);

        for ($i = 1; $i <= $count; $i++) {
            $isBoss = ($i === $count);
            $this->rooms[] = new Room(
                EnemyFactory::create($isBoss)
            );
        }
    }

    public function getRooms(): array
    {
        return $this->rooms;
    }
}