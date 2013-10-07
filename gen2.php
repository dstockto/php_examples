<?php
function range_yield($start, $end)
{
    for ($index = $start; $index <= $end; $index++) {
        yield $index => $index;
    }
}

$data = range_yield(0, 1000000);


// output: 0.22 MB of memory used

foreach ($data as $key => $val) {
//echo "key: ".$key." value: ".$val."\n";
}

echo sprintf('%02.2f', (memory_get_usage() / 1048576)) . " MB of memory used\n";
