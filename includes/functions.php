<?php


if (!function_exists('e')) {
    function e($string)
    {
        if ($string) {

            return htmlspecialchars($string);
        }
    }
}


// Check if a friend request has already been sent
if (!function_exists('if_a_friend_request_has_already_been_sent')) {
    function if_a_friend_request_has_already_been_sent($id1, $id2)
    {
        global $db;

        $q = $db->prepare("SELECT user_id1, user_id2, status
                                    FROM friends_relationships 
                                    WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2)
                                    OR (user_id1 = :user_id2 AND user_id2 = :user_id1)");

        $q->execute([
            'user_id1'=> $id1,
            'user_id2'=> $id2
        ]);

        $count = $q->rowCount();
        $q->closeCursor();

        return (bool) $count;
    }
}


// Compte le nombre d'amis quand le status est 1
if (!function_exists('friends_count')) {
    function friends_count($id)
    {
        global $db;

        $q = $db->prepare("SELECT status FROM friends_relationships 
                                    WHERE (user_id1 = :user_connected OR user_id2 = :user_connected)
                                    AND (status = '1')");

        $q->execute([
            'user_connected'=> $id
        ]);

        $count = $q->rowCount();
        $q->closeCursor();

        return $count;
    }
}


if (!function_exists('get_current_locale')) {
    function get_current_locale()
    {
        return $_SESSION['locale'];
    }
}


if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);
    }
}


if (!function_exists('get_session')) {
    function get_session($key)
    {
        if ($key) {
            return !empty($_SESSION[$key])
                ? e($_SESSION[$key])
                : null;
        }
    }
}


// Verifie si une demande d'amitie a deja ete envoye
if (!function_exists('relation_link_to_display')) {
    function relation_link_to_display($id)
    {
        global $db;

        $q = $db->prepare("SELECT user_id1, user_id2, status
                                    FROM friends_relationships 
                                    WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2)
                                    OR (user_id1 = :user_id2 AND user_id2 = :user_id1)");
        $q->execute([
            'user_id1' => get_session('user_id'),
            'user_id2' => $id
        ]);

            $data = $q->fetch(PDO::FETCH_OBJ);


        if ($data) {
            if ($data->user_id1 == $id && $data->status == '0'){
                // Lien pour accepter ou refuser la demande d'amitie
                //return 'accept_reject_relation_link';
                // le recepteur est connecte, il peut accepter ou rejeter la demande.
                return 'accept_reject_relation_link';

            }elseif ($data->user_id1 == get_session('user_id') && $data->status == '0'){
                // Message pour dire que la demande a deja ete envoyee.Lien pour annuler la demande
                //l'emetteur est connecte, il peut annuler la demande.
                return 'cancel_relation_link';

            }elseif (($data->user_id1 == get_session('user_id') || $data->user_id1 == $id) && $data->status == '1'){
                // Lien pour supprimer la relation d'amitie
                //l'emetteur ou le recepteur est connecte.Les deux sont amis, il peut retirer l'ami de la liste de ses amis.
                return 'delete_relation_link';

            }else{
                // Lien pour ajouter un ami
                return 'add_relation_link';
            }

        }
    }

}


if (!function_exists('redirect_intent_or')) {
    function redirect_intent_or($default_url)
    {
        if ($_SESSION['forwarding_url']) {
            $url = $_SESSION['forwarding_url'];
        } else {
            $url = $default_url;
        }
        $_SESSION['forwarding_url'] = null;
        redirect($url);
    }
}


if (!function_exists('get_avatar_url')) {
    function get_avatar_url($email, $size = 25)
    {
        return "http://gravatar.com/avatar/" . md5(strtolower(trim(e($email))) . "?s=" . $size);
    }
}


if (!function_exists('fin_user_by_id')) {
    function fin_user_by_id($id)
    {
        global $db;

        $q = $db->prepare("SELECT name, pseudo, email, city, country, sex, twitter, github, bio, available_for_hiring, avatar FROM users WHERE id = ?");
        $q->execute([$id]);

        $data = $q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;

    }
}


