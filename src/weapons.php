<?php
class weapons extends items{
    protected int $dmg;


    public function getDmg(int $dmg): int{
        return $this->dmg;
    }
}