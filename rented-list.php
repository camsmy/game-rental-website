<?php
    include 'head.php'; 
?>

<body>
<body>
    <?php
    include 'customer-navigation.php';
    if(isset($_SESSION['user'])){
        echo '<script> alert("Login first!"); </script>';
        echo '<script> window.location="login.php"; </script>';
    }
    ?>
    
    <div class="rented-container">
        <div class="rented-header">
            <div class= "row text-align-center rented-top">
                <div class= "col-xl-7 rented-title p-4 ">
                    RENTED LIST
                </div>
            </div>
        </div>
        <div class="rented-body">
            <div class="row rented-detail-head">
                <div class="col rented-detail-title">ORDER ID</div>
                <div class="col rented-detail-title">NAME</div>
                <div class="col rented-detail-title">DEADLINE</div>
                <div class="col rented-detail-title">PENALTY</div>
            </div>
            <?php
            include 'opendb.php';
            /* Attempt MySQL server connection. Assuming you are running MySQL
            server with default setting (user 'root' with no password) */
            //$link = mysqli_connect("localhost", "root", "password", "dbname");
            // Check connection

            if($DBConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $sql = "SELECT order_id, rent_game, deadline, penalty FROM rented";
            $result = mysqli_query($DBConnect, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="row rented-detail-head">';
                        echo '<div class="col rented-detail-text">'.$row["order_id"].'</div>';
                        echo '<div class="col rented-detail-text">'.$row["rent_game"].'</div>';
                        echo '<div class="col rented-detail-text">'.$row["deadline"].'</div>';
                        echo '<div class="col rented-detail-text">'.$row["penalty"].'</div>';
                    echo '</div>';
                }
            } 
            // Close connection
            mysqli_close($DBConnect);
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