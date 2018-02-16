<?php

// variable declaration
$fname = "";
$lname = "";
$email    = "";
$mobile = "";
$address = "";
$errors = array(); 
$_SESSION['success'] = "";

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "grab_bus";
$prefix = "";

// connect to database
$db = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $db) or die("Could not select database");

?>