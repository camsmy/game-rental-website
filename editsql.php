<?php //this php is for SQL code
include 'opendb.php';
mysqli_multi_query($DBConnect,"ALTER table rented DROP price;") or die("Unable to connect".mysql_error());
?>