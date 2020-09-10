<?php

if (!isset($_SESSION['user_id']) && !isset($_SESSION['pseudo'])) {

    $_SESSION['forwarding_url'] = $_SERVER['REQUEST_URI'];
    //set_flash('Vous devez etre connnecte pour acceder a cette page', 'danger');
    $_SESSION['notification']['message'] = 'Vous devez etre connnecte pour acceder a cette page';
    $_SESSION['notification']['type'] = 'danger';
    header('Location: login.php' );
    exit();
}
