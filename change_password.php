<?php

session_start();

require ('includes/init.php');
require ('filters/auth_filter.php');


// on verifie si le formulaire a ete soumis
if (isset($_POST['change_password'])) {

    $errors=[];

    // on verifie si tous les champs ont ete remplis
    if (not_empty(['current_password','new_password', 'new_password_confirm'])) {


        $current_password = null;
        $new_password = null;
        $new_password_confirm = null;


        extract($_POST);


        if (mb_strlen($new_password) < 6) {
            $errors[] = "Mot de passe trop court! (Minimum 6 caracteres)";
        } else {

            if (mb_strlen($new_password_confirm) < mb_strlen($new_password) || $new_password != $new_password_confirm) {
                $errors[] = "les deux Mots de passe ne concordent pas!";
            }
        }


        if (count($errors) == 0) {

            $q = $db->prepare("SELECT password as hashed_password FROM users 
                                        WHERE id=:id AND active = '1' ");
            $q->execute([
                'id'=>get_session('user_id')
            ]);

            $user = $q->fetch(PDO::FETCH_OBJ);

            if ($user && password_verify($current_password, $user->hashed_password)){

                $q = $db->prepare('UPDATE users
                                    SET password=:password
                                    WHERE id=:id');

                $q->execute([
                    'password' => password_hash($new_password, PASSWORD_DEFAULT),
                    'id' => get_session('user_id'),
                ]);


                //$_SESSION['avatar'] = $file_destination;
                set_flash('Felicitations votre mot de passe a ete mis a jour!');
                redirect('profile.php?id=' . get_session('user_id'));


            }else{

                save_input_data();
                $errors[] = "Le mot de passe actuel est incorrect!";
            }

        }

    }else{

        save_input_data();
        $errors[] = "Veuillez svp remplir tous les champs!";
    }


}else{
    clear_input_data();
}


require ('views/change_password.view.php');