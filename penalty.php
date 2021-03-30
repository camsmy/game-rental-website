<?php
$query = mysqli_query($DBConnect,"SELECT * from rented");
$row = mysqli_num_rows($query);
while($rent = mysqli_fetch_array($query)){
    $id = $rent['order_id'];
    $date1 = date_create($rent['deadline']);
    $duration = date_create() -> diff($date1);
    $interval = $duration->days;
    $duration = $duration->format('%R%a');
    echo $duration;
    switch(substr($duration,0,1)){
        case "+": 
            break;
        case "-": 
                $penalty = 100*$interval;
                mysqli_query($DBConnect,"UPDATE rented SET penalty=$penalty WHERE order_id = $id") or die("ERROR");
            break;
    }
}

?>