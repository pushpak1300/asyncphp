<?php

require_once __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;

$timer = Loop::addPeriodicTimer(1, function () {
    echo 'tick!' . PHP_EOL;
});

Loop::addTimer(10, function () use ($timer) {
    Loop::cancelTimer($timer);
    echo 'Done' . PHP_EOL;
});
