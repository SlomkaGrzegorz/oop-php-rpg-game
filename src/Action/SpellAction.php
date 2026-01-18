<?php

namespace Combat\Action;

use Character\Player;
use Character\Enemy;

final class SpellAction implements PlayerAction
{
    public function execute(Player $player, Enemy $enemy): void
    {
        $enemy->takeDamage(20);
        echo "Rzuciłeś czar!\n";
    }
}