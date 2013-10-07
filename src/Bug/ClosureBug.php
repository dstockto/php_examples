<?php
class ClosureBug
{
    private $value = 42;
    private $functions = [];

    public function addFunction($name, Closure $function)
    {
        $this->functions[$name] = $function->bindTo($this, $this);
    }

    public function __call($name, $args)
    {
        return call_user_func_array($this->functions[$name], $args);
    }
}

$c = function () {
    return $this->value;
};

$bug = new ClosureBug;
$bug->addFunction('bug', $c);

echo $bug->bug();
