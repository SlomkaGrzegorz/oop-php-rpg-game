<?php

namespace Game;

use Character\Character;

interface Attacker
{
    public function attack(Character $target): void;
}
