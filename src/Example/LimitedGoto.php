<?php
namespace Example;


class LimitedGoto
{
}

// Shows how goto can be used. You can jump around in normal flow, but cannot jump
// into a loop

$i = 0;
while (true) {
    echo $i . '<br>';

    if ($i == 15) {
        goto end;
    }

    $i++;
}

echo 'If you see this, bad things happened.';

end:
echo 'We got all the way to 15.<br>';