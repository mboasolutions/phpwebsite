<?php

session_start();

require('config/database.php');

// Sauvegarde de la langue courante
$current_language = $_SESSION['locale'];

// Suppression du token en bdd
$q = $db->prepare("DELETE 
                            FROM auth_tokens 
                            WHERE (user_id = ?)");
$q->execute([$_SESSION['user_id']]);

// Reinitialisation de la session
$session_keys_white_list = ['locale'];
$new_session = array_intersect_key($_SESSION, array_flip($session_keys_white_list));
$_SESSION = $new_session;

// Supprimer les cookies et detruire la session
setcookie('auth', '', time()-3600);
//session_destroy();
//$_SESSION = [];

// Restauration de la langue courante et Redirection
//session_start();
//$_SESSION['locale'] = $current_language;
header('Location: login.php' );
