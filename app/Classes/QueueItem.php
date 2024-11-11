<?php

declare(strict_types=1);

namespace Classes;

class QueueItem
{
    private string | int $data;
    private ?QueueItem $next = null;

    public function __construct(string | int $data)
    {
        $this->data = $data;
    }

    public function getData(): int|string
    {
        return $this->data;
    }

    public function setNext(QueueItem $next): void
    {
        $this->next = $next;
    }

    public function getNext(): ?QueueItem
    {
        return $this->next;
    }
}
