<?php


$now = time();

if( !isset($_COOKIE['login']) ) {
    setcookie('login', 'admin', $now + 3600 * 24 * 7, '/');

} else {
    $now = $_COOKIE['login'];
}

echo $now;

?>
