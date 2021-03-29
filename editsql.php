<?php //this php is for SQL code
include 'opendb.php';
mysqli_query($DBConnect,"ALTER TABLE rented ADD price DOUBLE;") or die("Unable to connect".mysql_error());
?>