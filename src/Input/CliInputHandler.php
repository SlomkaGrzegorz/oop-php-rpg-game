<?php

namespace Input;

use Combat\Action\{AttackAction, SpellAction, UseItemAction};

final class CliInputHandler implements InputHandlerInterface
{
    public function chooseAction()
    {
        echo "1. Atak\n2. Zaklęcie\n3. Item\n";
        return match (trim(readline())) {
            '2' => new SpellAction(),
            '3' => new UseItemAction(),
            default => new AttackAction(),
        };
    }
}