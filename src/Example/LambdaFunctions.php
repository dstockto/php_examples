<?php
namespace Example;


class LambdaFunctions
{
    public $values;

    /**
     * Uses a lambda function to convert strings that are dash separated into camel
     * case
     *
     * @param string $input Dash seperated string
     *
     * @return string
     */
    public function toCamelCase($input)
    {
        $value = preg_replace_callback(
            '#-([a-z])#',
            function ($match) {
                return strtoupper($match[1]);
            },
            $input
        );

        return $value;
    }

    /**
     * Utilizes a closure in array_walk to calculate a total. It uses "use" to
     * indicate it wants to use $total (and change the value) and $discount in a
     * read-only way. The values are added (with a discount) and returned.
     *
     * @param float $discount Discount to be applied to each value
     *
     * @return float
     */
    public function getSum($discount = 0.0)
    {
        $total = 0.00;

        array_walk(
            $this->values,
            function($number) use (&$total, $discount) {
                $total += ($number * (1.0 - $discount));
            }
        );

        return $total;
    }
}


$example = new LambdaFunctions;

echo 'Convert this-is-my-simple-lambda-example to camelCase: ' .
    $example->toCamelCase('this-is-my-simple-lambda-example') . '<br>';

$example->values = range(1, 10);

echo 'Total of numbers 1-10 (no discount) is: ' . $example->getSum() . '<br>';

echo 'Total of numbers 1-10 (10% discount) is: ' . $example->getSum(.10) . '<br>';
