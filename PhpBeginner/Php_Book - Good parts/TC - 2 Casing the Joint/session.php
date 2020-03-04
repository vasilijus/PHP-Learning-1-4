<?php 

session_start();
$today = date("Y-m-d");

$loginName = $_POST["fullname"];

$_SESSION["today"] = $today;
$_SESSION["login_name"] = $loginName;

echo $_SESSION["login_name"] . " is now logged in.";

?>