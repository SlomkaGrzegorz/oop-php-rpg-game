<?php

namespace Src\DungeonEvents;

use Src\Game\GameState;

interface RoomEvent
{
    public function resolve(GameState $state): void;
}
