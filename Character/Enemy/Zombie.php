<?php
class Zombie extends Character {
    public function __construct() {
        parent::__construct("Zombie", 120, 4, 10);
        $this->CriticalChance = 0;
    }
}