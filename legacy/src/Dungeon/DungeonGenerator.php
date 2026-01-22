<?php

namespace Src\Dungeon;

use Src\DungeonEvents\EnemyEvent;
use Src\DungeonEvents\ItemEvent;
use Src\Character\Enemy\Zombie;
use Src\Character\Enemy\Vampire;
use Src\Items\bigHpPotion;

class DungeonGenerator
{
    public function generate(): Dungeon
    {
        $roomCount = rand(5, 8);
        $rooms = [];

        for ($i = 1; $i <= $roomCount; $i++) {
            $rooms[$i] = new Room($i, null);
        }

        // spójny graf
        for ($i = 1; $i < $roomCount; $i++) {
            $rooms[$i]->connect($rooms[$i + 1]);
            $rooms[$i + 1]->connect($rooms[$i]);
        }

        // eventy
        foreach ($rooms as $i => $room) {
            if ($i === $roomCount) {
                $event = new EnemyEvent(new Vampire());
            } elseif (rand(1, 100) <= 75) {
                $event = new EnemyEvent(new Zombie());
            } else {
                $event = new ItemEvent(new bigHpPotion());
            }

            $ref = new \ReflectionProperty($room, 'event');
            $ref->setAccessible(true);
            $ref->setValue($room, $event);
        }

        return new Dungeon($rooms, $rooms[1]);
    }
}
