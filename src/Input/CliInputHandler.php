<?php

namespace Input;

final class CliInputHandler implements InputHandlerInterface
{
    public function getPlayerAction(): int
    {
        echo "1. Atak\n";
        return (int) trim(readline());
    }
}