<?php

session_start();
    if( $_SESSION['is_auth'] ) {
        unset( $_SESSION['is_auth'] );
    }
    if( count($_POST) > 0 ) {
        if( $_POST['login'] == 'admin' && $_POST['password'] == 'password' ) {
            if( isset( $_POST['remember'] ) ){
                setcookie('login', sha256($_POST['login']), time() + 3600 * 24 * 7, '/');
                setcookie('password', sha256($_POST['password']), time() + 3600 * 24 * 7, '/');
            }
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
    <input type="password" name="password"><br>
    <input type="checkbox" name="remember">Remember me<br><br>
    <input type="submit" value="Add">
</form>

