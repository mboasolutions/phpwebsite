<?php

session_start();

require ('includes/init.php');
require('filters/auth_filter.php');



if (!empty($_GET['id'])) {

    $data = fin_code_by_id($_GET['id']);

    if (!$data) {
        redirect('share_code.php');
    }


} else {

    redirect('share_code.php');

}

require('views/show_code.view.php');


