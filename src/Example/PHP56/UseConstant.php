<?php
namespace Mathidy\DooDa {
    const MY_E = '2.718281828459045';
    const MY_PI = \M_PI;

}

namespace Example\PHP56 {
    use const Mathidy\DooDa\MY_E as E;
    use const Mathidy\DooDa\MY_PI;

    class UseConstant
    {
        public static function getConstValue($name)
        {
            if ($name == 'E') {
                return E;
            }
            if ($name == 'PI') {
                return MY_PI;
            }
        }
    }
?>
<h1>Use Constant</h1>

<p>We've long been able to <em>use</em> classes. In PHP 5.6 we can now use constants from other namespaces. In the
code, I've defined a few constants in the <code>\Mathidy\DooDa</code> namespace. Then in the example, I'm using
the <code>\Mathidy\DooDa\MY_E</code> constant in the class as <code>E</code> and the <code>\Mathidy\DooDa\MY_PI</code>
constant as <code>MY_PI</code>. The values of these constants are seen below:</p>

<p>E: <?= \Example\PHP56\UseConstant::getConstValue('E'); ?></p>
<p>PI: <?= \Example\PHP56\UseConstant::getConstValue('PI'); ?></p>
<?php
}
