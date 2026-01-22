<?php

namespace Character;

class Stats
{
    private int $hp;
    private int $maxHp;
    private int $attack;
    private int $defense;

    public function __construct(int $hp, int $attack, int $defense)
    {
        $this->hp = $hp;
        $this->maxHp = $hp;
        $this->attack = $attack;
        $this->defense = $defense;
    }

    public function takeDamage(int $value): void
    {
        $this->hp = max(0, $this->hp - $value);
    }

    public function heal(int $value): void
    {
        $this->hp = min($this->maxHp, $this->hp + $value);
    }

    public function isAlive(): bool
    {
        return $this->hp > 0;
    }

    public function getCurrentHp(): int
    {
        return $this->hp;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }
}
