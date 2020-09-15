<?php

    $authorized_languages = ['fr', 'en'];

    if (!empty($_GET['lang']) && in_array($_GET['lang'], $authorized_languages)){
        $_SESSION['locale'] = $_GET['lang'];
    }else{
        if (empty($_SESSION['locale'])){
            $_SESSION['locale'] = $authorized_languages[0];
        }
    }


    //require ('locales/menu.php');
    //require ('locales/long_text.php');

    // Inclure all local files
    $locale_files = glob('locales/*');
    foreach ($locale_files as $locale_file){
        require $locale_file;
    }
