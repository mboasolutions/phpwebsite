<?php

session_start();

require ('includes/init.php');
require ('filters/auth_filter.php');



if (!empty($_GET['id'])){
    // recuperer les infos sur l'utilisateur en base de donnees
   //global $user;
   //global $microposts;

   $user = fin_user_by_id($_GET['id']);
    if (!$user){
        redirect('index.php');
    }else{

        $q = $db->prepare("SELECT content, created_at 
                                    FROM microposts 
                                    WHERE user_id = :user_id 
                                    ORDER BY created_at 
                                    DESC ");
        $q->execute([
            'user_id' => $_GET['id']
        ]);

        $microposts = $q->fetchAll(PDO::FETCH_OBJ);

       /* //$q->closeCursor();
        var_dump($microposts);
        die();*/

    }

}else{
    redirect('profile.php?id='.get_session('user_id'));
}


require ('views/profile.view.php');

