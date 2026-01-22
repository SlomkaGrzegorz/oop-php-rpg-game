<?php

namespace Src\DungeonEvents;

use Src\Game\GameState;
use Src\Items\Items;

class ItemEvent implements RoomEvent
{
    public function __construct(
        private Items $item
    ) {}

    public function resolve(GameState $state): void
    {
        $state->getPlayer()->inventory->add($this->item);
        echo "Znalazłeś przedmiot!\n";
    }
}
