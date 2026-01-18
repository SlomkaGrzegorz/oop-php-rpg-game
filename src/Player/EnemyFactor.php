<?php

namespace Character;

final class EnemyFactory
{
    public static function create(bool $boss): Enemy
    {
        return $boss
            ? new Enemy(120, 15, true)
            : new Enemy(rand(40, 70), rand(6, 10));
    }
}
