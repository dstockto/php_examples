<?php
// Everything within this file is in the "Example" namespace.
namespace Example;

// Use "use" to allow for shorter names within a file
// Now you can use "ThingaMaJig" instead of \OtherNameSpace\ThingaMaJig
use \OtherNameSpace\ThingaMaJig;

// Use "as" to alias classes to other names. In this case, there are two "ThingaMaJig"
// classes, and we'd like to use short names for each
use \SecondaryNamespace\ThingaMaJig as Doohickey;


class Namespaces
{
    public function doSomething()
    {
        // Since we have a use above, we can make a ThingaMaJig by referring to it
        // as ThingaMaJig;
        echo new ThingaMaJig;

        // Or we can still do it the long way, but there are advantages to using
        // "use"
        echo new \OtherNameSpace\ThingaMaJig;

        // We can use stuff within the "Example" namespace with a short name
        echo new DateTime();

        // To use built-in classes within a namespace we need to prefix with \
        echo (new \DateTime())->format('Y-m-d H:i:s') . "<br>";

        // You can even override built-in functions with namespace ones.
        var_dump(is_null(null));

        // This is a \SecondaryNamespace\ThingaMaJig but we're referring to it as
        // a DooHickey.
        echo new Doohickey;
    }
}

function is_null($value)
{
    if (\is_null($value)) {
        return 'dragon army';
    }
    return 'salamander';
}

$namespaces = new Namespaces;
$namespaces->doSomething();