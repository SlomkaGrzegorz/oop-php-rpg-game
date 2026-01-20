<?php
require_once 'items.php';
require_once 'consumable.php';
require_once 'hp potion.php';
require_once 'weapons.php';
require_once 'wooden sword.php';
require_once 'armours.php';
require_once 'leatherChestplate.php';
require_once 'equipment.php';
require_once 'inventory.php';


class Player {
    public int $hp = 50;
    public Equipment $equipment;

    public function __construct() {
        $this->equipment = new Equipment();
    }


}

$player = new Player();
$inventory = new Inventory();

$inventory->add(new hpPotion());
$inventory->add(new leatherChestplate());
$inventory->add(new woodenSword());
$inventory->add(new legendarySword());
$inventory->add(new ironChestplate());
$inventory->add(new leatherPants());

while (true) {
    echo "\n============================================\n";
    echo " HP: " . $player->hp . " | Pancerz: " . $player->equipment->getTotalArmorValue() . "\n";
    echo "============================================\n";
    echo " [1] Pokaż plecak\n";
    echo " [2] Użyj przedmiotu\n";
    echo " [3] Wyświetl co mam na sobie (Debug)\n";
    echo " [4] DODAJ LOSOWY ITEM (Cheat)\n";
    echo " [0] Wyjście\n";
    echo "============================================\n";

    $input = readline("Twój wybór > ");

    switch ($input) {
        case '1':
            $inventory->show();
            break;

        case '2':
            $inventory->show();
            $id = readline("Podaj numer przedmiotu do użycia: ");


            if (is_numeric($id)) {
                $inventory->useItem((int)$id, $player);
            } else {
                echo "To nie jest liczba!\n";
            }
            break;

        case '3':
            echo "\n--- EKWIPUNEK ---\n";
            echo "Suma obrony z pancerza: " . $player->equipment->getTotalArmorValue() . "\n";
            echo "Obrażenia broni: " . $player->equipment->getDamageValue() . "\n";
            break;

        case '4':

            $los = rand(1, 3);
            if ($los == 1) $item = new hpPotion();
            if ($los == 2) $item = new woodenSword();
            if ($los == 3) $item = new leatherChestplate();

            echo "\n[CHEAT] Z nieba spada: " . $item->getName() . "!\n";
            $inventory->add($item);
            break;

        case '0':
            echo "Koniec gry.\n";
            exit;

        default:
            echo "Nieznana komenda.\n";
    }
}