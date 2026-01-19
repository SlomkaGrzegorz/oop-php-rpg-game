<?php
class Equipment {
    private array $slots = [
        0 => null,//głowa
        1 => null,//klatka
        2 => null,//nogi
        3 => null,//buty
    ];

    private ?weapons $weaponSlot = null;

    public function equip(armours $newArmor): ?armours {
        $slotId = $newArmor->getSlot();

        $oldItem = $this->slots[$slotId];

        $this->slots[$slotId] = $newArmor;

        echo "Założono: " . $newArmor->getName() . ".\n";

        return $oldItem;
    }


    public function getTotalArmorValue(): int {
        $totalDefense = 0;

        foreach ($this->slots as $armor) {
            if ($armor !== null) {
                $totalDefense += $armor->getArmour();
            }
        }

        return $totalDefense;
    }

    public function equipWeapon(weapons $newWeapon): ?weapons {
        $oldweapon = $this->weaponSlot;

        $this->weaponSlot = $newWeapon;

        echo "Założyłeś broń: " . $newWeapon->getName() . ".\n";

        return $oldweapon;
    }

    public function getDamageValue(): int {

        if(this->weaponSlot === null) {
            return 1;
        }

        return $this->weaponSlot->getDmg();
    }


}