<?php

    print_r( '5');
    // $_SERVER['REQUEST_METHOD'] == 'POST';
    if( count($_POST) > 0 ) {
        $title      = trim( $_POST['title'] );
        $content    = trim( $_POST['content'] );
        if ($title == ''||$content == ''){
            $msg = 'Fill the fields';
        }
        /*
            ! empty field , bad title , if file exists ,, save newsItem, header
        */
        else {
            if( file_exists($title) ){
                $msg = "The title is already taken";
            } else {
                $f = fopen("data/".$title, 'a');
                    fwrite($f, $content);
                fclose();

                header("Location: index.php?msg=ok");
                exit();
            }
        }

    }
?>

<form method="post">
    <input type="text" name="title"><br>
    <textarea name="content"></textarea>
    <input type="submit" value="Add">
</form>

<?php 
    echo $msg;
?>