<?php
namespace Example\PHP54;


class ClosureEnhancement
{
    protected $functions;
    private $hiddenValue;

    public function __construct()
    {
        $this->functions            = [];
        $this->functions['doSilly'] = function () {
            return $this->hiddenValue++;
        };
        $this->hiddenValue          = rand(1, 100000);
    }

    public function addFunction($func, $name)
    {
        $f = $func->bindTo($this, $this);
        $this->functions[$name] = $func;
    }

    public function __call($name, $args)
    {
        if (isset($this->functions[$name])) {
            $function = $this->functions[$name];
            return call_user_func_array($function, $args);
        }
        throw new \InvalidArgumentException('Functionality does not exist.');
    }
}


$enhance = new ClosureEnhancement();

$c = function () {
        return $this->hiddenValue;
};

$d = function() {
    return $this->hiddenValue++;
};


$cb = $c->bindTo($enhance, $enhance);
$db = $d->bindTo($enhance, $enhance);

$enhance->addFunction($cb, 'getHidden');
$enhance->addFunction($db, 'getOther');

echo "Doing silly: " . $enhance->doSilly() . '<br>';
echo 'Trying to get other hidden: ' . $enhance->getOther() . '<br>';
echo 'Trying to get hidden: ' . $enhance->getHidden() . '<br>';
