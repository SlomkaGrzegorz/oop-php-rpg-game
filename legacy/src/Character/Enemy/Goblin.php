<?php

namespace Src\Character\Enemy;

use Src\Character\Character;

class Goblin extends Character
{
    public function __construct()
    {
        parent::__construct("Goblin", 35, 6, 0);
        $this->CriticalChance = 25;
    }
}