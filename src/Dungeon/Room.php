<?php

namespace Dungeon;

use Character\Enemy;

final class Room
{
    public function __construct(
        private Enemy $enemy
    ) {}

    public function getEnemy(): Enemy
    {
        return $this->enemy;
    }
}