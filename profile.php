<?php

session_start();

require ('bootstrap/locale.php');
require ('filters/auth_filter.php');
require ('config/database.php');
require ('includes/functions.php');
require ('includes/constants.php');


if (!empty($_GET['id'])){
    // recuperer les infos sur l'utilisateur en base de donnees
   global $user;
   $user = fin_user_by_id($_GET['id']);
    if (!$user){
        redirect('index.php');
    }
}else{
    redirect('profile.php?id='.get_session('user_id'));
}


require ('views/profile.view.php');

