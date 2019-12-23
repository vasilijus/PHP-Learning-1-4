<?php
print("Begin Lesson 2 <br><hr>");
/*
    r
    r+
    w
    w+
    a
    a+
*/

$dir = scandir('./');
foreach($dir as $el) {
    echo "<a href=\"$el\">$el</a><br>";
}