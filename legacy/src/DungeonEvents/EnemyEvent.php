<?php

namespace Src\DungeonEvents;

use Src\Game\GameState;
use Src\Combat\BattleSimulator;

class EnemyEvent implements RoomEvent
{
    public function __construct(
        private \src\Character\Character $enemy
    ) {}

    public function resolve(GameState $state): void
    {
        echo "Napotykasz wroga: {$this->enemy->getName()}\n";
        (new BattleSimulator())->simulate($state->getPlayer(), $this->enemy);
    }
}
