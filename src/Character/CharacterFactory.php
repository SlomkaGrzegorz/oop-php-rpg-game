<?php

namespace Character;

class CharacterFactory implements CharacterFactoryInterface
{
    /** @var PlayableCharacter[] */
    private array $characters;

    public function __construct()
    {
        $this->characters = [
            new Human(),
            //new Elf(),
        ];
    }

    public function getAvailableCharacters(): array
    {
        return $this->characters;
    }

    public function createCharacter(PlayableCharacter $playable): Character
    {
        return $playable->create();
    }
}
