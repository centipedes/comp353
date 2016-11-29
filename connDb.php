<?php

// Connection Info

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'admin';
$dbName = 'comp353';

$conn = mysql_connect($dbHost,$dbUsername,$dbPassword) or die('Server Information is not Correct');
mysql_select_db($dbName,$conn) or die('Database Information is not correct'); 

?>