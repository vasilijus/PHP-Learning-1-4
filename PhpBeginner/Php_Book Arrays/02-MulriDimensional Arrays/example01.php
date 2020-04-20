<?php

// Multi Arrays
echo (" Multi Arrays: <br>");
$customer_record[0][0] = "Pete";
$customer_record[0][1] = "Smith";
$customer_record[0][2] = "123 Main";
$customer_record[0][3] = "Atlanta";
$customer_record[0][4] = 30001;
$customer_record[1][0] = "Sally";
$customer_record[1][1] = "Parisi";
$customer_record[1][2] = "101 South";
$customer_record[1][3] = "Atlanta";
$customer_record[1][4] = 30001;

var_dump($customer_record);

$customer = filter_input_array(INPUT_POST);

$customer_info = $customer["customer_record"];

array_push($customer_record, $customer_info);
echo "<pre>";
print_r($customer_record);
echo "</pre>";


?>

