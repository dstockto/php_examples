<?php
namespace Example\PHP54;

/**
 * PHP 5.4 allows for binary numbers to be specified by prefixing with 0b
 */
class BinaryNumbers
{
    /**
     * The following values are all equivalent.
     */
    public $binaryValue = 0b01010101;
    public $octalValue = 0125;
    public $hexValue = 0x55;
    public $decimalValue = 85;
}

$binary = new BinaryNumbers();
echo 'Binary b01010101 = ' . $binary->binaryValue . '<br>';
echo 'Octal 0125 = ' . $binary->octalValue . '<br>';
echo 'Hexidecimal 0x55 = ' . $binary->hexValue . '<br>';
echo 'Decimal 85 = ' . $binary->decimalValue . '<br>';