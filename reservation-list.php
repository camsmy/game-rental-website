<?php
    include 'head.php'; 
?>
<body>
    <?php
    include 'customer-navigation.php';
    include 'block.php';
    ?>
    <div class="reserve-container">
        <div class="reserve-header">
            <div class= "row text-align-center reserve-top">
                <div class= "col-xl-7 reserve-title p-2">
                    <h2>RESERVATION LIST</h2>
                </div>
            </div>
        </div>
        <div class="reserve-body">
            <div class="row reserve-detail-head">
                <div class="col reserve-detail-title"><h4>ORDER ID</h4></div>
                <div class="col reserve-detail-title"><h4>NAME</h4></div>
                <div class="col reserve-detail-title"><h4>PICK UP DATE</h4></div>
                <div class="col reserve-detail-title"><h4>PRICE</h4></div>
                <div class="col"></div>
            </div>
            <?php
            include 'opendb.php';
            include 'reserve-autocancel.php';
            /* Attempt MySQL server connection. Assuming you are running MySQL
            server with default setting (user 'root' with no password) */
            //$link = mysqli_connect("localhost", "root", "password", "dbname");
            // Check connection

            if($DBConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $user = $_SESSION['user'];
            $sql = "SELECT order_id, res_game, pickup FROM reserved WHERE customer='$user' ORDER BY pickup ASC";
            $result = mysqli_query($DBConnect, $sql);
            $temp = 0;
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $game = mysqli_fetch_array(mysqli_query($DBConnect,"SELECT gname,price FROM gameinfo WHERE sku='".$row['res_game']."'")); //game name and price
                    echo "<div class='row reserve-detail-head'>";
                        echo "<div class='col reserve-detail-text'>".getOID($row["order_id"])."</div>";
                        echo "<div class='col reserve-detail-text'>".$game['gname']."</div>";
                        echo "<div class='col reserve-detail-text'>".$row["pickup"]."</div>";
                        echo "<div class='col reserve-detail-text'>".$game['price']."</div>";
                        echo "<div class='col reserve-btn-container'>";
                            echo "<form action='reserve-cancel.php' method='POST'>";
                                echo "<input type='hidden' name='id' value='".$row["order_id"]."'>";
                                echo "<input onClick=\"javascript: return confirm('Are you sure you want to cancel ".$row["res_game"]."\'s reservation?');\" type='submit' name='cancel' value='Cancel' class='reserve-btn'>";
                        echo"</form></div>";
                    echo "</div>";
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