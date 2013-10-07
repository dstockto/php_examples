<?php
function gen3($start, $end) {
    $i = $start;

    while ($start < $end) {
        yield $i++;
    }
}

$gen1 = gen3(0, 10);

foreach ($gen1 as $value) {
    echo $value . "\n";
    if ($value == 3) {
        $gen2 = clone $gen1;
    }
}

echo "Second generator: \n\n";

foreach ($gen2 as $value) {
    echo $value . "\n";
}
