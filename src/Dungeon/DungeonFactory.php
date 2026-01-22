<?php

namespace Dungeon;

class DungeonFactory implements DungeonFactoryInterface
{
    private DungeonGenerator $generator;
    private int $maxRooms;

    public function __construct(int $maxRooms = 30)
    {
        $this->generator = new DungeonGenerator(new EnemyFactory(), new ItemFactory());
        $this->maxRooms = $maxRooms;
    }

    public function createDungeon(): Dungeon
    {
        return $this->generator->generate($this->maxRooms);
    }
}
