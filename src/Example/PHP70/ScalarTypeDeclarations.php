<?php

namespace Example\PHP70;


class ScalarTypeDeclarations
{
    public function add(int $x, int $y)
    {
        return $x + $y;
    }

    public function oldAdd($x, $y)
    {
        return $x + $y;
    }
}
?>
<h1>Scalar Type Declarations</h1>
<p>Since PHP 5.0, we've been able to typehint on classes and interfaces in our functions and methods. As of PPH 7.0, we
    can now also typehint on scalar values, like int, string, float, boolean, etc. It provides a nice way to not only
    communicate the expected type of parameters to other developers, even without providing a DocBlock comment, but
    PHP 7.0 will actually ensure that your functions and methods receive the type they asked for.
</p>

<p>Because PHP is a dynamically typed language, it has long been able to transform between values like "2" and the
    integer 2. There are two modes for PHP 7 in regards to these type hints. Strict mode, indicated by putting
    <code>declare(strict_types=1);</code> at the top of the code. Without this, and by default, you will be working in
    "coercive" mode. In either case, functions and methods using scalar type hints will receive only arguments of the
    type they've specified. Additionally, the <code>strict</code> declaration only affects calls made in the files
    where the directive appears.
</p>

<p><strong>Strict Mode</strong> - If you file declares strict mode, any function or method calls to functions or
    methods using scalar type hints must pass in values of the type specified. If not, you'll receive an error.
</p>

<p><strong>Coercive Mode</strong> - Without the strict declaration, scalar type hints that can be converted will be. This
    means a call to a function that requires an integer with a value that is a string number value will be automatically
    and silently converted. If it cannot be converted, you'll receive an error.
</p>

    <?php highlight_string('
<?php
class ScalarTypeDeclarations
{
    public function add(int $x, int $y)
    {
       return $x + $y;
    }
    
    public function oldAdd($x, $y)
    {
        return $x + $y;
    }
}
');
?>

<p>In the code above, we are guaranteed that the $x and $y parameters for <code>add</code> will be integers.</p>

<code>
    <pre>
    $adder = new ScalarTypeDeclarations();
    $result = $adder->add(2, "4");
    var_dump($result); </pre>
</code>

<?php
$adder = new ScalarTypeDeclarations();
$result = $adder->add(2, "4");
var_dump($result);
?>

<p>If we make the same call to the oldAdd without the typehints, we get this:</p>

<code>
    <pre>
    $result = $adder->oldAdd("2 S Bluebird Blvd", "4");
    var_dump($result);</pre>
</code>

<?php
$result = $adder->oldAdd("2 S Bluebird Blvd", "4");
var_dump($result);
?>

<p>Making the address call to the typehinted add results in this (note, it throw a Notice):</p>
<code>
    <pre>
    $result = $adder->oldAdd("2 S Bluebird Blvd", "4");
    var_dump($result);</pre>
</code>

<?php
$result = $adder->add("2 S Bluebird Blvd", "4");
var_dump($result);
?>

<p>If we try to add completely non-numeric values:</p>
<code>
    <pre>
    $result = $adder->add("Banana", "Apple");
    var_dump($result);</pre>
</code>

<code>

<?php
try {
    $result = $adder->add("Banana", "Apple");
    var_dump($result);
} catch (\TypeError $e) {
    echo $e->getMessage();
}
?>
</code>
