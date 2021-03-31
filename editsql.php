<?php //this php is for SQL code
include 'opendb.php';
mysqli_query($DBConnect,"DELETE FROM gameinfo") or die("Unable to connect".mysql_error());
?>