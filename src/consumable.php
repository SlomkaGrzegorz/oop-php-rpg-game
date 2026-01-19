<?php
class consumable extends items{
    protected int $usageNumber;

    public function Use($player): void{
        $this->usageNumber--;
    }
}