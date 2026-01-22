<?php

namespace Src\Dungeon;

use Src\DungeonEvents\RoomEvent;

class Room
{
    private array $connections = [];

    public function __construct(
        private int $id,
        private ?RoomEvent $event
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function connect(Room $room): void
    {
        $this->connections[$room->id] = $room;
    }

    public function getConnections(): array
    {
        return $this->connections;
    }

    public function enter(\Game\GameState $state): void
    {
        if ($this->event) {
            $this->event->resolve($state);
            $this->event = null;
        }
    }
}
