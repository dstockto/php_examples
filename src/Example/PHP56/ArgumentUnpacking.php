<?php
namespace Example\PHP56;

class ArgumentUnpacking
{
    /**
     * Multiply four numbers together and return the result
     *
     * @param integer $a
     * @param integer $b
     * @param integer $c
     * @param integer $d
     *
     * @return integer
     */
    public function multiplyAll($a, $b, $c, $d)
    {
        return $a * $b * $c * $d;
    }

}

// First we get an array of values that we wish to use as function arguments
$arguments = [1, 2, 3, 4];

// This function takes four parameters and multiplies them.
$unpacker = new ArgumentUnpacking();
?>
<h1>Argument Unpacking</h1>
<p>Argument unpacking takes an array of arguments and converts it to individual arguments.</p>
<p>We'll take this:</p>
<code>[1, 2, 3, 4]</code>
<p>... and pass it into a function that multiplies four variables together, but using argument unpacking,
which is done by preceding the argument with three dots.</p>

<code style="display:block; white-space: pre">
    function multiplyAll($a, $b, $c, $d)
    {
        return $a * $b * $c * $d;
    }

</code>

<p>If we get 24 in the next box, then argument unpacking has worked.</p>

<p>The answer is <code class="lead"><?= $unpacker->multiplyAll(... $arguments); ?></code> .</p>
