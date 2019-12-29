<?php

    function checkRegular($title) {
        // return ctype_digit($title);
        return  preg_match("/([^a-zA-Z0-9-])/", $title);
    }

    function logOut() {
        unset($_SESSION['is_auth']);
        setcookie('name', -600, '/');
    }

?>