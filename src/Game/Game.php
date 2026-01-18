<?php

namespace Game;

use Dungeon\Dungeon;
use Combat\Battle;
use Input\CliInputHandler;
use Character\Player;

final class Game
{
    public function run(): void
    {
        echo "=== PHP RPG ===\n";

        $player = Player::createFromChoice();
        $dungeon = new Dungeon();
        $input = new CliInputHandler();

        foreach ($dungeon->getRooms() as $room) {
            echo "\n>>> Nowy pokój\n";

            $battle = new Battle($input);
            $battle->fight($player, $room->getEnemy());

            if (!$player->isAlive()) {
                echo "Przegrałeś grę.\n";
                return;
            }
        }

        echo "\n Pokonałeś loch!\n";
    }
}