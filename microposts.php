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


        if (mb_strlen($content) < 3 || mb_strlen($content) > 140) {
            set_flash('Contenu invalide(Minimum 3 caracteres, Maximum 140 caracteres)', 'danger');
        } else {

            create_micropost_for_the_current_user($content);

            set_flash('Votre statut a ete mis a jour');

        }

    }
}

redirect('profile.php?id='.get_session('user_id'));