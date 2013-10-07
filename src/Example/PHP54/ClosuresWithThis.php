<?php
namespace Example\PHP54;

/**
 * PHP 5.4 introduced the ability to use $this within closures automatically
 */
class ClosuresWithThis
{
    private $hiddenValue = 42;

    public function retrieveClosure()
    {
        return function() { return $this->hiddenValue; };
    }

    public function setValue($value)
    {
        $this->hiddenValue = $value;
    }
}

$closureClass = new ClosuresWithThis;
$closure = $closureClass->retrieveClosure();
echo 'Initial value: ' . $closure() . '<br>';

$closureClass->setValue(75);
echo 'After changing value on class: ';
echo $closure();