<?php

// Add to Database

echo (" Multi Arrays From SQLITE: <br>");
// $ver = SQLite3::version();

// Only on POST
if ($_POST ) {

    $customer = filter_input_array( INPUT_POST );
    $customer_info = $customer['customer_record'];

    // print_r($ver);
    if (
        // $db = sqlite_open('test', 0666, $sqliteerror)
        $db = new SQLite3('test.sqlite')
        ) { 
        print_r('In database<br>');
        $db->exec("CREATE TABLE friends(id INTEGER PRIMARY KEY, firstName TEXT, lastName TEXT, address1 TEXT, city TEXT, zipcode Text)");
            $db->exec("INSERT INTO friends(firstName , lastName , address1 , city , zipcode) 
                VALUES ('Hello','Hello','Hello','Hello','Hello')
            ");
        
        $res = $db->query('SELECT * FROM friends');
        while ($res = $res->fetchArray() ) {
            print_r($res); 
        }
    } else {
        print_r('Error');
        die($sqliteerror);
    }

    // print_r($customer_record);

}





echo "<pre>";
// print_r( $customer_record );
echo "</pre>";


?>

