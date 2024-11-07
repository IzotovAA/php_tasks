<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

set_time_limit(60);

$test = new \Classes\Testing();

$test->startTestSorting(30, 'ALL', true);