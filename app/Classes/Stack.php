<?php

declare(strict_types=1);

namespace Classes;

class Stack
{
    private string $store = '';

    protected function addData(string $data): void
    {
        $this->store = $this->store . $data;
    }

    protected function getData(): string
    {
        $lastSymbol = mb_substr($this->store, -1);
        $tempStore = $this->store;
        $this->store = '';
        $lenght = mb_strlen($tempStore);

        for ($i = 0; $i < $lenght - 1; $i++) {
            $this->addData(mb_substr($tempStore, $i, 1));
        }

        return $lastSymbol;
    }
}
