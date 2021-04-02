<?php
//include 'opendb.php';
$id = $_POST['id'];
$res = mysqli_fetch_array(mysqli_query($DBConnect,"SELECT * from reserved WHERE order_id=$id")) or die("WEW");
$rentg = $res['res_game'];
$customer = $res['customer'];
$deadline = $_POST['rent'];
mysqli_multi_query($DBConnect,"INSERT INTO rented(order_id,rent_game,customer,deadline) VALUES ('$id','$rentg','$customer','$deadline');
DELETE from reserved WHERE order_id=$id;
") or die("ERROR RENTING THE GAME");
unset($_POST['Rented']);
?>