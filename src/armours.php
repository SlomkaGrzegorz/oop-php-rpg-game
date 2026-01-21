<?php
class armours extends items{
    protected int $armourValue;
    protected int $slot;

    public function getArmour(): int{
        return $this->armourValue;
    }

    public function getSlot(): int{
        return $this->slot;
    }
}