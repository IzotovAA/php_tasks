<?php

declare(strict_types=1);

use Classes\Queue;

require_once 'vendor/autoload.php';

$queue = new Queue();

$queue->addToQueue(1);
$queue->addToQueue(2);
$queue->addToQueue(3);

$queue->printQueue();

$queue->getFromQueue();

$queue->printQueue();

$queue->addToQueue(4);
$queue->addToQueue(5);
$queue->addToQueue(6);
$queue->addToQueue(7);

$queue->printQueue();

$queue->getFromQueue();

$queue->printQueue();

$queue->clearQueue();

$queue->printQueue();