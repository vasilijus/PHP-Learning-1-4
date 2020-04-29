<?php
// $_SESSION
session_start();

// Config
include_once 'config.php';
// Functions
include_once 'functions.php';
// Adding tmp db
include_once 'db.php';

// кнопка войти
$delete__in = 'none';
// кнопка выйти
$delete__out = 'none';
// иконка по умолчанию
$profileIcon = 'default';
// массив статей
$articles = [];

// Dir exists ?
if (file_exists("$dataDir")) {
    $dirExists = true;
    // Gather dir contents
    $list = scandir("$dataDir");

    //
    foreach($list as $fname) {
        //
        if(is_file("$dataDir/$fname")){
            //
            $articles[] = "
            <li>
                <a href=\"post.php?fname=$fname\">$fname</a> 
                <a href=\"edit.php?fname=$fname\">Edit</a>
            </li>";
        }
    }
}
else {
    $dirExists = false;
    mkdir($dataDir, 0775);
}


// Session running ?
if(isset($_SESSION['login']))  {
    // Admin ?
    if($_SESSION['login'] == 'admin') {
        $profileIcon = $_SESSION['login'];
    }
    // Username
    $userName = $_SESSION['login'];
    // !Show - login
    $delete__in = 'none';
    // Show - logout
    $delete__out = 'agree';
}
// если сессии пользователя нет
else {
    // поле имя пустое
    $userName = '';
    // Show - login
    $delete__in = 'agree';
    // !Show - logout
    $delete__out = 'none';
}

// Cookies ?
if(isset($_COOKIE['name']) && ($_COOKIE['name'] != '')) {
    // Get Username
    $userName = $_COOKIE['name'];
    // !Show - login
    $delete__in = 'none';
    // Show - logout
    $delete__out = 'agree';
    // User admin
    if($userName == 'admin') {
        $profileIcon = $userName;
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
    <title>Статьи</title>
</head>
<body>
    <header class="page-header">
        <?php
            echo "
                <div class=\"user\">
                <a href=\"profile.php?user=$userName\"><span>$userName</span></a>
                <a href=\"login.php?action=login\">Login</a>
                <a href=\"login.php?action=logout\">Logout</a>
                </div>
            ";
        ?>
    </header>

    <main class="main-page">
        <section>
            <h1 class="">Articles:</h1>
            <ul class="">
                <?php
                if ($dirExists) {
                    if ($articles != null) {
                        foreach($articles as $article) {
                            echo $article;
                        }
                    }
                    else {
                        echo 'None articles';
                    }

                }
                else {

                    echo 'None articles';
                }
                ?>
            </ul>
            <h2>Manage Articles</h2>
            <ul>
                <li>
                    <a href="add.php">Add</a>
                </li>
            </ul>
        </section>

    </main>

    <footer class="page-footer">
        <div class="copyright">© <?php echo date("Y") ?></div>
    </footer>
</body>
</html>