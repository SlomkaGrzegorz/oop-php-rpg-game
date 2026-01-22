<?php

namespace Src\Character\Enemy;

use Src\Character\Character;

class Skeleton extends Character
{
    public function __construct()
    {
        parent::__construct("Szkielet", 50, 10, 30);
    }
}