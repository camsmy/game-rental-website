<?php
$query = mysqli_query($DBConnect,"SELECT * from reserved");
$row = mysqli_num_rows($query);
while($res = mysqli_fetch_array($query)){
    $late = false;
    $id = $res['order_id'];
    $sku = $res['res_game'];
    $date1 = date_create($res['pickup']);
    if($date1 < date_create()){
        $late = true;
    }
    if($late){
        $game = mysqli_query($DBConnect,"SELECT * from gameinfo WHERE sku='$sku'") or die("ERROR");
        $games = mysqli_fetch_array($game);
        $reservedg = $games['reserve'];
        $reservedg -=1;
        $avail = $games['avail'];
        $avail+=1;
        $cust = $res['customer'];
        $pu = $res['pickup'];
        mysqli_multi_query($DBConnect,"UPDATE gameinfo SET reserve = $reservedg, avail = $avail WHERE sku='$sku'; DELETE from reserved WHERE pickup='$pu' AND customer ='$cust';") or die("ERRORS");
    }
}
mysqli_close($DBConnect); 
include 'opendb.php';
?>