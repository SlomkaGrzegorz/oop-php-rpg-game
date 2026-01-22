<?php

namespace Src\Game;

use Src\Dungeon\DungeonGenerator;
use Src\Input\CliExplorer;
use Src\Character\Player;
use Src\Character\Races\Human;

class Game
{
    public function run(): void
    {
        $dungeon = (new DungeonGenerator())->generate();

        $player = new Player("Hero", new Human(), 100, 10, 5);

        $state = new GameState($player, $dungeon);
        (new CliExplorer())->run($state);
    }
}