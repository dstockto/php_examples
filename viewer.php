<?php
require_once 'src/Autoloader.php';

$file = $_GET['src'];
if (strpos($file, '..') !== false) {
    die('File not allowed.');
}

if (substr($file, 0, 4) != 'src/') {
    die('File not allowed.');
}

$viewer = new \Viewer\Source($file);
echo $viewer->viewSource();