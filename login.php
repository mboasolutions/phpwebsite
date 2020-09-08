<?php

session_start();

require ('bootstrap/locale.php');
require ('filters/guest_filter.php');
require('includes/functions.php');
require('config/database.php');
require('includes/constants.php');

// on verifie si le formulaire a ete soumis
if (isset($_POST['login'])) {

    // on verifie si tous les champs ont ete remplis
    if (not_empty(['identifiant','password'])) {

        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];

        extract($_POST);

        $q = $db->prepare("SELECT id, pseudo, email, password FROM users 
                                    WHERE (pseudo=:identifiant OR email=:identifiant)
                                    AND active='1'");

        $q->execute([
            'identifiant'=>$identifiant,
            //'password'=>password_hash(($password), PASSWORD_DEFAULT)
        ]);

        $user = $q->fetch(PDO::FETCH_OBJ);

        $userHasBeenFound = $q->rowCount();

        /*echo '<p>'.$data['id'].'-----------'.password_hash(($password), PASSWORD_DEFAULT).'<br></p>';

        echo $data['password'];

        if (password_verify($password, $data['password'])) {
            echo '<h3> TRUE </h3>';
        }else{
            echo '<h3> FALSE </h3>';
        }*/
        if ($userHasBeenFound && password_verify($password, $user->password)) {

            $_SESSION['user_id'] = $user->id;
            $_SESSION['pseudo'] = $user->pseudo;
            $_SESSION['email'] = $user->email;

            redirect('profile.php?id='.$user->id);
        } else {
            set_flash('Combinaison identifiant / Mot de passe incorrect', 'danger');
            save_input_data();
        }

    }else {

        $errors[] = "Veuillez svp remplir tous les champs!";
        save_input_data();
    }

}else{

    clear_input_data();
}

require('views/login.view.php');
