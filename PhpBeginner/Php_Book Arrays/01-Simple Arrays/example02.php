<?php
declare(strict_types=1); // Must be the very first line always...

$customer_record[]      = validate_first_name($_POST['first_name']);
$customer_record[]      = validate_last_name($_POST['last_name']);
$customer_record[]      = validate_address($_POST['address']);
$customer_record[]      = validate_city($_POST['city']);
$customer_record[]      = $_POST['zip_code'];




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

$json = json_encode($customer_record);

print_r($json . "<br>");

foreach( $customer_record as $rc ) {
    print_r( $rc ." <br>") ;
}


?>