<?php

namespace Character;

class Elf implements PlayableCharacter
{
    private string $name = 'Elf';

    public function getName(): string
    {
        return $this->name;
    }

    public function create(): Character
    {
        return new Character($this->name, new Stats(80, 20, 3));
    }

    public function getStartingItems(): array
    {
        return [];
    }

    public function getStartingEquipment(): array
    {
        return [];
    }
}