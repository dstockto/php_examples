<?php
namespace Example\PHP56;

class Variadics
{
    public function sum(...$values)
    {
        $sum = 0;
        foreach ($values as $value) {
            $sum += $value;
        }

        return $sum;
    }

    public function average(...$values)
    {
        $count = count($values);

        $sum = $this->sum(...$values);

        return $sum / $count;
    }

    public function countElements(array ...$arrays)
    {
        $sum = 0;

        return array_reduce($arrays,
            function ($currentSum, $input) {
                return $currentSum + count($input);
            },
            $sum);
    }
}

$variadics = new Variadics();
?>
<h1>Variadics</h1>
<p>If there's one single feature that must be chosen to define a PHP version, then for PHP 5.6 it's probably variadics.
    The variadics feature allows you to specify that your function accepts any number of arguments. This could be done
    with earlier versions of PHP by utilizing <code>func_get_args()</code>. However, those additional arguments  would
not appear in the function signature and you could not type hint them. With variadics, you see the <code>...</code> in
the signature and you can provide a name and optionally typehint the variables. PHP will grab all the "extra"
    parameters and convert them into an array. Then you can loop over the additional parameters and do with them what
you need.</p>

<p>In this example, I've got a class which will sum up an number of passed in values. Another method will calculate the
average value of any number of passed in parameters. The final method will accept a series of arrays (showing
typehinting in action) and will return the number of items in the arrays that were sent into the method.</p>

<p>The average method is also using the Argument Unpacking feature to pass the parameters back over to the sum method.</p>

<p>$variadics->sum(1, 2, 3, 4, 5, 6, 7, 8, 9, 10) = <code><?= $variadics->sum(1, 2, 3, 4, 5, 6, 7, 8, 9, 10); ?></code></p>

<p>$variadics->average(10, 20, 30, 40, 50, 60, 70, 80, 90, 100) =
    <code><?= $variadics->average(10, 20, 30, 40, 50, 60, 70, 80, 90, 100); ?></code>
</p>

<p>$variadics->countElements([1, 2], [], [3, 4, 5], [0], [1, 1, 1, 1, 1]) =
    <code><?= $variadics->countElements([1, 2], [], [3, 4, 5], [0], [1, 1, 1, 1, 1]); ?></code>
</p>
