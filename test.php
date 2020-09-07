<?php
session_start();
require('includes/functions.php');
$email = 'mboasolutions@gmail.com';
$pseudo = 'solutions';
$pass = '000000';
$hash = sha1($pass);
$token = sha1($pseudo.$email.$hash);
$token_verify = sha1($pseudo.$email.$hash);

echo var_dump($_SESSION[]).'<br>';
/*echo password_hash($pass, PASSWORD_DEFAULT).'<br>'.password_hash($pass, PASSWORD_DEFAULT).'<br>';

if ($token == $token_verify)
{
echo "Ok, that worked";
}
else
{
echo "WTF?";
}*/

