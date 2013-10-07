<?php
namespace Example;


class ShortcutTernary
{
    /**
     * Sets and returns a value based on whether another value exists using a
     * shortcut ternary. If the value isn't "true" then it uses the default.
     *
     * @return string
     */
    public function getValue()
    {
        $value = null;
        if (isset($_GET['value'])) {
            $value = $_GET['value'];
        }

        return $value ?: 'totally missing.';
    }
}

$shortcut = new ShortcutTernary;

echo "The value is " . $shortcut->getValue();
