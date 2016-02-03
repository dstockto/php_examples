<?php
namespace Example\Funkadelic {
    function doMath($x, $y, $operator)
    {
        switch ($operator) {
            case '+':
                return $x + $y;
            case '-':
                return $x - $y;
            case '*':
                return $x * $y;
            case '/':
                return $x / $y;
        }
    }
}

namespace Example\PHP56 {
    use function Example\Funkadelic\doMath as magicCalculator;

    class UseFunction
    {
        public function __invoke($x, $y, $operator)
        {
            return magicCalculator($x, $y, $operator);
        }
    }
?>
<h1>Use Function</h1>
<p>Similar to the use constant example, in PHP 5.6 we can use functions as well. For this example, I've built a
function that takes two numbers and an operator, a math symbol, and return the value resulting from applying that
operator to the two numbers provided. In my \Example\PHP56\UseFunction class, I'm using <code>use</code> to take
advantage of that function and aliasing it to the name <code>magicCalculator</code>.</p>

<?php

    $use = new UseFunction();
    $x = 3;
    $y = 4;
    $operators = [
        '+',
        '-',
        '*',
        '/',
    ];

    foreach ($operators as $operator) :
        ?>
     <p><?= $x ?> <?= $operator ?> <?= $y ?> = <?= $use($x, $y, $operator); ?></p>
<?php
    endforeach;
}

