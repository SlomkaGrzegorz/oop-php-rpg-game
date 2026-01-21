<?php

namespace Dungeon;

use Combat\Enemy;

final class Dungeon
{
    private int $roomNumber = 0;

    public function nextRoom(): ?Room
    {
        if ($this->roomNumber >= 5) {
            return null;
        }

        $this->roomNumber++;
        return new Room(rand(0, 1) === 1);
    }
}