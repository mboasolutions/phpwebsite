<?php

session_start();

require ('filters/guest_filter.php');
require('includes/functions.php');
require('config/database.php');

if ((!empty($_GET['p'])) &&
    is_already_in_use('pseudo', $_GET['p'], 'users')
    && !empty($_GET['token'])) {

    $pseudo = $_GET['p'];
    $token = $_GET['token'];


    //$q = $db->prepare('SELECT email, password, passhash FROM users WHERE pseudo=?');
    $q = $db->prepare('SELECT passhash FROM users WHERE pseudo=?');
    $q->execute([$pseudo]);

    $data = $q->fetch(PDO::FETCH_OBJ);

    //$token_verify = password_hash(($pseudo . $data->email . $data->password), PASSWORD_DEFAULT);

    //echo $_GET['p'].'---'.$_GET['token'].'---'.$data->passhash;

    if ($token == $data->passhash) {

        $q = $db->prepare('UPDATE users SET active="1" WHERE pseudo=?');
        $q->execute([$pseudo]);

        set_flash('Votre compte a ete bel et bien active');

        redirect('login.php');

    } else {

        set_flash('jeton de securite invalide', 'danger');
        redirect('index.php');
    }

} else {
    redirect('index.php');
}
