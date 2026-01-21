<?php

namespace Player;

final class PlayerFactory
{
    public static function create(): Player
    {
        echo "Wybierz postać:\n";
        // Paste here all characters to add //

        $choice = trim(readline());

        return match ($choice) {
            /* Create here match table like:
                1 => new player(constructor),
                2 => new Player(constructor)
            */
        };
    }
}