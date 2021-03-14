<?php //this php is for SQL code
include 'opendb.php';
mysqli_query($DBConnect,"ALTER TABLE gameinfo ADD genre varchar(255);") or die("Unable to connect".mysql_error());
?>