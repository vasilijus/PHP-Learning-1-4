<?php

print("Begin Lesson 1 <br><hr>");

/*
    r   read            |   (error if file not exists)
    r+  read & write    |
    w   write           |   (new file is not found)
    w+  write & read    |
    a   append          |
    a+  append          |
*/

$f = fopen('1.txt', 'r');
$part = 2; // 2Mb = 2 * 1024 * 1024 

//     $read = fread($f, 2); // put the cursor after second element (Hello => He|llo)
//     echo $read;

while( !feof($f) ) { // end of file
    $str = fread($f, $part);
    echo $str;
}

fclose($f);



?>