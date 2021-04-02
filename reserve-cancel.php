<?php
$id = $_POST['id'];

include 'opendb.php';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$link = mysqli_connect("localhost", "root", "password", "dbname");
// Check connection
if($DBConnect === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}

// sql to delete a record
$game = mysqli_query($DBConnect,"SELECT res_game from reserved WHERE order_id = $id");
$rgame = mysqli_fetch_array($game);
$sql = "DELETE FROM reserved WHERE order_id = $id"; 

if (mysqli_query($DBConnect, $sql)) {
    $sku = $rgame['res_game'];
    $query = mysqli_query($DBConnect,"SELECT avail,reserve from gameinfo WHERE sku ='$sku'") or die("ERROR");
    $gamestatus = mysqli_fetch_array($query); 
    $reserve = $gamestatus['reserve']-1;
    $avail = $gamestatus['avail']+1;
    mysqli_query($DBConnect,"UPDATE gameinfo SET avail = $avail, reserve = $reserve WHERE sku = '$sku'") or die("ERROR UPDATE");
    mysqli_close($DBConnect);
    switch($_SESSION['user']):
        case "admin": header('location: admin-reserved.php'); exit; break;
        default: header('Location: reservation-list.php'); exit; break;
    endswitch;
} else {
    echo "Error deleting record";
}

?>