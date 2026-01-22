<?php

namespace Src\Game;

use Src\Dungeon\Room;
use Src\Dungeon\Dungeon;

class GameState
{
    private Room $currentRoom;

    public function __construct(
        private $player,
        private Dungeon $dungeon
    ) {
        $this->currentRoom = $dungeon->getStartRoom();
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function getCurrentRoom(): Room
    {
        return $this->currentRoom;
    }

    public function moveTo(int $roomId): void
    {
        $room = $this->dungeon->getRoom($roomId);
        $this->currentRoom = $room;
        $room->enter($this);
    }
}
