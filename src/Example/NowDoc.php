<?php
namespace Example;

class NowDoc
{
    public function getHereDoc()
    {
        $value = 'Heredoc works like a double quoted string.';

        return <<< PHP_EOL
    I can output a multi-line string here and include variables
    because:
    $value
PHP_EOL;
    }

    public function getNowDoc()
    {
        $value = 'Nowdoc works like a big single-quoted string.';

        return <<< 'NOWDOCSTRING'
        I can output multi-line strings with a NOWDOC but when I put
        in $value it's just there. It doesn't get transformed
NOWDOCSTRING;
    }
}

$thing = new NowDoc;
echo '<pre>';
echo $thing->getHereDoc() . '<br><br>';
echo $thing->getNowDoc() . '<br>';
echo '</pre>';
