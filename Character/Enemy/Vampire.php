<?php
class Vampire extends Character {
    public function __construct() {
        parent::__construct("Wampir", 150, 20, 40);
        $this->CriticalChance = 30;
        $this->CriticalMultiplier = 2.0;
    }
}