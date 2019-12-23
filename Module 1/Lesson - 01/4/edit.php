<?php

    include_once("functions.php");

    $title = '';
    $content = '';
    
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ){
        if ( count($_GET) > 0 ) {
            echo"<pre>";            print_r($_GET);            echo"</pre>";
            $title = $_GET['ftitle'];
            $content = file_get_contents("data/$title", );
        }
    } elseif (  $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if ( count($_POST) > 0) {
            echo"<pre>";            print_r($_POST);            echo"</pre>";
            $title = $_POST['title'];
            $content = $_POST['content'];
            file_put_contents("data/$title", $content );
        }
    } else {
        header('Location:index.php');
        exit();
    }
    
?>

<form method="post">
    <input type="text" name="title" value="<?php echo $title; ?>"><br>
    <textarea name="content"><?php echo $content; ?></textarea>
    <input type="submit" value="Add">
</form>

<?php 
    echo $msg;
?>

<a href="./index.php">Back</a>