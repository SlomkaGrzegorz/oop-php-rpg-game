<?php

namespace Src\Character;
use Src\Character\Races\Race;

class Player extends Character
{
    protected Race $Race;

    public function __construct(string $Name, Race $chosenRace, int $BaseHP, int $BaseDamage, int $BaseArmor)
    {
        $this->Race = $chosenRace;
        $FinalHP = $BaseHP + $chosenRace->HPBonus;
        $FinalDamage = $BaseDamage + $chosenRace->DamageBonus;
        $FinalArmor = $BaseArmor + $chosenRace->ArmorBonus;

        parent::__construct($Name, $FinalHP, $FinalDamage, $FinalArmor);
    }

    public function getRaceName(): string
    {
        return $this->Race->Name;
    }

    public function isAlive(): bool
    {
        return $this->hp > 0;
    }
}