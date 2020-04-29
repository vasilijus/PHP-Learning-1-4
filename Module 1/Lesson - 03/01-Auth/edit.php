<?php

// подключение конфигурационного файла
include_once 'config.php';
// подключение функций
include_once 'functions.php';

// подтверждение удаления файла, изначально скрыто до нажатия на кнопку удалить
$delete = 'none';
// запоминаем имя файла которое редактируем если оно существует иначе null
$oldTitle = $_GET['fname'] ?? null;

// проверка на правильность запроса
// если запрос null или файл не существует
if (($oldTitle === null) || (!file_exists("$dataDir/$oldTitle"))) {
    echo 'Ошибка 404, статья с таким именем не существует!';
    // выход
    exit();
}
// если не указано название статьи
elseif ($oldTitle == '') {
    echo 'Ошибка 404, укажите название статьи!';
    // выход
    exit();
}
// если все верно считать содержимое файла
else {
    // читаем данные из этого файла
    $oldContent = fileRead("$dataDir/$oldTitle");
}

// если есть ПОСТ запрос на редактирвоание статьи
if(isset($_POST['editArticle'])) {

    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));

    // если поля не заполнены информируем чтобы заполнили
    if($title == '' || $content == '') {
        $msg = 'Заполните все поля';
    }
    // если не соответствует регулярке, пишем об этом
    elseif(checkRegular($title)) {
        $msg = 'В заголовке можно использовать только цифры, минус и буквы латинского алфавита!';
    }
    // если все нормально
    else {
        // удаляем старый файл и создаем новый с новым содержимым
        rewriteFile($dataDir, $oldTitle, $title, $content);

        // возврат на главную
        header("Location: index.php");

        // выход
        exit();
    }
}
// если не было ПОСТ запроса на редактирование
else {
    $msg = '';
    $title = $oldTitle;
    $content = $oldContent;
}

// запрос на отмену редактирвоания
if(isset($_POST['resetArticle'])) {
    // возврат на главную
    header("Location: index.php");
}

// запрос на удаление статьи
if(isset($_POST['deleteArticle'])) {
    // показать checkbox для подтверждения согласия на удаление
    $delete = 'agree';
    // если есть согласие удалить статью
    if(isset($_POST['deleteAgree'])) {
        deleteFile("$dataDir/$title");

        // возврат на главную
        header("Location: index.php");
    }
    // если не дали согласие уведомить что оно необходимо
    else {
        $msg = 'Необходимо подтвердить удаление файла';
        $title = trim(htmlspecialchars($_POST['title']));
        $content = trim(htmlspecialchars($_POST['content']));
    }
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
    <title>Редактирование статьи <?php echo $title ?></title>
</head>
<body>

<form method="post">
    Название<br>
    <input type="text" name="title" value="<?php echo $title?>"> <br>
    Контент<br>
    <textarea name="content"><?php echo $content?></textarea><br>
    <input type="submit" value="Сохранить" name="editArticle">
    <input type="submit" value="Отменить" name="resetArticle">
    <input type="submit" value="Удалить" name="deleteArticle"><br>
    <label class="<?php echo $delete ?>"><input type="checkbox" value="yes" name="deleteAgree">Подтвердите удаление</label>
</form>

<?php echo $msg; ?>

</body>
</html>
