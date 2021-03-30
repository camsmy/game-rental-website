<?php //this php is for SQL code
include 'opendb.php';
mysqli_query($DBConnect,"ALTER TABLE rented MODIFY penalty DOUBLE default 0;") or die("Unable to connect".mysql_error());
?>