<?php

$list = scandir('./data');

foreach($list as $fname) {
    if( is_file("data/$fname") ) {
        echo "<a href=\"post.php?fname=$fname\">News $fname </a><br>";
    }
}

?>