<?php

require_once __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;

$n = 1;
Loop::addPeriodicTimer(1, function () use (&$n) {
    echo "hello $n\n";
    $n++;
});

// Loop::addPeriodicTimer(5, function () use (&$n) {
//     Loop::removeSignal(SIGINT, function (int $signal) {
//         Loop::stop();
//     });
// });

Loop::addSignal(SIGINT, function (int $signal) {
    echo 'Handling interrupt signal' . PHP_EOL;
    echo "sleeping for 2 seconds\n";
    sleep(3);
    echo "done\n";
});
