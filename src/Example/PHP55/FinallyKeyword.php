<?php
namespace Example\PHP55;

/**
 * The finally keyword allows you to run some code after a try..catch regardless of
 * whether an exception was thrown or not.
 */
class FinallyKeyword
{
    public function throwException($value)
    {
        if ($value) {
            echo 'Throwing exception.<br>';
            throw new \Exception('Exception thrown.');
        }
    }
}

$thrower = new FinallyKeyword;

echo "Running thrower and throwing exception.<br><br>";

try {
    echo 'Running code<br>';
    $thrower->throwException(true);
    echo 'This will not appear if an exception was thrown.<br>';
} catch (\Exception $e) {
    echo "Caught the exception.<br>";
} finally {
    echo "Running the finally stuff.<br>";
}

echo "<br>Running same code without an exception.<br><br>";

try {
    echo 'Running code<br>';
    $thrower->throwException(false);
    echo 'This will not appear if an exception was thrown.<br>';
} catch (\Exception $e) {
    echo "Caught the exception.<br>";
} finally {
    echo "Running the finally stuff.<br>";
}