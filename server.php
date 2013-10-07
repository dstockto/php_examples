<?php
require_once 'Autoloader.php';
require_once 'functions.php';

function server($port)
{
    echo "Server started at port $port...\n";

    $socket = @stream_socket_server("tcp://localhost:$port", $errNo, $errStr);

    if (!$socket) {
        throw new InvalidArgumentException($errStr, $errNo);
    }

    stream_set_blocking($socket, 0);

    while (true) {
        yield newTask(
            handleClient(yield $socket->accept());
        );
    }
}

function handleClient($socket)
{
    $data = (yield);
}

$scheduler = new Scheduler();
$scheduler->newTask(server(80));
$scheduler->run();
