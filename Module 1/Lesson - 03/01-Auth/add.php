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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add article page</title>
</head>
<body>
    
    <form method="post">
        Название<br>
        <input type="text" name="title" value="<?php echo $title?>"> <br>
        Контент<br>
        <textarea name="content"><?php echo $content?></textarea><br>
        <input type="submit" value="Добавить" name="addArticle">
    </form>
    <?php echo $message; ?>

</body>
</html>