<?php

session_start();

require ('bootstrap/locale.php');
require ('filters/auth_filter.php');
require ('config/database.php');
require ('includes/functions.php');
require ('includes/constants.php');


if (!empty($_GET['id'])){
    // recuperer les infos sur l'utilisateur en base de donnees
   global $user;
   $user = fin_user_by_id($_GET['id']);
    if (!$user){
        redirect('index.php');
    }
}else{
    redirect('profile.php?id='.get_session('user_id'));
}


// on verifie si le formulaire a ete soumis
if (isset($_POST['update'])) {

    $errors=[];

    // on verifie si tous les champs ont ete remplis
    if (not_empty(['name','city', 'country', 'sex', 'bio'])) {

        /*$name=null;
        $city=null;
        $country=null;
        $sex=null;
        $twitter=null;
        $github=null;
        $available_for_hiring=null;
        $bio=null;*/

        $name = $_POST['name'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $sex = $_POST['sex'];
        $bio = $_POST['bio'];
        $twitter = $_POST['twitter'];
        $github = $_POST['github'];
        $available_for_hiring = !empty($_POST['available_for_hiring']) ? '1' : '0';
        $id = get_session('user_id');

        extract($_POST);
        /*echo get_session('user_id').'<br>';
        echo '<h1>'.$available_for_hiring.'</h1>'.'<br>';
        echo $sex;*/
        $q = $db->prepare('UPDATE users
                                    SET name=:name, city=:city, country=:country,
                                      sex=:sex, twitter=:twitter, github=:github,
                                      available_for_hiring=:available_for_hiring, bio=:bio
                                    WHERE id=:id');

        $q->execute([
            'name' => $name,
            'city' => $city,
            'country' => $country,
            'sex' => $sex,
            'twitter' => $twitter,
            'github' => $github,
            'available_for_hiring' => $available_for_hiring,
            'bio' => $bio,
            'id' => get_session('user_id'),
        ]);

        set_flash('Felicitations votre profil a ete mis a jour!');
        redirect('profile.php?id='.get_session('user_id'));

    }else {

        $errors[] = "Veuillez svp remplir tous les champs marques d'un (*)!";
        save_input_data();
    }

}else{

    clear_input_data();
}


require ('views/profile.view.php');

