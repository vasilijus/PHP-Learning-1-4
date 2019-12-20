<?php

session_start();

    if( count($_POST) > 0 ) {
        $_SESSION['name'] = $_POST['name'];
        header('Location: b.php');
        exit();
    }

?>
<form method="post">
    Name<br>
    <input type="text" name="name" value=""><br>
    <input type="submit" value="Add">
</form>
