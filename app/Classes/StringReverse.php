<?php

declare(strict_types=1);

namespace Classes;

class StringReverse extends Stack
{
    public function reverse(string $initialString): string
    {
        $result = '';
        $lenght = mb_strlen($initialString);

        $this->addData($initialString);

        for ($i = 0; $i < $lenght; $i++) {
            $result = $result . $this->getData();
        }

        return $result;
    }

}
