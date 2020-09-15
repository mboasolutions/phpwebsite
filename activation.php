<?php

session_start();

require ('includes/init.php');
require ('filters/guest_filter.php');


if ((!empty($_GET['p'])) &&
    is_already_in_use('pseudo', $_GET['p'], 'users')
    && !empty($_GET['token'])) {

    $pseudo = $_GET['p'];
    $token = $_GET['token'];


    //$q = $db->prepare('SELECT email, password, passhash FROM users WHERE pseudo=?');
    $q = $db->prepare('SELECT id, email, password, passhash FROM users WHERE pseudo=?');
    $q->execute([$pseudo]);

    $data = $q->fetch(PDO::FETCH_OBJ);

    //$token_verify = password_hash(($pseudo . $data->email . $data->password), PASSWORD_DEFAULT);

    //echo $_GET['p'].'---'.$_GET['token'].'---'.$data->passhash;

    if ($token == $data->passhash) {

        $q = $db->prepare('UPDATE users SET active="1" WHERE pseudo=?');
        $q->execute([$pseudo]);

        $q = $db->prepare('INSERT INTO friends_relationships(user_id1, user_id2, status) 
                                    VALUES(? , ? ,?)');

        $q->execute([$data->id, $data->id, '2' ]);


        set_flash('Votre compte a ete bel et bien active');

        redirect('login.php');

    } else {

        set_flash('jeton de securite invalide', 'danger');
        redirect('index.php');
    }

} else {
    redirect('index.php');
}
