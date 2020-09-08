<?php

if (!function_exists('e')) {
    function e($string)
    {
        if ($string) {

            return htmlspecialchars($string);
        }
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


if (!function_exists('get_avatar_url')) {
    function get_avatar_url($email, $size = 25)
    {
        return "http://gravatar.com/avatar/" . md5(strtolower(trim(e($email)))."?s=".$size);
    }
}


if (!function_exists('fin_user_by_id')) {
    function fin_user_by_id($id)
    {
        global $db;

        $q = $db->prepare("SELECT name, pseudo, email, city, country, sex, twitter, github, bio, available_for_hiring FROM users WHERE id = ?");
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