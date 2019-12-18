<?php

print("Begin Lesson 1 <br><hr> <br>");

$info = [];
$info[] = date('Y-m-d H:i:s');
$info[] = $_SERVER['REMOTE_ADDR'];
$info[] = $_SERVER['REQUEST_URI'];
$info[] = $_SERVER['HTTP_USER_AGENT'];

$str = implode('-@_@-' , $info);

file_put_contents('log.txt',$str . "\n", FILE_APPEND);

// print_r($str);

?>