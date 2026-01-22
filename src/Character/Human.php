<?php

namespace Character;

class Human implements PlayableCharacter
{
    private string $name = 'Człowiek';

    public function getName(): string
    {
        return $this->name;
    }

    public function create(): Character
    {
        return new Character($this->name, new Stats(100, 15, 5));
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
