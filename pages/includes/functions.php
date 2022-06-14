<?php
include_once "config.php";

function debug($var, $stop = false)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    if ($stop) die;
}

function get_url($page = '')
{
    return HOST . "/$page";
}

function get_page_title($title = '')
{
    if (!empty($title)) {
        return SITE_NAME . " - $title";
    } else {
        return SITE_NAME;
    }
}

function redirect($link = HOST)
{
    header("Location: $link");
    die;
}

function db()
{
    try {
        return new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function db_query($sql, $exec = false)
{
    if (empty($sql)) return false;

    if ($exec) return db()->exec($sql);

    return db()->query($sql);
}

// -----------------------------Запросы--------------------------------

function get_posts($artist_id = 0)
{
    if ($artist_id > 0) {
        return db_query("SELECT music.*, artist.* FROM `music` JOIN `artist` ON artist.id = music.artist_id WHERE music.artist_id = $artist_id; ")->fetchAll();
    } else {
        return db_query("SELECT music.*, artist.* FROM `music` JOIN `artist` ON artist.id = music.artist_id GROUP BY music.id_music; ");
    }
}

function get_artists($artist_id = 0)
{
    if ($artist_id > 0) {
        // return db_query("SELECT artist.*, music.* FROM `artist` JOIN `music` ON music.artist_id = artist.id WHERE artist.id = $artist_id; ")->fetchAll();
        return db_query("SELECT artist.* FROM `artist` WHERE artist.id = $artist_id; ")->fetchAll();
    } else {
        return db_query("SELECT * FROM `artist`;")->fetchAll();
    }
}

function get_genres($genre_id = 0)
{
    if ($genre_id > 0) {
        return db_query("SELECT * FROM `genre` ORDER BY `genre_id` ASC;")->fetchAll();
    } else {
        return db_query("SELECT * FROM `genre` ORDER BY `genre_id` ASC;")->fetchAll();
    }
}

function get_genres_list($genre_id = 0)
{
    if ($genre_id > 0) {
        return db_query("SELECT genre.* FROM `genre` WHERE genre.genre_id = $genre_id; ")->fetchAll();
    } else {
        return db_query("SELECT music.*, artist.* FROM `music` JOIN `artist` ON artist.id = music.artist_id;")->fetchAll();
    }
}

function get_genres_music($genre_id = 0)
{
    if ($genre_id > 0) {
        return db_query("SELECT genre.*, music.*, artist.* FROM `genre` JOIN `music` ON music.genre = genre.genre_id JOIN `artist` ON artist.id = music.artist_id WHERE genre.genre_id = $genre_id; ")->fetchAll();
    } else {
        return db_query("SELECT music.*, artist.* FROM `music` JOIN `artist` ON artist.id = music.artist_id;")->fetchAll();
    }
}



function get_new_releases()
{
    // return db_query("SELECT music.*, artist.nickname FROM `music` JOIN `artist` ON artist.id = music.artist_id WHERE music.relise ORDER BY `relise` DESC; ");
    return db_query("SELECT music.*, artist.nickname FROM `music` JOIN `artist` ON artist.id = music.artist_id WHERE music.relise ORDER BY `relise` DESC; ");
}


function searchArtist($text)
{
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    if ($text == '') {
        $_SESSION['error'] = 'Ничего не найдено!';
        redirect(get_url('search'));
        die;
    } else {
        // return db_query("SELECT artist.*, music.* FROM `artist` JOIN `music` ON artist.id = music.artist_id WHERE artist.id = music.artist_id AND artist.nickname LIKE '%$text%' OR music.name_song LIKE '%$text%'; ")->fetchAll();
        return db_query("SELECT artist.* FROM `artist` WHERE artist.id = artist.id AND artist.nickname LIKE '$text%'; ")->fetchAll();
    }
}

function searchMusic($text)
{
    if (searchArtist($_POST['search']) == '') {
        $_SESSION['error'] = 'Ничего не найдено!';
    } else {
        return db_query("SELECT artist.*, music.* FROM `artist` JOIN `music` ON artist.id = music.artist_id WHERE artist.id = music.artist_id AND artist.nickname LIKE '$text%' OR music.name_song LIKE '$text%'; ")->fetchAll();
    }
}


// -----------------------------Авторизация--------------------------------

function get_user_info($login)
{
    return db_query("SELECT * FROM `users` WHERE `login` = '$login';")->fetch();
}

function add_user($login, $pass)
{
    $login = trim($login);
    $name = ucfirst($login);
    $password = password_hash($pass, PASSWORD_DEFAULT);
    return db_query("INSERT INTO `users` (`id`, `login`, `pass`, `name`) VALUES (NULL, '$login', '$password', '$name');", true);
}

function register_user($auth_data)
{
    if (empty($auth_data) || !isset($auth_data['login']) || empty($auth_data['login']) || !isset($auth_data['pass']) || empty($auth_data['pass']) || !isset($auth_data['pass2']) || empty($auth_data['pass2'])) return false;

    $user = get_user_info($auth_data['login']);
    $len_pass = strlen($auth_data['pass']);
    $len_login = strlen($auth_data['login']);
    $login = $auth_data['login'];
    $pass = $auth_data['pass'];

    if (!empty($user)) {
        $_SESSION['error'] = 'Данное имя уже занято!';
        redirect(get_url('register'));
        die;
    }

    if (preg_match('/^[а-я].*$/i', $login)) {
        $_SESSION['error'] = 'Только латинские буквы!';
        redirect(get_url('register'));
        die;
    }
    if (!preg_match('/^[-a-zA-Z0-9.-_()]+$/', $login)) {
        $_SESSION['error'] = 'Только латинские буквы!';
        redirect(get_url('register'));
        die;
    }

    if (!preg_match('/^[-a-zA-Z0-9.-_()]+$/', $pass)) {
        $_SESSION['error'] = 'Недопустимое значение!';
        redirect(get_url('register'));
        die;
    }

    if ($len_login <= 4) {
        $_SESSION['error'] = 'Логин не должен быть короче 4 символов';
        redirect(get_url('register'));
        die;
    }

    if ($len_login >= 21) {
        $_SESSION['error'] = 'Логин слишком длинный';
        redirect(get_url('register'));
        die;
    }

    if ($auth_data['pass'] !== $auth_data['pass2']) {
        $_SESSION['error'] = 'Пароли не совпадают!';
        redirect(get_url('register'));
        die;
    }

    if ($len_pass <= 6) {
        $_SESSION['error'] = 'Пароль слишком короткий!';
        redirect(get_url('register'));
        die;
    }

    if ($len_pass >= 41) {
        $_SESSION['error'] = 'Пароль слишком длинный!';
        redirect(get_url('register'));
        die;
    }

    if (add_user($auth_data['login'], $auth_data['pass'])) {
        $_SESSION['successfully'] = 'Успешая регистрация';
        redirect(get_url('sign'));
        die;
    }
}

function login($auth_data)
{
    if (empty($auth_data) || !isset($auth_data['login']) || empty($auth_data['login'] || $auth_data) || !isset($auth_data['pass']) || empty($auth_data['pass'])) return false;

    $user = get_user_info($auth_data['login']);

    if (empty($user)) {
        $_SESSION['error'] = 'Логин или пароль не верны!';
        redirect(get_url('sign'));
        die;
    }

    if (password_verify($auth_data['pass'], $user['pass'])) {
        $_SESSION['user'] = $user;
        $_SESSION['error'] = '';
        redirect(get_url(''));
        die;
    } else {
        $_SESSION['error'] = 'Пароль или логин не верны!';
        redirect(get_url('sign'));
        die;
    }
}

function get_error_message()
{
    $error = '';
    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
        $error = $_SESSION['error'];
        $_SESSION['error'] = '';
    }
    return $error;
}

function get_successfully_message()
{
    $successfully = '';
    if (isset($_SESSION['successfully']) && !empty($_SESSION['successfully'])) {
        $successfully = $_SESSION['successfully'];
        $_SESSION['successfully'] = '';
    }
    return $successfully;
}

function logged_in()
{
    return isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']);
}

// -----------------------------Лайки--------------------------------

function get_likes_count($music_id)
{
    if (empty($music_id)) return 0;

    return db_query("SELECT COUNT(*) FROM `likes` WHERE `music_id` = $music_id;")->fetchColumn();
}

function is_music_liked($music_id)
{
    $user_id = $_SESSION['user']['id'];
    if (empty($music_id)) return false;

    return db_query("SELECT * FROM `likes` WHERE `music_id` = $music_id AND `user_id` = $user_id")->rowCount() > 0;
}

function add_like($music_id)
{
    $user_id = $_SESSION['user']['id'];
    if (empty($music_id)) return false;

    $sql = "INSERT INTO `likes` (`user_id`, `music_id`) VALUES ('$user_id', '$music_id');";
    return db_query($sql, true);
}


function delete_like($music_id)
{
    $user_id = $_SESSION['user']['id'];
    if (empty($music_id)) return false;

    return db_query("DELETE FROM `likes` WHERE `music_id` = $music_id AND `user_id` = $user_id;", true);
}

function get_liked_music()
{
    $user_id = $_SESSION['user']['id'];

    $sql = "SELECT likes.*, music.id_music, music.artist_id, music.name_song, music.avatar_song, artist.id, artist.nickname, artist.avatar FROM `likes` JOIN `music` ON music.id_music = likes.music_id JOIN `artist` ON artist.id = music.artist_id WHERE likes.user_id = $user_id;";

    return db_query($sql)->fetchAll();
}

// -----------------------------Настройки пользователя--------------------------------

function get_user_profile()
{
    $user_id = $_SESSION['user']['id'];

    $sql = "SELECT * FROM `users` WHERE users.id = $user_id";
    return db_query($sql)->fetchAll();
}

function update_user_info($login, $name, $pass)
{
    $user_id = $_SESSION['user']['id'];
    $login = trim($login);
    $name = ucfirst($name);
    $password = password_hash($pass, PASSWORD_DEFAULT);
    return db_query("UPDATE `users` SET `login` = '$login', `pass_new` = '$password', `name` = '$name' WHERE `users`.`id` = $user_id;", true);
}

function update_user($auth_data)
{
    if (empty($auth_data) || !isset($auth_data['login']) || empty($auth_data['login']) || !isset($auth_data['pass_new']) || empty($auth_data['pass_new']) || !isset($auth_data['pass_new2']) || empty($auth_data['pass_new2']) || !isset($auth_data['name']) || empty($auth_data['name'])) return false;

    $user = get_user_info($auth_data['login']);
    $len_login = strlen($auth_data['login']);
    $login = $auth_data['login'];
    $len_name = strlen($auth_data['name']);
    $name = $auth_data['name'];
    $pass = $auth_data['pass_new'];
    $len_pass = strlen($auth_data['pass_new']);

    if (!empty($user)) {
        $_SESSION['error'] = 'Данное имя уже занято!';
        redirect(get_url('account'));
        die;
    }

    if (preg_match('/^[а-я].*$/i', $login)) {
        $_SESSION['error'] = 'Только латинские буквы!';
        redirect(get_url('account'));
        die;
    }
    if (!preg_match('/^[-a-zA-Z0-9.-_()]+$/', $login)) {
        $_SESSION['error'] = 'Только латинские буквы!';
        redirect(get_url('account'));
        die;
    }
    if (!preg_match('/^[-a-zA-Z0-9.-_()]+$/', $name)) {
        $_SESSION['error'] = 'Только буквы!';
        redirect(get_url('account'));
        die;
    }

    if (!preg_match('/^[-a-zA-Z0-9.-_()]+$/', $pass)) {
        $_SESSION['error'] = 'Недопустимое значение!';
        redirect(get_url('account'));
        die;
    }

    if ($len_login <= 4) {
        $_SESSION['error'] = 'Логин не должен быть короче 4 символов';
        redirect(get_url('account'));
        die;
    }

    if ($len_login >= 21) {
        $_SESSION['error'] = 'Логин слишком длинный';
        redirect(get_url('account'));
        die;
    }

    if ($len_name <= 4) {
        $_SESSION['error'] = 'Имя слишком короткое';
        redirect(get_url('account'));
        die;
    }

    if ($len_name >= 21) {
        $_SESSION['error'] = 'Имя слишком длинное';
        redirect(get_url('account'));
        die;
    }

    if ($auth_data['pass_new'] !== $auth_data['pass_new2']) {
        $_SESSION['error'] = 'Пароли не совпадают!';
        redirect(get_url('account'));
        die;
    }

    if ($len_pass <= 6) {
        $_SESSION['error'] = 'Пароль слишком короткий!';
        redirect(get_url('account'));
        die;
    }

    if ($len_pass >= 41) {
        $_SESSION['error'] = 'Пароль слишком длинный!';
        redirect(get_url('account'));
        die;
    }

    if (update_user_info($auth_data['login'], $auth_data['name'], $auth_data['pass_new'])) {
        $_SESSION['successfully'] = 'Успешно изменено!';
        redirect(get_url('account'));
        die;
    }
}

function avatarSecurity($avatar)
{
    $name = $avatar['name'];
    $type = $avatar['type'];
    $size = $avatar['size'];
    $blacklist = array(".php", ".js", ".html", ".exe", ".pif", ".com", ".msi", ".jar", ".bat", ".vbe", ".cmd");

    foreach ($blacklist as $row) {
        if (preg_match("/$row\$/i", $name)) {
            $_SESSION['error'] = 'Формат неверный!';
            redirect(get_url('account'));
            die;
        };
    }

    if (($type != "image/png") && ($type != "image/jpg") && ($type != "image/jpeg")) {
        $_SESSION['error'] = 'Неверный формат изображения!';
        redirect(get_url('account'));
        die;
    };

    if ($size > 5 * 1024 * 1024) {
        $_SESSION['error'] = 'Изображение слишком большое!';
        redirect(get_url('account'));
        die;
    }
    return true;
}
