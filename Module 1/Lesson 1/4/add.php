<?php
    // $_SERVER['REQUEST_METHOD'] == 'POST';
    if( count($_POST) > 0 ) {
        $title      = trim( $_POST['title'] );
        $content    = trim( $_POST['content'] );
        if ($title == ''||$content == ''){
            $msg = 'Fill the fields';
        }
        else {
            header("Location: index.php?msg=ok");
            exit();
        }
    }
    else {
        $msg = '';
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