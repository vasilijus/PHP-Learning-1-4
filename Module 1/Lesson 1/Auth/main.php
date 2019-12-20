<?php

session_start();

    if( !(isset($_SESSION['is_auth']) && $_SESSION['is_auth']) ) {
        header('Location: index.php');
        exit();
    }    

?>

<p> Secret zone. </p>
<?php 
/*
echo "MD5 "  . md5('password') . "<br>";
echo "Hash " . hash('sha256','password') . "<br>";
echo "My hash ". my_hash('password') . "<br>";

function my_hash($str) {
    return hash('sha256','password' . "newHash") . "<br>";
}
*/
?>

<a href="index.php">Logout</a>