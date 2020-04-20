<?php

$serv_host  = 'localhost';
$serv_name  = 'test';
$serv_pass  = 'password';
$serv_db    = 'phpTut_module_1';

try {
    $conn = new PDO("mysql:host=$serv_host; dbname=$serv_db", $serv_name, $serv_pass );
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo "Connection success";
} 
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}