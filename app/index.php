<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$reverse = new \Classes\StringReverse();

echo 'Привет Hello, world!<br>';
echo $reverse->reverse('Привет Hello, world!') . '<br><br>';

echo 'Пустая строка<br>';
echo $reverse->reverse('') . '<br><br>';

echo 'Лёша на полке клопа нашёл<br>';
echo $reverse->reverse('Лёша на полке клопа нашёл') . '<br><br>';
