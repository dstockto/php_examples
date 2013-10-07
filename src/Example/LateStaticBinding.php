<?php
// Late static binding example
namespace Example;

class LateStaticBinding
{
    static $name = __CLASS__;

    public function getNameOldWay()
    {
        return self::$name;
    }

    public function getNameNewWay()
    {
        return static::$name;
    }
}

class TurtleCheese extends LateStaticBinding
{
    static $name = __CLASS__;
}

echo 'LateStaticBinding::$name = ' . LateStaticBinding::$name . "<br>";
echo 'TurtleCheese::$name = ' . TurtleCheese::$name . "<br><br>";

$late = new LateStaticBinding();
$later = new TurtleCheese();
echo 'LateStaticBinding->getNameOldWay() = ' . $late->getNameOldWay() . '<br>';
echo 'LateStaticBinding->getNameNewWay() = ' . $late->getNameNewWay() . '<br><br>';

echo 'TurtleCheese->getNameOldWay() = ' . $later->getNameOldWay() . '<br>';
echo 'TurtleCheese->getNameNewWay() = ' . $later->getNameNewWay() . '<br><br>';