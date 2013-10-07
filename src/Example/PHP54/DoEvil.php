<?php
class A {
    private $a = 12;
    private function getA () {
        return $this->a;
    }
}
class B {
    private $b = 34;
    private function getB () {
        return $this->b;
    }
}
$a = new A();
$b = new B();
$c = function () {
    if (property_exists($this, "a") && method_exists($this, "getA")) {
        $this->a++;
        return $this->a;
    }
    if (property_exists($this, "b") && method_exists($this, "getB")) {
        $this->b++;
        return $this->getB();
    }
};
$ca = $c->bindTo($a, $a);
$cb = $c->bindTo($b, $b);
echo $ca(), "\n"; // => 13
echo $cb(), "\n"; // => 35
?>