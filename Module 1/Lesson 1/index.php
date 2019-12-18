<?php

print("Begin Lesson 1 <br><hr>");

$file = fopen('1.txt', 'r');

//     $read = fread($file, 2); // put the cursor after second element (Hello => He|llo)
//     echo $read;

while( !feof($file) ) {
    $str = fread($file, 2);
    echo $str;
}

fclose($file);



?>