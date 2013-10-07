<?php
namespace Example\PHP55;

/**
 * PHP 5.5 allows you to extract inner arrays in one shot using a list inside the
 * foreach
 */
class ListInForeach {
    public function getValues()
    {
        return [
                'fruit' => ['apple', 'banana'],
                'animal' => ['cat', 'dog'],
                'mineral' => ['gneiss', 'granite'],
                'vegetable' => ['carrot', 'radish']
        ];
    }
}

$test = new ListInForeach;
foreach ($test->getValues() as $key=>list($first, $second)) {
    echo "Got {$key}s: $first & $second<br>";
}