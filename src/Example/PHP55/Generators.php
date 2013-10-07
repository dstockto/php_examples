<?php
namespace Example\PHP55;

/**
 * PHP 5.5 introduces generators. Generators are essentially pausable functions or
 * iterators that utilize the "yield" keyword instead of return. They can be used
 * to generate iterators that use significantly less memory than traditional loops
 * over full data structures.
 */
class Generators
{
    /**
     * Returns a generator function
     *
     * @return callable
     */
    public function getBasicIterator()
    {
        return function() {
            yield 'Personal';
            yield 'Home';
            yield 'Page';
        };
    }

    /**
     * Is a generator function.
     *
     * @param int $start Start of loop
     * @param itn $end   End of loop
     * @param int $step  Step for loop
     *
     * @return \Generator
     */
    public function xRangeGenerator($start, $end, $step = 1)
    {
        $counter = $start;

        if ($start > $end) {
            return; // Iterator is backwards so don't do it.
        }

        while ($counter <= $end) {
            yield $counter;
            $counter += $step;
        }

        return;
    }
}

echo '<h1>Generators</h1>';
echo '<h2>Basic</h2>';
$gen = new Generators;
$basic = $gen->getBasicIterator();
foreach ($basic() as $key=>$word) {
    echo $key . '=>' . $word . '<br>';
}

echo '<br><br>';

$evenCounter = $gen->xRangeGenerator(0, 10, 2);
foreach ($evenCounter as $number) {
    echo "Number: $number<br>";
}

echo '<br><br>';

// Looping a generator and manually advancing another in the loop
$evenCounter = $gen->xRangeGenerator(0, 10, 2);
$oddCounter =  $gen->xRangeGenerator(1, 11, 2);
foreach ($evenCounter as $number) {
    echo "Number: $number<br>";
    echo "Odd number: " . $oddCounter->current() . '<br>';
    $oddCounter->next();
}
