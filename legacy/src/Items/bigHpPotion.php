<?php

namespace Src\Items;

class bigHpPotion extends consumable
{
    protected string $name = "Duża Mikstura zdrowia";
    protected string $description = "odnawia od 6 do 10pkt życia";
    protected int $usageNumber = 1;
    protected int $healAmount;

    public function Use($player): void
    {
        parent::Use($player);

        $this->healAmount = rand(6, 10);
        $player->hp += $this->healAmount;

        echo "Użyłeś {$this->name}. Odzyskałeś {$this->healAmount} HP.\n";
    }

}
