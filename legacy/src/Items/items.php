<?php

namespace Src\Items;
abstract class items
{
    protected string $name;
    protected string $description;


    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

}