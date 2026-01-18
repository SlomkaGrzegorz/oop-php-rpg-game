<?php
class Character{
    protected string $Name;
    protected int $MaxHP;
    protected int $CurrentHP;
    protected int $Damage;
    protected int $Armor;
    protected float $CalculatedArmor;
    protected int $CriticalChance = 10;
    protected float $CriticalMultiplier = 1.5;

    public function __construct(string $Name, int $HP, int $Damage, int $Armor) {
        $this->Name = $Name;
        $this->MaxHP = $HP;
        $this->CurrentHP = $HP;
        $this->Damage = $Damage;
        $this->Armor = $Armor;
        $this->calculateArmor();
    }

    public function getName() : string {
        return $this->Name;
    }
    public function getCurrentHP() : int{
        return $this->CurrentHP;
    }
    public function getMaxHP() : int{
        return $this->MaxHP;
    }
    public function getDamage() : int{
        return $this->Damage;
    }
    public function getCriticalChance() : int{
        return $this->CriticalChance;
    }
    public function getCriticalMultiplier() : float{
        return $this->CriticalMultiplier;
    }
    public function getArmor() : int{
        return $this->Armor;
    }
    public function getCalculatedArmor() : float{
        return $this->CalculatedArmor;
    }

    public function setHP(int $Amount) : void{
        $this->MaxHP += $Amount;
    }
    public function setDamage(int $Amount) : void{
        $this->Damage += $Amount;
    }

    public function takeDamage(int $Amount) : void  {
        $Multiplier = 1.0 - $this->CalculatedArmor;
        $this->CurrentHP -=($Amount*$Multiplier);
        if($this->CurrentHP<0)
            $this->CurrentHP = 0;
    }

    public function calculateDamage() :int{
        $Damage = $this->Damage;
        $Roll = rand(1,100);
        if($Roll<=$this->CriticalChance){
            return ($Damage*$this->CriticalMultiplier);
        }else return $Damage;
    }
    public function calculateArmor() : void {
        $K = 100;
        $Armor = $this->Armor;
        $this->CalculatedArmor = $Armor/($Armor+$K);
    }
}