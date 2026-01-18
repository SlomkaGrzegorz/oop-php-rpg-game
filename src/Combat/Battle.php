<?php

namespace Combat;

use Player\Player;
use Input\InputHandlerInterface;

final class Battle
{
    public function __construct(
        private InputHandlerInterface $input
    ) {}

    public function fight(Player $player, Enemy $enemy): void
    {
        echo "Rozpoczyna się walka!\n";

        while ($player->isAlive() && $enemy->isAlive()) {
            $action = $this->input->getPlayerAction();

            if ($action === 1) {
                $enemy->takeDamage($player->attack());
            }

            if ($enemy->isAlive()) {
                $player->takeDamage($enemy->attack());
            }
        }

        echo $player->isAlive()
            ? "Wróg pokonany!\n"
            : "Gracz zginął...\n";
    }
}