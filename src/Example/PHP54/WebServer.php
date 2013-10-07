<?php
namespace Example\PHP54;
class WebServer {} ?>

<h1>PHP 5.4 Built-in Webserver</h1>

<p>No need to set up nginx or apache in order to develop or test something locally.</p>

<p>Navigate to the directory with the code you want to serve:</p>
<blockquote>php -S localhost:8000</blockquote>

<p>To specify a document root directory, use the -t flag</p>
<blockquote>php -S localhost:8000 -t foo/</blockquote>

<p>If you use routing (like Zend's .htaccess or equivalent) you can specify a PHP
script to route. Your router should return false if the server should just serve
the regular file.</p>
<blockquote>php -S localhost:8000 router.php</blockquote>

