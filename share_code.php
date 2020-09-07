<?php

session_start();

require('filters/auth_filter.php');
require('includes/functions.php');
require('config/database.php');
require('includes/constants.php');


if (!empty($_GET['id'])) {

        $data = fin_code_by_id($_GET['id']);

        if ($data) {
            $code = $data->code;
        }else {
            $code = "";
        }

} else {
    $code = "";
}


if (isset($_POST['save'])) {

    // on verifie si tous les champs ont ete remplis
    if (not_empty(['code'])) {

        $code = null;

        extract($_POST);

        $q = $db->prepare('INSERT INTO codes(code)
                                    VALUES(:code)');
        $success = $q->execute([
            'code' => $code
        ]);

        if ($success) {
            $id = $db->lastInsertId();
            redirect('show_code.php?id=' . $id);
        } else {
            set_flash("Erreur lors de l'ajout du code source.Veuillez reessayer svp !.");
            redirect('share_code.php');
        }
    } else {
        redirect('share_code.php');
        $errors[] = "Veuillez svp saisir votre code source!";
        //save_input_data();
    }

} else {

    clear_input_data();
}


require('views/share_code.view.php');

