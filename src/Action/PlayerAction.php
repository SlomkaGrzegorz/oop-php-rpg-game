<?php

namespace Combat\Action;

use Character\Player;
use Character\Enemy;

interface PlayerAction
{
    public function execute(Player $player, Enemy $enemy): void;
}
