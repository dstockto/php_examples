<?php
namespace Example\PHP55;

/**
 * PHP 5.5 allows you to use expressions within "empty". Previously you'd have to
 * set the evaluation of an expression into a variable and then run empty on it.
 */
class EmptyExpressions
{
    public function getEmpty($value = true)
    {
        if ($value) {
            return;
        }

        return 'Sammiches';
    }
}

$test = new EmptyExpressions;

// old way, set value into a variable first
$value = $test->getEmpty();
var_dump(empty($value)); // true

// new way, use an expression
var_dump(empty($test->getEmpty()));

