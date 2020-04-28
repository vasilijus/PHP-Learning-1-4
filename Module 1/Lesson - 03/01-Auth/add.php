<?php

// подключение конфигурационного файла
include_once 'config.php';
// подключение функций
include_once 'functions.php';


// задаем значения переменным чтобы были значения
$content = '';
$title  = '';

// если есть ПОСТ-запрос на добавление статьи
if(isset($_POST['addArticle'])) {

    $content    = trim( htmlspecialchars($_POST['content'] ));
    $title      = trim( htmlspecialchars($_POST['title'] ));
        // если поля пустые информируем
    if() {

    }
}

?>