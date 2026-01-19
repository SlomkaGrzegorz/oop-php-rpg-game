<?php
abstract class Race {
    public string $Name;
    public int $HPBonus;
    public int $DamageBonus;
    public int $ArmorBonus;

    public function __construct(string $Name, int $HPBonus, int $dmgBonus, int $ArmorBonus) {
        $this->Name = $Name;
        $this->HPBonus = $HPBonus;
        $this->DamageBonus = $dmgBonus;
        $this->ArmorBonus = $ArmorBonus;
    }
}

class Elf extends Race {
    public function __construct() {
        parent::__construct("Elf", -10, 5, 0);
    }
}

class Orc extends Race {
    public function __construct() {
        parent::__construct("Ork", 20, 2, -5);
    }
}

class Human extends Race {
    public function __construct() {
        parent::__construct("Człowiek", 0, 0, 0);
    }
}