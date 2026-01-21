<?php
class Inventory {
    private array $items = [];


    public function add(items $item): void {
        $this->items[] = $item;
        echo "Do plecaka trafia: " . $item->getName() . "\n";
    }

    public function show(): void {
        echo "\n--- ZAWARTOŚĆ PLECAKA ---\n";

        if (empty($this->items)) {
            echo "(Pusto)\n";
            return;
        }

        foreach ($this->items as $index => $item) {
            echo "[$index] " . $item->getName() . " - " . $item->getDescription() . "\n";
        }
        echo "-------------------------\n";
    }


      public function useItem(int $index, $player): void {

        if (!isset($this->items[$index])) {
            echo "Nie ma przedmiotu o numerze $index!\n";
            return;
        }

        $item = $this->items[$index];

        if ($item instanceof armours) {
            echo "Próbujesz założyć: " . $item->getName() . "...\n";

            $oldItem = $player->equipment->equip($item);

            $this->remove($index);

            if ($oldItem !== null) {
                echo "Do plecaka wraca: " . $oldItem->getName() . "\n";
                $this->add($oldItem);
            }
        }
        elseif ($item instanceof consumable) {
            $item->Use($player);

            if($item->isEmpty() === true)
            {
                $this->remove($index);
            }
        }

        elseif ($item instanceof weapons) {
            $oldItem = $player->equipment->equipWeapon($item);

            $this->remove($index);

            if ($oldItem !== null) {
                echo "Do plecaka wraca: " . $oldItem->getName() . "\n";
                $this->add($oldItem);
            }

        }
        else {
            echo "Tego przedmiotu nie da się użyć.\n";
        }
    }

    public function remove(int $index): void {
        if (isset($this->items[$index])) {
            unset($this->items[$index]);

            $this->items = array_values($this->items);
        }
    }
}


