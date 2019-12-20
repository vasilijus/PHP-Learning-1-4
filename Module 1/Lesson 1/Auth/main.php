<?php

session_start();

    if( !(isset($_SESSION['is_auth']) && $_SESSION['is_auth']) ) {
        header('Location: index.php');
        exit();
    }    

?>

<p> Secret zone. </p>
<?php 
echo md5('password') . "<br>";
echo hash('sha256','password') . "<br>";
?>