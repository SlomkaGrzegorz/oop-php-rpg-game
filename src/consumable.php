<?php
class consumable extends items{
    protected int $usageNumber;

    public function Use($player): void{
        if($this->usageNumber > 0){
            $this->usageNumber--;
        }

    }

    public function isEmpty(): bool{
        return $this->usageNumber <= 0;
    }

}