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


$dir = scandir("./");
foreach($dir as $el) {
    echo "<a href=\"$el\">$el</a><br>";
}
?>
