<?php

session_start();

require ('bootstrap/locale.php');
require('filters/auth_filter.php');
require('includes/functions.php');
require('config/database.php');
require('includes/constants.php');

if (!empty($_GET['id'])) {

    $data = fin_code_by_id($_GET['id']);

    if (!$data) {
        redirect('share_code.php');
    }


} else {

    redirect('share_code.php');

}

require('views/show_code.view.php');


