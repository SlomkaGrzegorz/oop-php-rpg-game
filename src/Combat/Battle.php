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
        while ($player->isAlive() && $enemy->isAlive()) {
            $action = $this->input->getPlayerAction();
            $enemy->takeDamage($player->attack());

            if ($enemy->isAlive()) {
                $player->takeDamage($enemy->attack());
            }
        }
    }
}