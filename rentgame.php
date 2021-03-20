<?php
session_start();
include 'opendb.php';
$gameinfo[2]-=1;
$game_title = $gameinfo[0];
$user = $_SESSION['user'];
$price = $gameinfo[1];
$avail = $gameinfo[2];
$pickup = $_POST['pick'];
$reserved+=1;
$query = mysqli_multi_query($DBConnect, "UPDATE gameinfo SET avail = $avail, reserve = $reserved WHERE sku = '$game'; INSERT INTO reserved (res_game,customer,pickup,price) VALUES('$game_title','$user','$pickup','$price');");
echo '<script> alert("Succesfully reserved!"); </script>';
?>