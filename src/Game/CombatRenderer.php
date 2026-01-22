<?php

namespace Game;

use Input\InputInterface;

class CombatRenderer
{
    private InputInterface $input;

    public function __construct(InputInterface $input)
    {
        $this->input = $input;
    }

    public function render(CombatResult $result): void
    {
        $this->input->info("Rozpoczyna się walka z {$result->getEnemyName()}!");

        foreach ($result->getEvents() as $event) {
            $this->input->info(
                "{$event->getAttackerName()} zadaje {$event->getDamage()} obrażeń. {$event->getDefenderName()} ma {$event->getDefenderHp()} HP"
            );

            if ($event->isDefenderDefeated()) {
                $this->input->info("{$event->getDefenderName()} został pokonany!");
            }
        }
    }
}

