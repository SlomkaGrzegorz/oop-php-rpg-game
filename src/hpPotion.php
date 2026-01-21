<?php
class hpPotion extends consumable{
    protected string $name = "Mikstura zdrowia";
    protected string $description = "Mikstura odnawiająca";
    protected int $usageNumber = 1;
    protected int $healAmount;

    public function Use($player): void
    {
        parent::Use($player);

        $this->healAmount = rand(2, 5);
        $player->hp += $this->healAmount;

        echo "Użyłeś {$this->name}. Odzyskałeś {$this->healAmount} HP.\n";
    }

}
