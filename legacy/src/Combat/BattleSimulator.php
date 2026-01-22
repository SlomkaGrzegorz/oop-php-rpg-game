<?php

namespace Src\Combat;

class BattleSimulator
{
    public function simulate($player, $enemy): void
    {
        echo "=== WALKA ===\n";

        while ($player->isAlive() && $enemy->isAlive()) {
            $enemy->takeDamage(
                $player->calculateDamage()
            );

            echo "Wróg traci HP\n";

            if ($enemy->isAlive()) {
                $player->takeDamage(
                    $enemy->getDamage()
                );
                echo "Gracz traci HP\n";
            }
        }

        echo $player->isAlive()
            ? "Wróg pokonany!\n"
            : "Zginąłeś...\n";
    }
}
