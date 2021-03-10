<?php //DONE (Opens database)
ERROR_REPORTING(E_NOTICE ^E_ALL);
$DBConnect = mysqli_connect("localhost","root","", "dbkejps") or die("Unable to connect".mysql_error());
mysqli_select_db($DBConnect,"game-rental-website");
?>