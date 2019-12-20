<?php

$list = scandir('./data');

foreach($list as $fname) {
    if( is_file("data/$fname") ) {
        echo "<a href=\"post.php?fname=$fname\">News $fname </a> <a href=\"edit.php?ftitle=$fname\">[EDIT]</a> <a href=\"edit.php?ftitle=$fname&delete=1\">[DELETE]</a><br>";

       
    }
}

?>
<br>
<a href="add.php">Add</a>