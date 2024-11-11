<?php

declare(strict_types=1);

namespace Classes;

class Queue
{
    private ?QueueItem $first = null;
    private ?QueueItem $last = null;

    public function addToQueue(string | int $data): void
    {
        $queueItem = new QueueItem($data);

        if ($this->first !== null && $this->last !== null) {
            $this->last->setNext($queueItem);
        } else {
            $this->first = $queueItem;
        }

        $this->last = $queueItem;
    }

    public function getFromQueue(): ?QueueItem
    {
        if ($this->first !== null) {
            $first = $this->first;
            $this->first = $this->first->getNext();

            return $first;
        }

        return null;
    }

    public function clearQueue(): void
    {
        $this->first = null;
        $this->last = null;
    }

    public function printQueue(): void
    {
        if ($this->first === null) {
            echo 'Queue is empty' . '<br>';
            return;
        }

        $first = $this->first;

        while ($first !== null) {
            echo $first->getData() . ' ';
            $first = $first->getNext();
        }

        echo '<br>';
    }
}
