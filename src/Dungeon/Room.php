<?php

namespace Dungeon;

use Combat\Enemy;

final class Room
{
    private ?Enemy $enemy;

    public function __construct(bool $hasEnemy)
    {
        $this->enemy = $hasEnemy ? new Enemy() : null;
    }

    public function hasEnemy(): bool
    {
        return $this->enemy !== null;
    }

    public function getEnemy(): Enemy
    {
        return $this->enemy;
    }
}