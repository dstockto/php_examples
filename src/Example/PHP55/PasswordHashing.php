<?php
namespace Example\PHP55;

/**
 * PHP 5.5 provides simple, easy and secure password handling with bcrypt and
 * automatic random salting. The values below are all hashes for the password
 * 'password' except the 3rd which is 'passworda'. You'll notice that every hash
 * is significantly different from the other and that password_verify can determine
 * if the password matches the hash.
 *
 * Reloading the sample will result in all new hashes.
 */
class PasswordHashing
{
    protected $password = 'password';

    public function getPassword()
    {
        return $this->password;
    }

    public function createPasswordArray()
    {
        $password = $this->getPassword();
        return [
            password_hash($password, PASSWORD_DEFAULT),
            password_hash($password, PASSWORD_DEFAULT),
            password_hash($password . 'a', PASSWORD_DEFAULT),
            password_hash($password, PASSWORD_DEFAULT),
            password_hash($password, PASSWORD_DEFAULT),
            password_hash($password, PASSWORD_DEFAULT),
        ];
    }
}

$passwordHasher = new PasswordHashing;
$password       = $passwordHasher->getPassword();
$passwordArray  = $passwordHasher->createPasswordArray();
var_dump($passwordArray);

// Check passwords:
foreach ($passwordArray as $passwordValue) {
    echo "Password $passwordValue matches $password: ";
    echo (password_verify($password, $passwordValue)) ? 'Yes' : 'No';
    echo '<br>';
}