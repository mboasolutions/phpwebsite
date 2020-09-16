<?php

session_start();

require ('includes/init.php');
require ('filters/auth_filter.php');


if (!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')){

    $id = $_GET['id'];

    if (!if_a_friend_request_has_already_been_sent(get_session('user_id'), $id)){


        $q = $db->prepare('INSERT INTO friends_relationships(user_id1, user_id2) 
                                    VALUES(:user_id1 , :user_id2)');

        $q->execute([
            'user_id1'=>get_session('user_id'),
            'user_id2'=>$id
        ]);


        $q = $db->prepare('INSERT INTO notifications(subject_id, name, user_id) 
                                    VALUES(:subject_id, :name, :user_id)');
        $q->execute([
            'subject_id' => $id,
            'name' => 'friend_request_sent',
            'user_id' => get_session('user_id'),
            ]);


        set_flash("Votre demande d'amitie a ete envoyee avec succes !");
        redirect('profile.php?id='.$id);

    }else{
        set_flash("Cet utilisateur vous a deja envoyee une demande d'amitie !");
        redirect('profile.php?id='.$id);
    }


}else{
    redirect('profile.php?id='.get_session('user_id'));
}