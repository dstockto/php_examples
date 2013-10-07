<?php
namespace Example\PHP55;


use Example\PHP55\ScalarClassName as Refrigerator;

/**
 * PHP 5.5 allows us to retrieve the class name in a scalar way using ::class
 * even if the class is aliased.
 */
class ScalarClassName
{

}


echo "The name of the class is " . ScalarClassName::class . '<br>';

echo 'The real name of the Refrigerator class is ' . Refrigerator::class;