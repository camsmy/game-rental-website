<?php
$id = $_POST['temp'];
echo "$id";

include 'opendb.php';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$link = mysqli_connect("localhost", "root", "password", "dbname");
// Check connection
if($DBConnect === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM reserved WHERE order_id = $id"; 

if (mysqli_query($DBConnect, $sql)) {
    mysqli_close($DBConnect);
    header('Location: reservation-list.php'); 
    exit;
} else {
    echo "Error deleting record";
}

?>