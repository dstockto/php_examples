<?php
namespace Example;


class CallStatic
{
    public static function __callStatic($name, $arguments)
    {
        return "You've called a non-existant static function named '$name' with arguments '" .
            implode('\', \'', $arguments) . '\'';
    }
}


echo CallStatic::totallyMadeUpFunction('my argument', 'another argument', 'the last one') . '.';
