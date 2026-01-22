<?php

require __DIR__ . '/../vendor/autoload.php';

use Character\CharacterFactory;
use Dungeon\DungeonFactory;
use Game\Game;
use Input\CLI;

$game = new Game(
    new CLI(),
    new CharacterFactory(),
    new DungeonFactory()
);

$game->run();

