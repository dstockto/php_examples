<?php
namespace Example\PHP56;

class DebugInfo
{
    private $public;
    private $secret;

    /**
     * DebugInfo constructor.
     */
    public function __construct()
    {
        $this->secret = uniqid('super_secret_password_');
        $this->public = 'Some Value We All See';
    }

    public function __debugInfo()
    {
        return [
            'secret' => 'Top Secret',
            'public' => $this->public,
        ];
    }

    public function getSecret()
    {
        return $this->secret;
    }
}

$debugClass = new DebugInfo();
?>
<h1>__debugInfo</h1>
<p>In PHP we can declare propertiese as <code>private</code> or <code>protected</code> if the value should be internal
to the class. However, PHP functions like <code>var_dump</code> or <code>print_r</code> will happily display all of the
secret things. In this example, I've created a class which generates a secret code which is essentially unguesssable.
It also contains some public information that is not sensitive. The secret value is <code><?= $debugClass->getSecret() ?>
</code>.</p>

<p>Notice below, however, when I <code>var_dump</code> the class, you will not see the secret value above. This is
because the <code>__debugInfo</code> magic method has been defined.</p>

<p><?php var_dump($debugClass); ?></p>

<p>The magic method will also affect the output of print_r.</p>
<pre><?php print_r($debugClass); ?></pre>
