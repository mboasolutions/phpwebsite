<?php

    $menu = [
        'accueil' => ['fr' => 'Accueil', 'en' => 'Home'],
        'connexion' => ['fr' => 'Connexion', 'en' => 'Log in'],
        'inscription' => ['fr' => 'Inscription', 'en' => 'Register'],
        'mon-profil' => ['fr' => 'Mon profil', 'en' => 'My Account'],
        'editer-profil' => ['fr' => 'Editer mon profil', 'en' => 'Edit my Account'],
        'share-code' => ['fr' => 'Partager', 'en' => 'Share'],
        'deconnexion' => ['fr' => 'Deconnexion', 'en' => 'Log out'],
        'francais' => ['fr' => 'Fancais', 'en' => 'French'],
        'anglais' => ['fr' => 'Anglais', 'en' => 'English'],
        'langue' => ['fr' => 'Langue', 'en' => 'Language'],
        'liste-user' => ['fr' => 'Liste des utilisateurs', 'en' => 'Users list']
    ];



    //<a href="?lang=fr">Francais</a>
    //<a href="?lang=en">Anglais</a>

    // la fonction get_current_locale() impose l'ordre d'inclusion de fichiers, c'est pourquoi on utilise $_SESSION['locale']
    //die($menu['accueil'][get_current_locale()]);
    //die($menu['accueil'][$_SESSION['locale']]);