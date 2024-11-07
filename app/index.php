<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$test = new \Classes\Testing();

$test->startTestSearching(50, 5, 'ALL', true);