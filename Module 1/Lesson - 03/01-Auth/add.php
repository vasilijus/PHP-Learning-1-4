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
    if( $title == '' || $content = '' ) {
        $message = 'Fill in the fields';
    }
        // если не соответствует название требованиям информируем
    elseif( checkRegularExp($title) ) {
        $message = 'Only numbers , minus or letters';
    }
        // если статья уже с таким именем есть информируем
    elseif( file_exists("$dataDir/$title") ) {
        $message = 'Name taken.';
    }
        // если все нрмально
    else {
        // save to file
        file_put_contents( "$dataDir/$title", $content, FILE_APPEND );
        // redirect home
        header("Location: index.php");
        // exit
        exit();
    }
}

else {
    $message = '';
}
?>