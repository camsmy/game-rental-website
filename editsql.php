<?php //this php is for SQL code
include 'opendb.php';
mysqli_query($DBConnect,"ALTER TABLE reserved CHANGE order_id order_id AUTO_INCREMENT = 0000;") or die("Unable to connect".mysql_error());
?>