<?php

print("Begin Lesson 1 <br><hr> Logs<br>");

$info = [];

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

$info[] = date('Y-m-d H:i:s');
$info[] = $_SERVER['REMOTE_ADDR'];
$info[] = $_SERVER['REQUEST_URI'];
$info[] = $_SERVER['HTTP_USER_AGENT'];

$str = implode('-@_@-' , $info);

$f = fopen('log.txt', 'a');

    fwrite($f, $str . "\n");

fclose($f);
// print_r($str);

?>