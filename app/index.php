<?php

declare(strict_types=1);

use Classes\Deque;

require_once 'vendor/autoload.php';

$deque = new Deque();

$deque->addRight('hello world');
$deque->printDeque();
$deque->addLeft('123');
$deque->printDeque();
$deque->addRight('321');
$deque->printDeque();
$deque->getLeft();
$deque->printDeque();
$deque->getRight();
$deque->printDeque();
$deque->getLeft();
$deque->getLeft();
$deque->printDeque();
$deque->getRight();
$deque->getRight();
$deque->printDeque();
