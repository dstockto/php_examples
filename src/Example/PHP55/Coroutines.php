<?php
namespace Example\PHP55;

class Coroutines
{
    public function processString()
    {
        while(true) {
            $data = yield;

            echo strrev(strtoupper($data)) . '<br>';

            $data = yield;

            echo strtoupper($data) . '<br>';

            $data = yield;

            echo strrev($data) . '<br>';
        }
    }
}
?>
<h1>Coroutines</h1>
<p>The yield keyword can be used to send values into a function or method.</p>
<?php
$test = new Coroutines;
$coroutine = $test->processString();
$values = ['apple', 'banana', 'pear', 'grapes', 'starburst'];

foreach($values as $value) {
    $coroutine->send($value);
}