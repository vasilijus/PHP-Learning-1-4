<?php

session_start();

// подключение конфигурационного файла
include_once 'config.php';
// подключение функций
include_once 'functions.php';
// подключение файла с данными
include_once 'db.php';

// для хранения информации о юзере
$user = [];
$user['login'] = '';
$msg = '';

// если существует метод отправки ПОСТ с авторизацией
if(isset($_POST['authorization'])) {
    // сохраняем логин
    $user['login'] = trim(htmlspecialchars($_POST['login']));
    // сохраняем пароль
    $user['password'] = trim(htmlspecialchars($_POST['password']));

    // если поля логин и пароль не заполнены сообщить об этом
    if($user['login'] == '' || $user['password'] == '') {
        $msg = 'Fill all fields';
    }
    // проверка согласно регулярному выражению на a-zA-Z0-9-
    elseif(checkRegular($user['login'])) {
        $msg = 'Numbers , Letters , -!';
    }
    // если все подходит под требования ищем в БД естьт ли такой пользователь
    else {
        // Если пользователь есть и хеш паролей совпадает вернуть массив с данными юзера
        // иначе вернуть нулл
        $userNow = searchUser($users, $user['login'], $user['password']);

        // если пользователь найден добавить информацию в сессию о пользоателе
        if(!is_null($userNow)) {

            $_SESSION['login'] = $userNow['login'];

            // если поставили галочку запомнить данные пользователя
            // то устанавливаем куки с данными пользователя в зашифрованном виде
            if(isset($_POST['remember'])) {
                setcookie('login', hashGenerate($userNow['login']), time() + 600, '/');
                setcookie('password', $userNow['password'], time() + 600, '/');
            }

            // возврат на главную
            header("Location: index.php");

            // выход
            exit();
        }
        // если юзер есть но неверный пароль
        else {
            $msg = 'Login or Password dont match.';
        }
    }
}

// если существуют куки с данными пользователя
if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
    // ищем пользователя сравнивая хеши логинов
    $user = searchUserHash($users, $_COOKIE['login'], $_COOKIE['password']);
    // если пользователя нашли и пароль верный добавить в куки имя пользователя
    if(!is_null($user)) {
        setcookie('name', $user['login'], time() + 10, '/');

        // возврат на главную
        header("Location: index.php");
    }
}

// Выход из системы
if ( (isset($_GET['action'])) && ( ($_GET['action'] == 'logout') ) ) {
    logOut();
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="main.css" rel="stylesheet">
    <title>Authentication</title>
</head>
<body>
<form method="post">
    Login<br>
    <input type="text" name="login" value="<?php echo $user['login']?>"><br>
    Password<br>
    <input type="password" name="password" value=""><br>
    <label><input type="checkbox" name="remember">Remember</label>
    <input type="submit" value="Enter" name="authorization"><br>
    <?php echo $msg; ?>
</form>
</body>
</html>