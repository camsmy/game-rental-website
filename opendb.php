<?php //DONE (Opens database)
ERROR_REPORTING(E_NOTICE ^E_ALL);
//Development connection
//$DBConnect = mysqli_connect("localhost","root","", "dbkejps") or die("Unable to connect".mysql_error());
//mysqli_select_db($DBConnect,"game-rental-website");
//Remote Database Connection
$DBConnect = mysqli_connect("remotemysql.com","ghdx0JPusb","RG4qFUd1wH","ghdx0JPusb");
// $DBConnect = mysqli_connect("localhost","root","","kejpsdb");

?>