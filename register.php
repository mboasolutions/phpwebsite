<?php

session_start();

require('includes/functions.php');
require('config/database.php');
require('includes/constants.php');

// on verifie si le formulaire a ete soumis
if (isset($_POST['register'])) {

    // on verifie si tous les champs ont ete remplis
    if (not_empty(['name', 'pseudo', 'email', 'password', 'password_confirm'])) {

        $name = $_POST['name'];
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $errors = [];

        extract($_POST);


        if (mb_strlen($pseudo) < 3) {
            $errors[] = "Pseudo trop court! (Minimum 3 caracteres)";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide!";
        }


        if (mb_strlen($password) < 6) {
            $errors[] = "Mot de passe trop court! (Minimum 6 caracteres)";
        } else {

            if (mb_strlen($password_confirm) < mb_strlen($password) || $password != $password_confirm) {
                $errors[] = "les deux Mots de passe ne concordent pas!";
            }
        }

        if (is_already_in_use('pseudo', $pseudo, 'users')) {
            $errors[] = "Pseudo deja utiliser!";
        }

        if (is_already_in_use('email', $email, 'users')) {
            $errors[] = "Adresse E-mail deja utiliser!";
        }

        //echo $name.$email.$password.'----'.$pseudo;

        if (count($errors) == 0) {
            // envoi d'un email d'activation
            $to = $email;
            $subject = WEBSITE_NAME . " - ACTIVATION DE COMPTE";
            $password = password_hash($password, PASSWORD_DEFAULT);
            $token = password_hash(($pseudo . $email . $password), PASSWORD_DEFAULT);

            ob_start();
            require('templates/emails/activation.tmpl.php');
            $content = ob_get_clean();

            //$headers = 'MIME-Version : 1.0'."\r\n";
            //$headers .= 'Content_type: text/html; charset=iso-8859-1'."\r\n";
            $headers = 'From: mboasolutions@gmail.com' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                'Content-type: text/html; charset=utf-8';
            mail($to, $subject, $content, $headers);

            // informer l'utilisateur pour qu'il verifie son adresse email
            set_flash("Mail d'activation envoye!", 'success');

            $q = $db->prepare('INSERT INTO users(name, pseudo, email, password, passhash)
                              VALUES(:name, :pseudo, :email, :password, :passhash)');
            $q->execute([
                'name'=>$name,
                'pseudo'=>$pseudo,
                'email'=>$email,
                'password'=>$password,
                'passhash'=>$token
            ]);



            redirect('index.php');
        } else {

            save_input_data();
        }

    } else {

        $errors[] = "Veuillez svp remplir tous les champs!";
        save_input_data();
    }

}else{

    clear_input_data();
}

require('views/register.view.php');
