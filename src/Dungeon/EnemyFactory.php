<?php

namespace Dungeon;

use Character\Character;
use Character\Stats;

class EnemyFactory
{
    public function createEnemy(): Character
    {
        $roll = rand(1,4);
        switch($roll){
        case 1: return new Character('Goblin', new Stats(rand(20, 50), rand(5, 10), rand(1, 3))); break;
        case 2: return new Character('Skeleton', new Stats(rand(25, 60), rand(7, 12), rand(1, 2))); break;
        case 3: return new Character('Zombie', new Stats(rand(40, 70), rand(3, 8), rand(2, 5))); break;
        case 4: return new Character('Vampire', new Stats(rand(60, 100), rand(10, 16), rand(4, 8))); break;
        default: return new Character('Nieznane', new Stats(rand(10, 15), rand(1, 2), rand(1, 2)));
        }
    }

    public function createBoss(): Character
    {
        return new Character('Boss', new Stats(100, 20, 10));
    }
}
