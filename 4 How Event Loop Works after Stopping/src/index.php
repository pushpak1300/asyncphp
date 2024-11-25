<?php

require_once __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;

$timer = Loop::addPeriodicTimer(1, function () {
    echo 'tick!' . PHP_EOL;
});

Loop::addTimer(10, function () use ($timer) {
    Loop::cancelTimer($timer);
    echo 'Done' . PHP_EOL;
});



$loop = Loop::get();
$loop->addTimer(3, function () use ($loop) {
    assert($loop instanceof LoopInterface);
    echo 'Stopping loop' . PHP_EOL;
    $loop->stop();
    echo 'Stopped loop' . PHP_EOL;
    $loop->run();
});

$loop->addTimer(4, function () use ($loop) {
    $loop->stop();
    echo 'Stopped loop again' . PHP_EOL;
});
