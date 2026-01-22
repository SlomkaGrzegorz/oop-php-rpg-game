<?php

namespace Items;

use Character\Character;

interface Usable
{
    public function use(Character $character): void;
}
