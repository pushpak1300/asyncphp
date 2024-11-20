<?php

require_once __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;

$loop = Loop::get();

$timer = $loop->addPeriodicTimer(1, function () {
    echo 'Tick' . PHP_EOL;
});

$loop->addTimer(10, function () use ($loop, $timer) {
    $loop->cancelTimer($timer);
    echo 'Done' . PHP_EOL;
});

$loop->run();
