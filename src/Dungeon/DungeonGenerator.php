<?php

namespace Dungeon;

class DungeonGenerator
{
    private EnemyFactory $enemyFactory;
    private ItemFactory $itemFactory;

    public function __construct(EnemyFactory $enemyFactory, ItemFactory $itemFactory)
    {
        $this->enemyFactory = $enemyFactory;
        $this->itemFactory = $itemFactory;
    }

    public function generate(int $maxRooms = 10): Dungeon
    {
        if ($maxRooms < 2) {
            throw new \InvalidArgumentException('Loch musi mieć co najmniej 2 pokoje');
        }

        $rooms = [];
        for ($i = 0; $i < $maxRooms; $i++) {
            $rooms[$i] = new Room('Pokój ' . ($i + 1));
        }

        $rooms[$maxRooms - 1] = new Room('Boss Room', null, null, true);

        for ($i = 0; $i < $maxRooms - 1; $i++) {
            $rooms[$i]->connect($i + 1);
            $rooms[$i + 1]->connect($i);
        }

        for ($i = 1; $i < $maxRooms - 1; $i++) {
            if (rand(0, 1) === 1) {
                $target = rand(1, $maxRooms - 2);
                if ($target !== $i && !in_array($target, $rooms[$i]->getConnections(), true)) {
                    $rooms[$i]->connect($target);
                    $rooms[$target]->connect($i);
                }
            }
        }

        for ($i = 1; $i < $maxRooms - 1; $i++) {
            if (rand(0, 1) === 1) {
                $rooms[$i]->setEnemy($this->enemyFactory->createEnemy());
            } elseif (rand(0, 1) === 1) {
                $rooms[$i]->setItem($this->itemFactory->createItem());
            }
        }

        $rooms[$maxRooms - 1]->setEnemy($this->enemyFactory->createBoss());

        return new Dungeon($rooms);
    }
}
