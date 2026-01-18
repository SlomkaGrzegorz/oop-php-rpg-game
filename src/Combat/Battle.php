<?php

namespace Combat;

use Character\Player;
use Character\Enemy;
use Input\InputHandlerInterface;

final class Battle
{
    public function __construct(
        private InputHandlerInterface $input
    ) {}

    public function fight(Player $player, Enemy $enemy): void
    {
        echo $enemy->isBoss() ? "BOSS!\n" : "Wróg!\n";

        while ($player->isAlive() && $enemy->isAlive()) {
            $action = $this->input->chooseAction();

            $action->execute($player, $enemy);

            if ($enemy->isAlive()) {
                $player->takeDamage($enemy->attack());
            }
        }
    }
}