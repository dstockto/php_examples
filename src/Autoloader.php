<?php
class Autoloader
{
    public function autoload($className)
    {
        require_once __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    }
}

spl_autoload_register([new Autoloader(), 'autoload']);