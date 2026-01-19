<?php
class weapons extends items{
    protected int $dmg;


    public function getDmg(): int{
        return $this->dmg;
    }
}