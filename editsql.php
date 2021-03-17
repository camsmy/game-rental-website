<?php //this php is for SQL code
include 'opendb.php';
mysqli_query($DBConnect,"ALTER TABLE reserved ADD price double;") or die("Unable to connect".mysql_error());
?>