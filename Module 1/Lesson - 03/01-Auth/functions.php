<?php
    print "Functions connected";

    function checkRegularExp($title) {
        // Numbers | Latin Letters | minus
        return preg_match("/[^a-zA-Z0-9-]/i", $title);
    }

?>