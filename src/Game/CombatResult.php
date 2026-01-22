<?php

namespace Game;

class CombatResult
{
    private string $playerName;
    private string $enemyName;
    /** @var CombatEvent[] */
    private array $events = [];
    private ?string $winner = null;

    public function __construct(string $playerName, string $enemyName)
    {
        $this->playerName = $playerName;
        $this->enemyName = $enemyName;
    }

    public function addEvent(CombatEvent $event): void
    {
        $this->events[] = $event;
    }

    /** @return CombatEvent[] */
    public function getEvents(): array
    {
        return $this->events;
    }

    public function setWinner(string $name): void
    {
        $this->winner = $name;
    }

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    public function getEnemyName(): string
    {
        return $this->enemyName;
    }
}
