<?php

namespace Dungeon;

use Character\Character;
use Character\Stats;

class EnemyFactory
{
    public function createEnemy(): Character
    {
        return new Character('Goblin', new Stats(rand(20, 50), rand(5, 10), rand(1, 3)));
    }

    public function createBoss(): Character
    {
        return new Character('Boss', new Stats(100, 15, 5));
    }
}
