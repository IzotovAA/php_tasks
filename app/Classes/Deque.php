<?php

declare(strict_types=1);

namespace Classes;

class Deque
{
    private string $deque = '';

    public function addRight(string $data): void
    {
        $this->deque = $this->deque . $data;
    }

    public function addLeft(string $data): void
    {
        $this->deque =  $data . $this->deque;
    }

    public function getRight(): string
    {
        $lastSymbol = mb_substr($this->deque, -1);
        $tempStore = $this->deque;
        $this->deque = '';
        $length = mb_strlen($tempStore);

        for ($i = 0; $i < $length - 1; $i++) {
            $this->addRight(mb_substr($tempStore, $i, 1));
        }

        echo 'getRight = ' . $lastSymbol . '<br>';

        return $lastSymbol;
    }

    public function getLeft(): string
    {
        $lastSymbol = mb_substr($this->deque, 0, 1);
        $tempStore = $this->deque;
        $this->deque = '';
        $length = mb_strlen($tempStore);

        for ($i = 1; $i < $length; $i++) {
            $this->addRight(mb_substr($tempStore, $i, 1));
        }

        echo 'getLeft = ' . $lastSymbol . '<br>';

        return $lastSymbol;
    }

    public function printDeque(): void
    {
        echo 'Deque = ' . $this->deque . '<br>';
    }
}
