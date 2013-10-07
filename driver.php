<?php
require_once 'Autoloader.php';
require_once 'functions.php';



$scheduler = new Scheduler();

$scheduler->newTask(parentTask());

$scheduler->run();