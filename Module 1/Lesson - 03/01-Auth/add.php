<?php

// подключение конфигурационного файла
include_once 'config.php';
// подключение функций
include_once 'functions.php';

// задаем значения переменным чтобы были значения
$content = '';
$title = '';

// если есть ПОСТ-запрос на добавление статьи
if(isset($_POST['addArticle'])){

    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));

    // если поля пустые информируем
    if($title == '' || $content == ''){
        $msg = 'Fill all fields';
    }
    // если не соответствует название требованиям информируем
    elseif (checkRegular($title)) {
        $msg = 'Letters(latin), numbers - ';
    }
    // если статья уже с таким именем есть информируем
    elseif (file_exists("$dataDir/$title")) {
        $msg = 'Name taken';
    }
    // если все нрмально
    else{

        // сохранить статью в файл
        file_put_contents( "$dataDir/$title", $content, FILE_APPEND );

        // возврат на главную
        header("Location: index.php");

        // выход
        exit();
    }
}
// если нет ПОСТ-запроса пустое сообщение и вывод пустой формы
else{
    $msg = '';
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
    <title>New Article</title>
</head>
<body>

<form method="post">
    Name<br>
    <input type="text" name="title" value="<?php echo $title?>"> <br>
    Content<br>
    <textarea name="content"><?php echo $content?></textarea><br>
    <input type="submit" value="Add" name="addArticle">
</form>
<?php echo $msg; ?>

</body>
</html>
