<?php

// подключение конфигурационного файла
include_once 'config.php';
// подключение функций
include_once 'functions.php';

$content = '';
$fname = $_GET['fname'] ?? null;

// проверка на название есть или нет
if($fname === null){
    $content = 'Ошибка 404, не передано название';
}
// проверка на соответствие
elseif (checkRegular($fname)) {
    $content =  'Ошибка 404. В статье можно использовать только цифры, минус и буквы латинского алфавита!!';
}
// проверка на существование статьи с таким именем
elseif(!file_exists("$dataDir/$fname")) {
    $content = 'Ошибка 404. Нет такой статьи!';
}
// если все нормально считываем данные из файла
else{
    $content = file_get_contents("$dataDir/$fname");
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
    <title>Редактирование статьи <?php echo $fname ?></title>
</head>
<body>
<?php
echo nl2br($content);
?>
</body>
</html>