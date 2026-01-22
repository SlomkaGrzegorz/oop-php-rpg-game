<?php

namespace Input;

interface InputInterface
{
    public function info(string $message): void;

    public function choose(string $question, array $options): int|string;
}
