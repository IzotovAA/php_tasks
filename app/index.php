<?php

declare(strict_types=1);

use Classes\Deque;

require_once 'vendor/autoload.php';

$deque = new Deque();

echo 'add to left<br>';
$deque->addToLeft(1);
$deque->addToLeft(2);
$deque->addToLeft(3);
$deque->addToLeft(4);
$deque->addToLeft(5);
$deque->printDeque();

echo '<br>get from left<br>';
$deque->getFromLeftSide();
$deque->printDeque();
$deque->getFromLeftSide();
$deque->printDeque();
$deque->getFromLeftSide();
$deque->printDeque();
$deque->getFromLeftSide();
$deque->printDeque();
$deque->getFromLeftSide();
$deque->printDeque();

echo '<br>add to right<br>';
$deque->addToRight(1);
$deque->addToRight(2);
$deque->addToRight(3);
$deque->addToRight(4);
$deque->addToRight(5);
$deque->printDeque();

echo '<br>get from left<br>';
$deque->getFromRightSide();
$deque->printDeque();
$deque->getFromRightSide();
$deque->printDeque();

echo 'add to left<br>';
$deque->addToLeft(1);
$deque->addToLeft(2);
$deque->addToLeft(3);
$deque->printDeque();

echo '<br>clear<br>';
$deque->clearDeque();
$deque->printDeque();
