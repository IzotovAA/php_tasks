<?php

declare(strict_types=1);

use Classes\Stack;

require_once 'vendor/autoload.php';

$reverse = new Stack();

$string1 = 'Привет Hello, world!';
$string2 = '';
$string3 = 'Лёша на полке клопа нашёл';

echo 'Привет Hello, world!<br>';
echo 'reverse = ' . $reverse->stringReverse($string1) . '<br><br>';

echo 'Пустая строка<br>';
echo 'reverse = ' . $reverse->stringReverse($string2) . '<br><br>';

echo 'Лёша на полке клопа нашёл<br>';
echo 'reverse = ' . $reverse->stringReverse($string3) . '<br><br>';

echo 'Stack methods testing<br>';
$reverse->addToStack(1);
$reverse->addToStack(2);
$reverse->addToStack(3);
$reverse->printStack();

$reverse->getFromStack();
$reverse->printStack();
$reverse->getFromStack();
$reverse->printStack();
$reverse->addToStack(10);
$reverse->printStack();
$reverse->getFromStack();
$reverse->printStack();
$reverse->getFromStack();
$reverse->printStack();
