<?php
namespace Example\PHP54;

class FunctionArrayDeref
{
    public function getValues()
    {
        return array_merge(
          array(1, 2, 3),
          [4, 5, 6]
        );
    }
}

$test = new FunctionArrayDeref;
var_dump($test->getValues());

// The old way
$values = $test->getValues();
echo "Old way echos 3: " . $values[2] . '<br>'; // echo's 3

// The new way
echo "New way echos 1 directly: " . $test->getValues()[0]; // echo's 1