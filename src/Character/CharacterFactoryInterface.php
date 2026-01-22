<?php

namespace Character;

interface CharacterFactoryInterface
{
    /** @return PlayableCharacter[] */
    public function getAvailableCharacters(): array;

    public function createCharacter(PlayableCharacter $playable): Character;
}
