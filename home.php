<?php
session_start();

require ('includes/init.php');
require ('filters/auth_filter.php');

   /* global $db;
$id = '50';

$q = $db->prepare("SELECT user_id1, user_id2, status
                                        FROM friends_relationships
                                        WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2)
                                        OR (user_id1 = :user_id2 AND user_id2 = :user_id1)");
$q->execute([
    'user_id1'=> get_session('user_id'),
    'user_id2'=> $id
]);

$data = $q->fetch(PDO::FETCH_OBJ);
//relation_link_to_display($id);
/*var_dump($data);
die($data->user_id1.'---'.$data->user_id2.'---'.$data->status);*/

/*if ($data) {
    if ($data->user_id1 != $id ){
        // Lien pour ajouter un ami
        echo 'add_relation_link';
    }

}*/

require ('views/home.view.php');
