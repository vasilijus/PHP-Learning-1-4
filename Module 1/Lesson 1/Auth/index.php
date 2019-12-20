<?php

session_start();
    if( $_SESSION['is_auth'] ) {
        unset( $_SESSION['is_auth'] );
    }
    if( count($_POST) > 0 ) {
        if( $_POST['login'] == 'admin' && $_POST['password'] == 'password' ) {
            $_SESSION['is_auth'] = true;
            header('Location: Auth/main.php');
            exit();
        }
               
    }


?>
<form method="post">
    Name<br>
    <input type="text" name="login" value=""><br>
    Password<br>
    <input type="password" name="password" value=""><br><br>
    <input type="submit" value="Add">
</form>
<?php 
