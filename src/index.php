<?php

require_once __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;

$loop = Loop::get();

$timer = $loop->addPeriodicTimer(1, function () {
    echo 'Tick' . PHP_EOL;
});

$loop->addTimer(3, function () use ($loop, $timer) {
    echo 'Stopping timer' . PHP_EOL;
    $timer->
    $loop->stop();
});

$loop->addTimer(5, function () use ($loop, $timer) {
    $loop->cancelTimer($timer);
    echo 'Done' . PHP_EOL;
});

$loop->run();

