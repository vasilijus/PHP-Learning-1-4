<?php
    error_reporting();
    // $fname = $_GET['fname']; // NULL if empty
    $fname = $_GET['fname'] ?? null;
    
    if( !isset($_GET['fname']) ){
        echo "Error 404 , Nothing passed";
    }
    /* TODO: check corectness of the param
                - Tolko cyfry
                - (*) sorerzit tolko cyfry , latinskie bukvy i 
    */
    elseif( !file_exists( 'data/'.$fname) ){
        echo "Error 404 , No such news";
    }
    else {
        $content = file_get_contents('data/'.$fname);

        echo nl2br($content); // replace nl(\n) to "<br>"
    }

?>