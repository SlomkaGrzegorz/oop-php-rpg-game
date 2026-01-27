<?php

namespace Combat\Action;

use Character\Player;
use Character\Enemy;

final class UseItemAction implements PlayerAction
{
    public function execute(Player $player, Enemy $enemy): void
    {
        $player->getInventory()->useFirst($player);
    }
}
