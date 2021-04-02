<?php
//include 'opendb.php';
$id = $_POST['id'];
$reserve = mysqli_fetch_array(mysqli_query($DBConnect,"SELECT * from reserved WHERE order_id=$id")) or die("WEW");
$rentg = $reserve['res_game'];
$customer = $reserve['customer'];
$deadline = $_POST['rent'];
$gameinfo = mysqli_fetch_array(mysqli_query($DBConnect,"SELECT * from gameinfo WHERE sku='$rentg'"));
$totalres = $gameinfo['reserve']-1;
$totalrent = $gameinfo['rent']+1;
mysqli_multi_query($DBConnect,"INSERT INTO rented(order_id,rent_game,customer,deadline) VALUES ('$id','$rentg','$customer','$deadline');
DELETE from reserved WHERE order_id=$id;
UPDATE gameinfo SET reserve = $totalres, rent=$totalrent WHERE sku='$rentg';
") or die("ERROR RENTING THE GAME");
unset($_POST['Rented']);
mysqli_close($DBConnect);
include 'opendb.php';
?>