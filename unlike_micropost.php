<?php

session_start();

require("includes/init.php");
include('filters/auth_filter.php');

if(!empty($_GET['id'])){

    /*$q = $db->prepare('SELECT id
                                FROM micropost_like 
                                WHERE (user_id=:user_id, micropost_id=:micropost_id)');

    $q->execute([
        'user_id' => get_session('user_id'),
        'micropost_id' => $_GET['id']
    ]);

    $count = $q->rowCount();*/

    if (user_already_like_the_micropost($_GET['id'])){

        unlike_micropost($_GET['id']);

    }

}

redirect('profile.php?id='.get_session('user_id').'#micropost'.$_GET['id']);



