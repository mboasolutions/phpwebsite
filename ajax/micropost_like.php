<?php

session_start();

require('../config/database.php');
require('../includes/functions.php');

$action = null;
$micropost_id = null;

extract($_POST);


if ($action == 'like') {
    if (!user_already_like_the_micropost($micropost_id)) {

        like_micropost($micropost_id);
    }

} else {

    if (user_already_like_the_micropost($micropost_id)) {

        unlike_micropost($micropost_id);

    }


}

echo get_likers_text($micropost_id);