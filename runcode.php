<?php
require_once 'src/Autoloader.php';

$src = $_GET['src'];
if (strpos($src, '..') !== false) {
    die('Cannot run that');
}
?>
<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>PHP Example</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <blockquote>
            <?php $class = new $src; ?>
        </blockquote>
    </div>
</body>
</html>
