<?php

// Add to Database

echo (" Multi Arrays From Json file: <br>");
$data_file_loc = ("customer_data.json");
$customer_file = file_get_contents($data_file_loc);
$customer_record = json_decode($customer_file, TRUE);

$customer = filter_input_array( INPUT_POST );
$customer_info = $customer['customer_record'];

array_push($customer_record, $customer_info);

print_r($customer_record);

file_put_contents($data_file_loc, json_encode($customer_record) );



echo "<pre>";
print_r( $customer_record );
echo "</pre>";


?>

