<?php

session_start();

require ('includes/init.php');
require('filters/auth_filter.php');


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
            $fullUrl = WEBSITE_URL.'/show_code.php?id='.$id;
            create_micropost_for_the_current_user('Je viens de publier un nouveau code source : '.$fullUrl);
            redirect('show_code.php?id=' . $id);
        } else {
            set_flash("Erreur lors de l'ajout du code source.Veuillez reessayer svp !.");
            redirect('share_code.php');
        }
    } else {
        redirect('share_code.php');

    }

}


require('views/share_code.view.php');

