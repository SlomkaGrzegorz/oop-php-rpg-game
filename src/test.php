<?php
// --- 1. ŁADOWANIE KLAS ---
require_once 'items.php';
require_once 'consumable.php';
require_once 'hp potion.php';     // Upewnij się co do spacji w nazwie pliku
require_once 'weapons.php';
require_once 'wooden sword.php';  // Upewnij się co do spacji w nazwie pliku
require_once 'armours.php';
require_once 'leatherChestplate.php';
require_once 'equipment.php';
require_once 'inventory.php';

// --- 2. ATRAPA GRACZA ---
class Player {
    public int $hp = 50;
    public Equipment $equipment;

    public function __construct() {
        $this->equipment = new Equipment();
    }

    public function equipWeapon($weapon) {
        // Jeśli dodałeś obsługę broni w equipment.php, użyj tego:
        // return $this->equipment->equipWeapon($weapon);

        // Wersja uproszczona:
        echo " [GRACZ] Dobyto broni: " . $weapon->getName() . "\n";
        return null;
    }
}

// --- 3. PRZYGOTOWANIE GRY ---
$player = new Player();
$inventory = new Inventory();

// Na start dajemy kilka fantów
$inventory->add(new hpPotion());
$inventory->add(new leatherChestplate());
$inventory->add(new woodenSword());

// --- 4. GŁÓWNA PĘTLA GRY (GAME LOOP) ---
// To sprawia, że program działa ciągle, dopóki go nie zamkniesz
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

    // Pobieramy to, co wpiszesz w konsoli
    $input = readline("Twój wybór > ");

    switch ($input) {
        case '1':
            $inventory->show();
            break;

        case '2':
            $inventory->show();
            // Pytamy o numer przedmiotu
            $id = readline("Podaj numer przedmiotu do użycia: ");

            // Sprawdzamy czy wpisano liczbę
            if (is_numeric($id)) {
                $inventory->useItem((int)$id, $player);
            } else {
                echo "To nie jest liczba!\n";
            }
            break;

        case '3':
            echo "\n--- EKWIPUNEK ---\n";
            // Normalnie equipment jest prywatne, ale getTotalArmorValue pokazuje czy działa
            echo "Suma obrony z pancerza: " . $player->equipment->getTotalArmorValue() . "\n";
            // Jeśli dodałeś getWeaponName w equipment.php:
            // echo "Broń w ręce: " . $player->equipment->getWeaponName() . "\n";
            break;

        case '4':
            // Prosty generator losowych przedmiotów do testów
            $los = rand(1, 3);
            if ($los == 1) $item = new hpPotion();
            if ($los == 2) $item = new woodenSword();
            if ($los == 3) $item = new leatherChestplate();

            echo "\n[CHEAT] Z nieba spada: " . $item->getName() . "!\n";
            $inventory->add($item);
            break;

        case '0':
            echo "Koniec gry.\n";
            exit; // Zamyka skrypt

        default:
            echo "Nieznana komenda.\n";
    }
}