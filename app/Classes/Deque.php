<?php

declare(strict_types=1);

namespace Classes;

class Deque
{
    private ?DequeItem $leftElement = null;
    private ?DequeItem $rightElement = null;

    public function addToLeft(string | int $data): void
    {
        $dequeItem = new DequeItem($data);

        if ($this->leftElement !== null) {
            $dequeItem->setNextFromLeftSide($this->leftElement);
            $this->leftElement->setNextFromRightSide($dequeItem);
            $this->leftElement = $dequeItem;
        } else {
            $this->leftElement = $dequeItem;
            $this->rightElement = $dequeItem;
        }
    }

    public function addToRight(string | int $data): void
    {
        $dequeItem = new DequeItem($data);

        if ($this->rightElement !== null) {
            $dequeItem->setNextFromRightSide($this->rightElement);
            $this->rightElement->setNextFromLeftSide($dequeItem);
            $this->rightElement = $dequeItem;
        } else {
            $this->rightElement = $dequeItem;
            $this->leftElement = $dequeItem;
        }
    }


    public function getFromLeftSide(): ?DequeItem
    {
        if ($this->leftElement !== null && $this->leftElement === $this->rightElement) {
            $this->leftElement = $this->leftElement->getNextFromLeftSide();
            $this->rightElement = null;
        } elseif ($this->leftElement !== null) {
            $this->leftElement = $this->leftElement->getNextFromLeftSide();
            $this->leftElement->setNextFromRightSide(null);
        }

        return $this->leftElement;
    }

    public function getFromRightSide(): ?DequeItem
    {
        if ($this->rightElement !== null && $this->leftElement === $this->rightElement) {
            $this->rightElement = $this->rightElement->getNextFromRightSide();
            $this->leftElement = null;
        } elseif ($this->rightElement !== null) {
            $this->rightElement = $this->rightElement->getNextFromRightSide();
            $this->rightElement->setNextFromLeftSide(null);
        }

        return $this->rightElement;
    }

    public function printDeque(): void
    {
        if ($this->leftElement === null) {
            echo 'Deque is empty' . '<br>';
            return;
        }

        $left = $this->leftElement;

        while ($left !== null) {
            echo $left->getData() . ' ';
            $left = $left->getNextFromLeftSide();
        }

        echo '<br>';
    }

    public function clearDeque(): void
    {
        $this->leftElement = null;
        $this->rightElement = null;
    }
}
