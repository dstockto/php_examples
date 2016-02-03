<?php
namespace Example\PHP56;

class Exponentiation
{
    public function superPow($x, $power)
    {
        return $x ** $power;
    }
}

$exp = new Exponentiation();
?>

<h1>Exponentiation Operator</h1>

<p>PHP 5.6 brings a new operator which allows for simple and easy exponentiation, that is, raising a number to the power
of some other number. Using <code>**</code> as in <code>$x ** $y</code> will multiply <code>$x</code> by itself
<code>$y</code> times.</p>

<p>Powers of 2:</p>

<?php for ($i = 0; $i <= 10; $i++) : ?>
    <code><?= $exp->superPow(2, $i); ?></code>
<?php endfor; ?>

<p>The exponentation operator also works on fractional powers. For instance, <code>2 ** .5</code> is another way of
calculating the square root of 2.</p>
<code>
<?= 2 ** .5 ?>
</code>

<p>Finally, just as you can use most operators in a combined assignment, like +=, you can also use **= as a combined
exponentiation with assignment operator. <code>$i **= .5 = sqrt(10) = <?= $i **= .5; $i;  ?></code></p>

