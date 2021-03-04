<?php
//Connecting to sql db.
$connect = mysqli_connect("my host","my user","my password","my db");
//Sending form data to sql db.
mysqli_query($connect,"INSERT INTO SUGGESTIONS (msg) 
VALUES ('$_POST[suggestion-message]')";
?>