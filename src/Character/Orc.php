<?php

namespace Character;

class Orc implements PlayableCharacter
{
    private string $name = 'Ork';

    public function getName(): string
    {
        return $this->name;
    }

    public function create(): Character
    {
        return new Character($this->name, new Stats(120, 20, 0));
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