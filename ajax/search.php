<?php

session_start();

require('../config/database.php');
require('../includes/functions.php');

$query = null;

extract($_POST);


$q = $db->prepare('SELECT id, name, email, pseudo, avatar
                            FROM users 
                            WHERE name LIKE :query OR email LIKE :query OR pseudo LIKE :query
                            LIMIT 5');
$q->execute([
    'query' => '%' . $query . '%'
]);

$users = $q->fetchAll(PDO::FETCH_OBJ);

//echo $query;

if (count($users) > 0){
    foreach ($users as $user) {
    ?>
        <div class="display-box-user">
            <a href="profile.php?id=<?= e($user->id) ?>">
            <img src="<?= !empty(e($user->avatar)) ? e($user->avatar) : get_avatar_url(e($user->email)) ?>" alt="Image de profile de <?= e($user->pseudo) ?>" class="rounded-circle" width="25" height="25">&nbsp;
            <?= e($user->name) ?><br><?= e($user->email) ?></a>
        </div>
        <hr>
    <?php
    }
}else{
    echo '<div class="display-box-user">Aucun utilisateur trouve... </div>';
}