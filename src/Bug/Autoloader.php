<?php
class Autoloader
{
    public static function autoload($className)
    {
        require_once $className . '.php';
    }
}
$al = new Autoloader();

spl_autoload_register('Autoloader::autoload');

new ClosureBug();
