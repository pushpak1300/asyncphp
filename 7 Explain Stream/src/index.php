<?php

require_once __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;
use React\Stream\ReadableResourceStream;
use React\Stream\WritableResourceStream;

$stream = new ReadableResourceStream(STDIN);

$stream->on('data', function ($chunk) {
    echo strtoupper($chunk);
});
$stream->on('end', function () {
    echo 'END';
});


// $output = new WritableResourceStream(STDOUT);
// $output->write('hello!');
// $output->end();
