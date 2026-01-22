<?php

namespace Game;

use Character\Character;
use Character\CharacterFactoryInterface;
use Character\PlayableCharacter;
use Dungeon\DungeonFactoryInterface;
use Input\InputInterface;
use Items\Consumable;
use Items\Item;

class Game
{
    private InputInterface $input;
    private CharacterFactoryInterface $characterFactory;
    private DungeonFactoryInterface $dungeonFactory;
    private CombatEngine $combatEngine;
    private CombatRenderer $combatRenderer;

    public function __construct(
        InputInterface $input,
        CharacterFactoryInterface $characterFactory,
        DungeonFactoryInterface $dungeonFactory
    ) {
        $this->input = $input;
        $this->characterFactory = $characterFactory;
        $this->dungeonFactory = $dungeonFactory;
        $this->combatEngine = new CombatEngine();
        $this->combatRenderer = new CombatRenderer($input);
    }

    public function run(): void
    {
        $this->input->info("==============================");
        $this->input->info(" WITAMY W GRZE!");
        $this->input->info("==============================");

        $availableCharacters = $this->characterFactory->getAvailableCharacters();
        $playerChoice = $this->chooseCharacter($availableCharacters);
        if ($playerChoice === null) {
            $this->input->info("Wychodzisz z gry. Do zobaczenia!");
            return;
        }

        $selectedPlayable = $availableCharacters[$playerChoice];
        $player = $this->characterFactory->createCharacter($selectedPlayable);
        $this->applyStartingItems($player, $selectedPlayable);

        $this->input->info("Wybrałeś postać: {$player->getName()}");

        $dungeon = $this->dungeonFactory->createDungeon();
        $currentRoomIndex = 0;

        while (true) {
            $currentRoom = $dungeon->getRoom($currentRoomIndex);
            if (!$currentRoom) {
                $this->input->info("Nie znaleziono pokoju.");
                break;
            }

            $this->input->info("\nJesteś w {$currentRoom->getName()}");

            if ($currentRoom->hasEnemy()) {
                $enemy = $currentRoom->getEnemy();
                if ($enemy) {
                    $result = $this->combatEngine->fight($player, $enemy);
                    $this->combatRenderer->render($result);

                    if ($currentRoom->isBossRoom() && !$enemy->isAlive()) {
                        $this->input->info("\n🎉 Gratulacje! Pokonałeś Bossa i ukończyłeś grę! 🎉");
                        break;
                    }

                    $currentRoom->clearEnemy();
                }
            } elseif ($currentRoom->hasItem()) {
                $item = $currentRoom->getItem();
                if ($item) {
                    $this->input->info("Znalazłeś przedmiot: {$item->getName()}");
                    $player->addItem($item);
                    $currentRoom->clearItem();
                }
            } else {
                $this->input->info("Pokój jest pusty.");
            }

            $this->input->info("Twoje HP: {$player->getCurrentHp()}/{$player->getMaxHp()}");

            if (!$player->isAlive()) {
                $this->input->info("Umierasz. Koniec gry.");
                break;
            }

            $action = $this->chooseNextAction($dungeon->getRooms(), $currentRoom->getConnections());
            if ($action === 'q') {
                $this->input->info("Wychodzisz z gry. Do zobaczenia!");
                return;
            }

            if ($action === 'e') {
                $this->openInventory($player);
                continue;
            }

            if (is_int($action)) {
                $currentRoomIndex = $action;
            }
        }

        $this->renderSummary($player);
    }

    /** @param PlayableCharacter[] $availableCharacters */
    private function chooseCharacter(array $availableCharacters): ?int
    {
        $options = [];
        foreach ($availableCharacters as $index => $character) {
            $options[(string) $index] = $character->getName();
        }
        $options['q'] = 'Wyjdź z gry';

        $choice = $this->input->choose("Wybierz postać:", $options);

        if ($choice === 'q') {
            return null;
        }

        return (int) $choice;
    }

