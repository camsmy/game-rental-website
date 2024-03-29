<?php
    include 'head.php'; 
    include 'opendb.php';
    include 'penalty.php';
?>

<body>
<body>
    <?php
    include 'customer-navigation.php';
    include 'block.php';
    ?>
    
    <div class="rented-container">
        <div class="rented-header">
            <div class= "row text-align-center rented-top">
                <div class= "col-xl-7 rented-title p-2 ">
                    <h2>RENTED LIST</h2>
                </div>
            </div>
        </div>
        <div class="rented-body">
            <div class="row rented-detail-head">
                <div class="col rented-detail-title"><h4>ORDER ID</h4></div>
                <div class="col rented-detail-title"><h4>NAME</h4></div>
                <div class="col rented-detail-title"><h4>DEADLINE</h4></div>
                <div class="col rented-detail-title"><h4>PENALTY</h4></div>
            </div>
            <?php
            /* Attempt MySQL server connection. Assuming you are running MySQL
            server with default setting (user 'root' with no password) */
            //$link = mysqli_connect("localhost", "root", "password", "dbname");
            // Check connection

            if($DBConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $user = $_SESSION['user'];
            $sql = "SELECT order_id, rent_game, deadline, penalty FROM rented WHERE customer='$user' ORDER BY deadline ASC";
            $result = mysqli_query($DBConnect, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $game = mysqli_fetch_array(mysqli_query($DBConnect,"SELECT gname FROM gameinfo WHERE sku='".$row['rent_game']."'")); //game name and price 
                    echo '<div class="row rented-detail-head">';
                        echo '<div class="col rented-detail-text"><p>'.getOID($row["order_id"]).'</p></div>';
                        echo '<div class="col rented-detail-text"><p>'.$game["gname"].'</p></div>';
                        echo '<div class="col rented-detail-text"><p>'.$row["deadline"].'</p></div>';
                        echo '<div class="col rented-detail-text"><p>'.number_format($row["penalty"],2).'</p></div>';
                    echo '</div>';
                }
            } 
            // Close connection
            mysqli_close($DBConnect);
            function getOID($order_id) {
                $temp = date("Ymd");
                $ID = "";
                for($i =0; $i< strlen($temp); $i++){
                    if($i > 1)
                    {
                        $ID= $ID.$temp[$i];
                    }
                }
                return $ID. "R7MT" . $order_id;
            }
            ?>
        </div>
    </div>

    <div class="custom-shape-divider-top-1614623845 mt-5">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill"></path>
        </svg>
    </div>

    <footer>
        <?php
            include 'footer.php';
        ?>
    </footer>
</body>

</html>