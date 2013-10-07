<?php
namespace Example\PHP54;

/**
 * As of PHP 5.4, the short echo syntax "<?=" is always available even if
 * php short tags are turned off in the ini.
 */
class ShortEcho
{
    public function returnValue()
    {
        return uniqid('RandomValue_');
    }
}

$shortEcho = new ShortEcho;
?>
<h1>Random stuff: <?= $shortEcho->returnValue(); ?></h1>