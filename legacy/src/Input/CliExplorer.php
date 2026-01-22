<?php

namespace Src\Input;

use Src\Game\GameState;

class CliExplorer
{
    public function run(GameState $state): void
    {
        while ($state->getPlayer()->isAlive()) {
            $room = $state->getCurrentRoom();

            echo "\nJesteś w pokoju {$room->getId()}\n";
            echo "Połączenia: " . implode(', ', array_keys($room->getConnections())) . "\n";
            echo "Wybierz pokój lub 'i' (inventory): ";

            $input = trim(readline());

            if ($input === 'i') {
                $state->getPlayer()->inventory->show();
                continue;
            }

            $state->moveTo((int)$input);
        }
    }
}
