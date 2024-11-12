<?php

declare(strict_types=1);

namespace Classes;

class StackItem
{
    private string | int $data;
    private ?StackItem $previous = null;

    public function __construct(string | int $data)
    {
        $this->data = $data;
    }

    public function getData(): int|string
    {
        return $this->data;
    }

    public function setPrevious(StackItem $previous): void
    {
        $this->previous = $previous;
    }

    public function getPrevious(): ?StackItem
    {
        return $this->previous;
    }

}
