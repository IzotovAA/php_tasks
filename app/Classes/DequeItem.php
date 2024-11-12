<?php

declare(strict_types=1);

namespace Classes;

class DequeItem
{
    private string | int $data;
    private ?DequeItem $nextFromRightSide = null;
    private ?DequeItem $nextFromLeftSide = null;

    public function __construct(string | int $data)
    {
        $this->data = $data;
    }

    public function getData(): int|string
    {
        return $this->data;
    }

    public function setNextFromRightSide(?DequeItem $next): void
    {
        $this->nextFromRightSide = $next;
    }

    public function getNextFromRightSide(): ?DequeItem
    {
        return $this->nextFromRightSide;
    }

    public function setNextFromLeftSide(?DequeItem $next): void
    {
        $this->nextFromLeftSide = $next;
    }

    public function getNextFromLeftSide(): ?DequeItem
    {
        return $this->nextFromLeftSide;
    }
}
