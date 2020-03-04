<?php
declare(strict_types=1); // Must be the very first line always...


$customer = filter_input_array( INPUT_POST );

$customer_records = validate_array( $customer["customer_record"] );

print_r($customer_records);

function validate_array( $input_array) {
    $value = validate_first_name($input_array[0]);
    $value = validate_last_name($input_array[1]);
    $value = validate_address($input_array[2]);
    $value = validate_city($input_array[3]);
    $value = $input_array[4];
    return $input_array;
}

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

$json = json_encode($customer_records);

print_r($json . "<br>");



?>