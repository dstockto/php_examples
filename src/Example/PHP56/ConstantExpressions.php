<?php
namespace Example\PHP56;

const ONE = 1;

class ConstantExpressions
{
    const TWO = ONE + ONE;
    const FOUR = 2 * self::TWO;

    public static function addWithThree($myVal, $x = self::FOUR / self::TWO + ONE)
    {
        return $myVal + $x;
    }
}

?>
<h1>Constant Expressions</h1>
<p>In PHP 5.6, constants can be used to define other constants. We've defined a global constant <code>ONE</code> and then
    used it to define a class constant <code>TWO</code> by adding <code>ONE</code> and <code>ONE</code>. Additionally
another class constant of <code>FOUR</code> is defined by multiplying a literal 2 with the class constant
<code>TWO</code>. </p>

<p>Finally, we have a function with a default value equivalent to 3 but calculated using
    <code>FOUR</code> / <code>TWO</code> + <code>ONE</code>.</p>

<p>Calling <code>ConstantExpressions::addWithThree(4);</code> should result in <code>7</code></p>

<p><?= ConstantExpressions::addWithThree(4); ?></p>
