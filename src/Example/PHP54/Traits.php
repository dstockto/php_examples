<?php
namespace Example\PHP54;

/**
 * Adds a getName method to classes that use the trait. Retrieves the $name property
 */
trait NameGetter
{
    public function getName()
    {
        return $this->name;
    }
}

/**
 * Retrieve the $name property and returns is reversed - adding a getName method
 *
 * @package Example\PHP54
 */
trait ReverseGetter
{
    public function getName()
    {
        return strrev($this->name);
    }
}

trait AnotherGetter
{
    public function getName()
    {
        return 'Ha, not your name!';
    }
}

/**
 * Basic class with a name property that uses the NameGetter trait.
 */
class Traits
{
    use NameGetter;

    protected $name = __CLASS__;
}

/**
 * Uses NameGetter and ReverseGetter, but calls the getName from NameGetter and
 * aliases the getName from ReverseGetter to be called "backwards"
 */
class SeparateClass extends Traits
{
    use NameGetter, ReverseGetter, AnotherGetter {
        NameGetter::getName insteadof ReverseGetter, AnotherGetter;
        ReverseGetter::getName as backwards;
        AnotherGetter::getName as foobar;
    }

    protected $name = __CLASS__;
}


$tr = new Traits;
echo $tr->getName() . '<br>';
//
$sc = new SeparateClass;
echo $sc->getName() . '<br>';
//
echo $sc->backwards() . '<br>';

echo $sc->foobar();
