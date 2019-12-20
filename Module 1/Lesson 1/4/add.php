<?php

    include_once("functions.php");

    // $_SERVER['REQUEST_METHOD'] == 'POST';
    if( count($_POST) > 0 ) {
        $title      = trim( $_POST['title'] );
        $content    = trim( $_POST['content'] );
        /* TODO: ! empty field , bad title , if file exists ,, save newsItem, header  */

        if ($title == ''||$content == ''){
            // Validate if the fields ar not === null
            $msg = 'Fill the fields';
        } elseif( file_exists("data/$title") ){
            // Validate if title already exists
            $msg = "The title is already taken";

        } elseif ( check_title($title) ){
            // Validate the fields are correct ( no unnescessary symbols )
            $msg = "Contains forbidden symbols";
        } else {
            // Save the news file
            // $f = fopen("data/".$title, 'a');
            //     fwrite($f, $content);
            // fclose();
            
            file_put_contents( "data/$title" , $content );

            // Redirect to home
            header("Location: index.php?msg=ok");
            exit();

        }
        
    } else {
        $msg    = '';
        $title  = '';
        $content= '';
    }
?>

<form method="post">
    <input type="text" name="title" value="<?php echo $title; ?>"><br>
    <textarea name="content"><?php echo $content; ?></textarea>
    <input type="submit" value="Add">
</form>

<?php 
    echo $msg;
?>