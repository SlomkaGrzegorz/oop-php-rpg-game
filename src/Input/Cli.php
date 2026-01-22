<?php

namespace Input;

class CLI implements InputInterface
{
    public function info(string $message): void
    {
        echo $message . PHP_EOL;
    }

    public function choose(string $question, array $options): int|string
    {
        $this->info($question);
        foreach ($options as $key => $label) {
            $this->info("[$key] $label");
        }

        while (true) {
            echo "> ";
            $input = trim(fgets(STDIN));
            if (array_key_exists($input, $options)) {
                return is_numeric($input) ? (int) $input : $input;
            }

            $this->info("Niepoprawna opcja! Spróbuj ponownie.");
        }
    }
}
