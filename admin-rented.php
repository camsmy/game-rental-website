<?php
include 'head.php';
include 'adblock.php';
include 'admin-navigation.php';
include 'opendb.php';
include 'penalty.php';
?>
<section>
    <div class = "adrent-container">
        <table class = "adrent-table">
           <tr class = "row adrent-row">
           <th class = "col adrent-labels text-align-center"><h5>Order No.</h5></th>
           <th class = "col adrent-labels text-align-center"><h5>Customer</h5></th>
           <th class = "col adrent-labels text-align-center"><h5>Product Name</h5></th>
           <th class = "col adrent-labels text-align-center"><h5>Duration</h5></th>
           <th class = "col adrent-labels text-align-center"><h5>Deadline</h5></th>
           <th class = "col adrent-labels text-align-center"><h5>Price</h5></th>
           <th class = "col adrent-labels text-align-center"><h5>Penalty</h5></th>
           <th class = "col adrent-labels text-align-center">&nbsp;</th></tr>
           <div class = "adrent-items">
               <?php
                    if($DBConnect === false){
                       die("ERROR: Could not connect. " . mysqli_connect_error());
                       }
                       
                       $sql = "SELECT order_id, rent_game, customer, deadline, penalty FROM rented ORDER BY deadline ASC";
                       $result = mysqli_query($DBConnect, $sql);


                       if (mysqli_num_rows($result) > 0) {
                           while($row = mysqli_fetch_assoc($result)) {
                                $late = false;
                                $duedate = $row["deadline"];
                                $date1 = date_create($duedate);
                                if($date1 < date_create()){
                                    $late = true;
                                }
                                $diff = date_diff($date1, date_create());
                                $duration = $diff->format("%a days");
                                $id = $row["rent_game"];
                           ?>
                               <tr class = "adrent-itemrow row">
                                    <th class="col adrent-list text-align-center"><?php echo $row["order_id"]; ?></th>
                                    <?php 
                                        $game_get = "SELECT gname, price FROM gameinfo WHERE sku = '$id'";
                                        $query = mysqli_query($DBConnect, $game_get);
                                        if (mysqli_num_rows($query) > 0) {
                                            while($info = mysqli_fetch_assoc($query)) {
                                                $game_name = $info["gname"];
                                                $game_price = $info["price"];
                                            }
                                        }
                                    ?>
                                    <th class="col adrent-list text-align-center"><?php echo $row["customer"]; ?></th>
                                    <th class="col adrent-list text-align-center"><?php echo $game_name; ?></th>
                                    <?php if($late == true){?>
                                        <th class="col adrent-late text-align-center"><?php echo "-".$duration; ?></th>
                                    <?php }else{ ?>
                                        <th class="col adrent-list text-align-center"><?php echo $duration; ?></th>
                                    <?php }?>
                                    <th class="col adrent-list text-align-center"><?php echo $row["deadline"]; ?></th>
                                    <th class="col adrent-list text-align-center"><?php echo number_format($game_price,2); ?></th>
                                    <th class="col adrent-list text-align-center"><?php echo $row["penalty"]; ?></th>
                                    <form method="post" action="admin-rented.php">
                                        <th class="col text-align-center">
                                        <input type="submit" class = "adrent-button" style="width:auto;" name="delete" value="Delete"/>
                                        </th>
                                        <input type="hidden" name="sku" value="<?php echo $row["rent_game"];?>"">
                                        <input type="hidden" name="id" value="<?php echo $row["order_id"]; ?>"/>
                                    </form>
                                </tr>
                        <?php    
                                }
                            } 
                        ?>
           </div>    
        </table>
    </div>

    <?php
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sku = $_POST['sku'];
        if($DBConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $query = mysqli_query($DBConnect,"SELECT * from gameinfo where sku ='$sku'") or die("ERROR");
        $game = mysqli_fetch_array($query);
        $avail = $game['avail']+1;
        $rent = $game['rent']-1;
        $sql = "DELETE FROM rented WHERE order_id = '$id';
        UPDATE gameinfo SET avail=$avail,rent=$rent WHERE sku ='$sku';
        ";
        if (mysqli_multi_query($DBConnect, $sql)) {
            mysqli_close($DBConnect);
            echo '<script>window.location = "admin-rented.php";</script>';
        } else {
            echo "Error deleting of game";
        }
    }
?>   
</section>