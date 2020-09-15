<?php

session_start();

require ('includes/init.php');
require ('filters/auth_filter.php');


if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')){
    // recuperer les infos sur l'utilisateur en base de donnees
    //global $user;
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
        //$targetFolder = '/uploads/'.$_SESSION['user_id'];
        //$randon_file_name = md5(uniqid(rand()));

        $file_name = $_FILES['avatar']['name'];
        $file_extension = strrchr($file_name, ".");
        $extentions_autorisees = array('.jpg', '.png', '.tiff', '.gif', '.bmp');
        $file_tmp_name = $_FILES['avatar']['tmp_name'];
        //$file_destination = 'uploads/'.$file_name;

        /*$targetPath = $_SERVER['DOCUMENT_ROOT'].$targetFolder;
        if (file_exists($targetPath)){
            mkdir($targetPath, 0755, true);
        }
        $randomFileName = md5(uniqid(rand())).$file_extension;

        $file_destination = rtrim($targetPath, '/').'/'.$randomFileName;
      */
        $file_destination = 'uploads/'.$_SESSION['user_id'].$file_extension;
        /*******************************************/
        /*$tempFile = $_FILES['avatar']['tmp_name'];
        $targetPath = $_SERVER['DOCUMENT_ROOT'].$targetFolder;

        if (file_exists($targetPath)){
            mkdir($targetPath, 0755, true);
        }

        $fileType = array('jpg', 'png', 'tiff', 'gif', 'bmp');
        $fileParts = pathinfo($_FILES['avatar']['name']);

        $randomFileName = md5(uniqid(rand())).'.'.$fileParts['extension'];

        $targetFile = rtrim($targetPath, '/').'/'.$randomFileName;
       */

        /*************************************************************/

        //$_FILES['avatar']['error'] == 0
        //$file_extension, $extentions_autorisees
        //move_uploaded_file($file_tmp_name, $file_destination)
        if (in_array($file_extension, $extentions_autorisees)){
            if (move_uploaded_file($file_tmp_name, $file_destination)){


                //echo $file_name.'*****'.$file_extension.'*****'.$file_tmp_name.'*****'.$file_destination;

                $q = $db->prepare('UPDATE users
                                    SET name=:name, city=:city, country=:country,
                                      sex=:sex, twitter=:twitter, github=:github,
                                      available_for_hiring=:available_for_hiring, bio=:bio, avatar=:avatar
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
                    'avatar' => $file_destination
                ]);

                $_SESSION['avatar'] = $file_destination;
                set_flash('Felicitations votre profil a ete mis a jour!');
                redirect('profile.php?id='.get_session('user_id'));


            }else{

                set_flash("Une erreur est survenue lors de l'envoi du fichier !");
                //echo "Une erreur est survenue lors de l'envoi du fichier !";
            }


        }else{
            set_flash('Seuls les fichiers images sont autorisees ...');
            //echo 'Seuls les fichiers images sont autorisees ...';
        }


    }else {

        $errors[] = "Veuillez svp remplir tous les champs marques d'un (*)!";
        save_input_data();
    }

}else{

    clear_input_data();
}


require ('views/edit_user.view.php');