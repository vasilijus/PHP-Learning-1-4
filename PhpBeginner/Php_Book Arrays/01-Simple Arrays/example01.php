<?php
declare(strict_types=1); // Must be the very first line always...

// $firstName      = $_POST['first_name'];
// $lastName       = $_POST['last_name'];
// $address        = $_POST['address'];
// $city           = $_POST['city'];
// $zip_code       = $_POST['zip_code'];

// print "Your name is $firstName $lastName.";
// print "You live at $address, $city, $zip_code";


$firstName      = validate_first_name($_POST['first_name']);
$lastName       = validate_last_name($_POST['last_name']);
$address        = validate_address($_POST['address']);
$city           = validate_city($_POST['city']);
$zip_code       = $_POST['zip_code'];


print "Your name is $firstName $lastName.";
print "You live at $address, $city, $zip_code";


function validate_first_name( string $val ) : string {
    if( ( strlen($val) <= 0 ) || ( strlen($val) >= 20 ) ) {
        throw new Exception("Invalid Name");
    }
    return $val;
}

function validate_last_name( string $val ) : string {
    if ( ( strlen($val) <= 0 ) || ( strlen($val) >= 20 ) ) {
        throw new Exception("Invalid Last");
    }
    return $val;
}

function validate_address( string $val ) : string {
    if ( ( strlen($val) <= 0 ) || ( strlen($val) >= 20 ) ) {
        throw new Exception("Invalid Last");
    }
    return $val;
}

function validate_city(string $val) : string
{
    if ( (strlen($val) <= 0) || (strlen($val) > 20)) {
        throw new Exception("Invalid City");
    }
    return $val;
}

?>