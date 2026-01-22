<?php

namespace Character;

use Items\Item;

interface PlayableCharacter
{
    public function getName(): string;

    public function create(): Character;

    /** @return Item[] */
    public function getStartingItems(): array;

    /** @return Item[] */
    public function getStartingEquipment(): array;
}
