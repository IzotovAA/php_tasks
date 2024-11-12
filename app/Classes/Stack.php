<?php

declare(strict_types=1);

namespace Classes;

class Stack
{
    private ?StackItem $top = null;

    public function addToStack(string | int $data): void
    {
        $stackItem = new StackItem($data);

        if ($this->top !== null) {
            $stackItem->setPrevious($this->top);
        }

        $this->top = $stackItem;
    }

    public function getFromStack(): ?StackItem
    {
        if ($this->top !== null) {
            $top = $this->top;
            $this->top = $this->top->getPrevious();

            return $top;
        }

        return null;
    }

    public function stringReverse(string $initialString): string
    {
        $reverseString = '';

        if ($initialString === '') {
            return '';
        }

        $this->clearStack();
        $length = mb_strlen($initialString);

        for ($i = 0; $i < $length; $i++) {
            $this->addToStack(mb_substr($initialString, $i, 1));
        }

        for ($i = 0; $i < $length; $i++) {
            $reverseString .= $this->getFromStack()->getData();
        }

        return $reverseString;
    }

    public function clearStack(): void
    {
        $this->top = null;
    }

    public function printStack(): void
    {
        if ($this->top === null) {
            echo 'Stack is empty' . '<br>';
            return;
        }

        $top = $this->top;

        while ($top !== null) {
            echo $top->getData() . ' ';
            $top = $top->getPrevious();
        }

        echo '<br>';
    }
}
