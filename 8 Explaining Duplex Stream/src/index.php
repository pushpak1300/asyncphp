<?php

require_once __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;
use React\Stream\ReadableResourceStream;
use React\Stream\WritableResourceStream;

$stream = new ReadableResourceStream(STDIN);
$output = new WritableResourceStream(STDOUT);


$stream->on('data', function ($chunk) use ($output) {
    $output->write(strtoupper($chunk));
});

Loop::addPeriodicTimer(1, function () use ($output) {
    $output->write('tick' . PHP_EOL);
});
