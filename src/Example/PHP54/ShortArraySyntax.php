<?php
namespace Example\PHP54;

class ShortArraySyntax
{
    public $shortArray = [1, 2, 'banana' => 'fruit'];
    public $longArray  = array(1, 2, 'banana' => 'fruit');
}

$value = new ShortArraySyntax();
echo 'Are the short array and long array the same?<br>';
$same = $value->longArray === $value->longArray;
echo $same ? 'true' : 'false';