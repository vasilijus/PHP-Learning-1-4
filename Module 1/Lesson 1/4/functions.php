<?php

    function check_title($title) {
        // return ctype_digit($title);
        return  preg_match("/([^a-zA-Z0-9-])/", $title);
    }

?>