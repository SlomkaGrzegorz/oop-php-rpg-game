<?php

namespace Game;

use Player\PlayerFactory;
use Dungeon\Dungeon;
use Combat\Battle;
use Input\CliInputHandler;

final class Game
{
    public function run(): void
    {
        $player = PlayerFactory::create();
        $dungeon = new Dungeon();
        $input = new CliInputHandler();

        while ($room = $dungeon->nextRoom()) {
            if ($room->hasEnemy()) {
                $battle = new Battle($input);
                $battle->fight($player, $room->getEnemy());
            }
        }

        echo "Koniec gry\n";
    }
}