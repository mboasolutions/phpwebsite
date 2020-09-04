<?php
$pass = "password";
$hash = password_hash($pass, PASSWORD_DEFAULT);
if (password_verify($pass, $hash))
{
echo "Ok, that worked";
}
else
{
echo "WTF?";
}