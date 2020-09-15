<?php

session_start();

require ('includes/init.php');
require ('filters/auth_filter.php');


if (!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')){

    $id = $_GET['id'];

    $q = $db->prepare("UPDATE friends_relationships 
                                SET status = '1'
                                WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2)
                                OR (user_id1 = :user_id2 AND user_id2 = :user_id1)");

    $q->execute([
        'user_id1'=>get_session('user_id'),
        'user_id2'=>$id
    ]);

    set_flash("Votre demande d'amitie a ete accepter avec succes !");
    redirect('profile.php?id='.$id);

}else{
    redirect('profile.php?id='.get_session('user_id'));
}