    private function applyStartingItems(Character $player, PlayableCharacter $playable): void
    {
        $player->addItem(new Consumable('Potion', 20));

        foreach ($playable->getStartingItems() as $item) {
            $player->addItem($item);
        }

        foreach ($playable->getStartingEquipment() as $item) {
            $player->addItem($item);
            $player->equip($item);
            $this->input->info("Postać zaczyna grę z bronią: {$item->getName()}");
        }
    }

    /** @param \Dungeon\Room[] $rooms */
    private function chooseNextAction(array $rooms, array $connections): int|string
    {
        $options = [];
        foreach ($connections as $connection) {
            $options[(string) $connection] = $rooms[$connection]->getName();
        }
        $options['e'] = 'Otwórz ekwipunek';
        $options['q'] = 'Wyjdź z gry';

        return $this->input->choose("Opcje dostępne:", $options);
    }

    private function openInventory(Character $player): void
    {
        while (true) {
            $this->renderInventory($player);
            $options = [];
            foreach ($player->getInventoryItems() as $index => $item) {
                $options[(string) $index] = $item->getName() . ' (' . $this->getItemType($item) . ')';
            }
            $options['u'] = 'Zdejmij przedmiot';
            $options['b'] = 'Powrót do gry';

            $choice = $this->input->choose("Wybierz przedmiot do użycia/equip:", $options);

            if ($choice === 'b') {
                break;
            }

            if ($choice === 'u') {
                $this->handleUnequip($player);
                continue;
            }

            try {
                $player->useItem((int) $choice);
            } catch (\OutOfBoundsException $exception) {
                $this->input->info($exception->getMessage());
            }
        }
    }

    private function handleUnequip(Character $player): void
    {
        $options = [];
        foreach ($player->getEquipmentItems() as $slot => $item) {
            $label = $item ? $item->getName() : 'pusty';
            $options[$slot] = "$slot: $label";
        }
        $options['b'] = 'Powrót';

        $choice = $this->input->choose('Podaj slot do zdjęcia:', $options);
        if ($choice === 'b') {
            return;
        }

        $equipment = $player->getEquipmentItems();
        if (!isset($equipment[$choice]) || $equipment[$choice] === null) {
            $this->input->info("Slot $choice jest już pusty.");
            return;
        }

        try {
            $player->unequip((string) $choice);
            $this->input->info("Przedmiot został zdjęty ze slotu $choice i wrócił do ekwipunku.");
        } catch (\InvalidArgumentException $exception) {
            $this->input->info($exception->getMessage());
        }
    }

    private function renderInventory(Character $player): void
    {
        $this->input->info("\n=== EKWIPUNEK ===");
        if ($player->getInventoryItems() === []) {
            $this->input->info("Brak przedmiotów w ekwipunku.");
        } else {
            foreach ($player->getInventoryItems() as $index => $item) {
                $this->input->info("[$index] {$item->getName()} (" . $this->getItemType($item) . ")");
            }
        }

        $this->input->info("\nWyposażone przedmioty:");
        foreach ($player->getEquipmentItems() as $slot => $item) {
            $this->input->info("- $slot: " . ($item ? $item->getName() : 'pusty'));
        }
        $this->input->info("=================");
    }

    private function renderSummary(Character $player): void
    {
        $this->input->info("\n=== STATYSTYKI GRACZA ===");
        $this->input->info("HP: {$player->getCurrentHp()}/{$player->getMaxHp()}");
        $this->input->info("Atak: {$player->getAttack()}");
        $this->input->info("Obrona: {$player->getDefense()}");

        $this->input->info("Ekwipunek:");
        if ($player->getInventoryItems() === []) {
            $this->input->info("- brak przedmiotów w ekwipunku");
        } else {
            foreach ($player->getInventoryItems() as $item) {
                $this->input->info("- {$item->getName()}");
            }
        }

        $this->input->info("\nWyposażone przedmioty:");
        foreach ($player->getEquipmentItems() as $slot => $item) {
            $this->input->info("- $slot: " . ($item ? $item->getName() : 'pusty'));
        }
        $this->input->info("=========================");
    }

    private function getItemType(Item $item): string
    {
        $classParts = explode('\\', get_class($item));
        return end($classParts);
    }
}
