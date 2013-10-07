<?php

function task1()
{
    for ($i = 1; $i <= 10; $i++) {
        echo "This is task 1 iteration $i<br>";
        yield;
    }
}

function task2()
{
    for ($i = 1; $i <= 5; $i++) {
        echo "This is task 2 iteration $i<br>";
        yield;
    }
}

function task($max)
{
    $tid = (yield getTaskId()); // do system call
    for ($i = 1; $i <= $max; ++$i) {
        echo "This is task $tid iteration $i.<br>";
        yield;
    }
}

function getTaskId()
{
    return new SystemCall(function(Task $task, Scheduler $scheduler) {
        $task->setSendValue($task->getTaskId());
        $scheduler->schedule($task);
    });
}

function  newTask(Generator $coroutine)
{
    return new SystemCall(
        function(Task $task, Scheduler $scheduler) use ($coroutine) {
            $task->setSendValue($scheduler->newTask($coroutine));
            $scheduler->schedule($task);
        }
    );
}

function killTask($tid)
{
    return new SystemCall(
        function(Task $task, Scheduler $scheduler) use ($tid) {
            $task->setSendValue($scheduler->killTask($tid));
            $scheduler->schedule($task);
        }
    );
}

function waitForRead($socket)
{
    return new SystemCall(
        function(Task $task, Scheduler $scheduler) use ($socket) {
            $scheduler->waitForRead($socket, $task);
        }
    );
}

function waitForWrite($socket)
{
    return new SystemCall(
        function(Task $task, Scheduler $scheduler) use ($socket) {
            $scheduler->waitForWrite($socket, $task);
        }
    );
}


function childTask()
{
    $tid = (yield getTaskId());

    $iterations = 0;
    while (true) {
        echo "Child task $tid still alive.<br>";
        yield;

        if ($iterations++ > 10) {
            echo "Ending child task because it never got killed.<br>";
            break;
        }
    }
}

function parentTask()
{
    $tid = (yield getTaskId());
    $childTid = (yield newTask(childTask()));

    for ($i = 1; $i <= 6; $i++) {
        echo "Parent task $tid iteration $i.<br>";
        yield;

        if ($i == 3) {
            echo "Parent sending message to kill child task.<br>";
            yield killTask($childTid);
        }
    }
}
