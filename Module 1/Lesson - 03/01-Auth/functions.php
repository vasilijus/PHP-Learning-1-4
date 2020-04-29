<?php

// проверка регулярного выражения
function checkRegular($title)
{
    // возвращает 1 если соответствует усовиям
    // только строчные или заглавные буквы латинского алфавита
    // + цифры + минус
    return preg_match("/[^a-zA-Z0-9-]/i", $title);
}

// чтение из файла
function fileRead($path)
{
    // возвращает содержимое файла
    return file_get_contents("$path" , FILE_USE_INCLUDE_PATH);
}

// перезаписать файл
function rewriteFile($dataDir, $oldTitle, $newTitle, $newContent)
{
    // удаляем файл
    unlink("$dataDir/$oldTitle");

    // сохранить статью в файл
    file_put_contents( "$dataDir/$newTitle", $newContent, FILE_APPEND );
}

// удалить файл
function deleteFile($path)
{
    // удаляем файл
    unlink("$path");
}


define("SECRET","DsA9bfPMDqnZjaMe");
// генерация хеша
function hashGenerate($password)
{
    // возвращает сгенерированный хеш
    return hash('sha256', $password . SECRET);
}

// сравнение хеша
function hashMatching($password, $hash)
{
    // возврашает истину если хеш совпал
    return ($hash == hash('sha256', $password . SECRET));
}

// поиск пользователя по логину
function searchUser($users, $login, $password)
{
    $result = null;

    // поиск юзера по логину в бд
    foreach ($users as $user) {
        // если логин совпал и проверка хеша паролей прошла тогда вернуть массив с данными на пользователя
        if($login == $user['login'] && hashMatching($password, $user['password'])) {
            $result =  $user;
            break;
        }
    }

    // либо нулл если ненайдено либо массив с данными на юзера
    return $result;
}

// поиск юзера по хешу логина
function searchUserHash($users, $loginHash, $passwordHash)
{
    $result = null;

    foreach ($users as $user) {
        if((hashMatching($user['login'], $loginHash)) && ($passwordHash == $user['password'])) {
            $result = $user;
            break;
        }
    }
    return $result;
}

// выход из системы, удаление информации из сессии и имени из куки
function logOut()
{
    unset($_SESSION['login']);
    setcookie('name', '', time() - 600, '/');
    header("Location: index.php");
}

?>