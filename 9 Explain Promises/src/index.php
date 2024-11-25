<?php

require_once __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;
use React\Promise\PromiseInterface;


function asyncFunction($callback): void
{
    try {
        sleep(3);
        $callback(null, 'Hello');
    } catch (Throwable) {
        $callback(new Exception('Shit Happens'), null);
    }
}

function getAwesomeResultPromise(): PromiseInterface
{
    $deferred = new React\Promise\Deferred();
    asyncFunction(function (?Throwable $error, $result) use ($deferred) {
        if ($error) {
            $deferred->reject($error);
        } else {
            $deferred->resolve($result);
        }
    });

    // Return the promise
    return $deferred->promise();
}

getAwesomeResultPromise()
    ->then(
        function ($value) {
            echo $value;
        },
        function (Throwable $reason) {
            echo $reason->getMessage();
        }
    );
