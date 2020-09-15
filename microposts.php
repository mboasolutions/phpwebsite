<?php
session_start();

require ('includes/init.php');
require ('filters/auth_filter.php');

//require('includes/constants.php');



if (isset($_POST['publish'])) {

    // on verifie si tous les champs ont ete remplis
    if (not_empty(['content'])) {

        $content = null;

        extract($_POST);


        if (mb_strlen($content) < 3) {
            $errors[] = "Cette chaîne est trop courte. Elle doit avoir au minimum 3 caractères.";
        }

        if (mb_strlen($content) > 140){
            $errors[] = "Cette chaîne est trop longue. Elle doit avoir au maximum 140 caractères.";
        }



        $q = $db->prepare("INSERT INTO microposts(content, user_id, created_at)
                                    VALUES(:content, :user_id, NOW())");

        $q->execute([
            'content'=>$content,
            'user_id'=>get_session('user_id')
        ]);

        set_flash('Votre statut a ete mis a jour');

    }else{

        set_flash('Veuillez entrer votre statut svp !');
    }

}

redirect('profile.php?id='.get_session('user_id'));