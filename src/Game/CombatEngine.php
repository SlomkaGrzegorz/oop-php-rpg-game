<?php

namespace Game;

use Character\Character;

class CombatEngine
{
    public function fight(Character $player, Character $enemy): CombatResult
    {
        $result = new CombatResult($player->getName(), $enemy->getName());

        while ($player->isAlive() && $enemy->isAlive()) {
            $enemyHpBefore = $enemy->getCurrentHp();
            $player->attack($enemy);
            $enemyHpAfter = $enemy->getCurrentHp();
            $playerDamage = $enemyHpBefore - $enemyHpAfter;
            $result->addEvent(new CombatEvent(
                $player->getName(),
                $enemy->getName(),
                $playerDamage,
                $enemyHpAfter,
                !$enemy->isAlive()
            ));

            if (!$enemy->isAlive()) {
                $result->setWinner($player->getName());
                break;
            }

            $playerHpBefore = $player->getCurrentHp();
            $enemy->attack($player);
            $playerHpAfter = $player->getCurrentHp();
            $enemyDamage = $playerHpBefore - $playerHpAfter;
            $result->addEvent(new CombatEvent(
                $enemy->getName(),
                $player->getName(),
                $enemyDamage,
                $playerHpAfter,
                !$player->isAlive()
            ));

            if (!$player->isAlive()) {
                $result->setWinner($enemy->getName());
                break;
            }
        }

        return $result;
    }
}