if (!function_exists('fin_code_by_id')) {
    function fin_code_by_id($id)
    {
        global $db;

        $q = $db->prepare('SELECT code FROM codes 
                                    WHERE id=?');

        $q->execute([$id]);

        $data = $q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;

    }

}


if (!function_exists('not_empty')) {
    function not_empty($fields = [])
    {
        if (count($fields) != 0) {
            foreach ($fields as $field) {
                if (empty($_POST[$field]) || trim($_POST[$field]) == "") {
                    return false;
                }
            }

            return true;
        }
    }
}


if (!function_exists('is_already_in_use')) {
    function is_already_in_use($field, $value, $table)
    {
        global $db;

        $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
        $q->execute([$value]);

        $count = $q->rowCount();
        $q->closeCursor();

        return $count;

    }
}


if (!function_exists('set_flash')) {
    function set_flash($message, $type = 'info')
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}


if (!function_exists('redirect')) {
    function redirect($page)
    {
        header('Location: ' . $page);
        exit();
    }
}

// Permet de rendre tout les liens d'une chaine de caractere cliquable
if (!function_exists('replace_links')) {
    function replace_links($texte)
    {
        $regex_url = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";
        return preg_replace($regex_url, "<a href=\"$0\" target=\"_blank\">$0</a>", $texte);
    }
}


// Retourne le nombre d'enregistrement trouve respectant une condition
if (!function_exists('cell_count')) {
    function cell_count($table, $field_name, $field_value)
    {
        global $db;

        $q = $db->prepare("SELECT * FROM $table WHERE $field_name = ?");
        $q->execute([$field_value]);

        $count = $q->rowCount();

        $q->closeCursor();

        return $count;

    }
}


// Remember me
if (!function_exists('remember_me')) {
    function remember_me($user_id)
    {
        global $db;
        // Generer le token
        $token = openssl_random_pseudo_bytes(24);

        //Generer le token
        do {
            $selector = openssl_random_pseudo_bytes(9);
        } while (cell_count('auth_tokens', 'selector', $selector) > 0);

        // Enregistrer les infos en bd
        $q = $db->prepare('INSERT INTO auth_tokens(expires, selector, user_id, token)
                              VALUES(DATE_ADD(NOW(), INTERVAL 14 DAY ), :selector, :user_id, :token)');
        $q->execute([
            'selector' => $selector,
            'user_id' => $user_id,
            'token' => hash('sha256', $token)
        ]);

        // Generer un Cookies d'une validite de 14 jours
        setcookie(
            'auth',
            base64_encode($selector) . ':' . base64_encode($token),
            time() + 3600 * 24 * 14,
            null,
            null,
            false,
            true);


    }
}


if (!function_exists('auto_login')) {
    function auto_login()
    {
        global $db;

        // Verifier que le cookies 'auth' existe
        if (!empty($_COOKIE['auth'])) {
            $split = explode(':', $_COOKIE['auth']);

            if (count($split) !== 2) {
                return false;
            }

            //Recuperer le selector et le token via le tableau split
            list($selector, $token) = $split;

            $q = $db->prepare("SELECT auth_tokens.token, auth_tokens.user_id,
                                        users.id, users.pseudo, users.email, users.avatar 
                                        FROM auth_tokens
                                        LEFT JOIN users
                                        ON auth_tokens.user_id = users.id
                                        WHERE selector = ? AND expires >= CURDATE()");

            $q->execute([base64_decode($selector)]);

            $data = $q->fetch(PDO::FETCH_OBJ);

            if ($data) {
                if (hash_equals($data->token, hash('sha256', base64_decode($token)))) {

                    session_regenerate_id(true);

                    $_SESSION['user_id'] = $data->user_id;
                    $_SESSION['pseudo'] = $data->pseudo;
                    $_SESSION['email'] = $data->email;
                    $_SESSION['avatar'] = $data->avatar;

                    return true;

                }
            }

        }

        return false;

    }
}


if (!function_exists('save_input_data')) {
    function save_input_data()
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'password') === false) {
                $_SESSION['input'][$key] = $value;
            }
        }
    }
}


if (!function_exists('get_input_data')) {
    function get_input_data($key)
    {
        return !empty($_SESSION['input'][$key])
            ? e($_SESSION['input'][$key])
            : null;
    }
}


if (!function_exists('clear_input_data')) {
    function clear_input_data()
    {
        if (isset($_SESSION['input'])) {

            $_SESSION['input'] = [];
        }
    }
}


if (!function_exists('set_active')) {
    function set_active($file, $class = 'active')
    {
        //$page = array_pop(explode('/', $_SERVER['SCRIPT_NAME']));
        //$page = trim(strrchr($file, '/'), '/');
        $path = $_SERVER['SCRIPT_NAME'];
        $page = trim(strrchr($path, '/'), '/');
        if ($page == $file . '.php') {

            return $class;
        } else {
            return "";
        }
    }
}