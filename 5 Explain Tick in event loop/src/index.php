<?php

require_once __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;

function hello($name)
{
    Loop::futureTick(function () use ($name) {
        echo "hello $name\n";
    });

Loop::addPeriodicTimer(0.2, function () {
    hello('World');
});

Loop::addPeriodicTimer(0.4, function () {
    hello('Pune');
});

// Loop::futureTick(function () {
//     echo "hello 1\n";
// });

// Loop::futureTick(function () {
//     echo "hello 2\n";
// });

// echo "hello 3\n";

