<?php

namespace Game;

class CombatEvent
{
    private string $attackerName;
    private string $defenderName;
    private int $damage;
    private int $defenderHp;
    private bool $defenderDefeated;

    public function __construct(string $attackerName, string $defenderName, int $damage, int $defenderHp, bool $defenderDefeated)
    {
        $this->attackerName = $attackerName;
        $this->defenderName = $defenderName;
        $this->damage = $damage;
        $this->defenderHp = $defenderHp;
        $this->defenderDefeated = $defenderDefeated;
    }

    public function getAttackerName(): string
    {
        return $this->attackerName;
    }

    public function getDefenderName(): string
    {
        return $this->defenderName;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getDefenderHp(): int
    {
        return $this->defenderHp;
    }

    public function isDefenderDefeated(): bool
    {
        return $this->defenderDefeated;
    }
}
