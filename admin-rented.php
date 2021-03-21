<?php
include 'head.php';
include 'admin-navigation.php';
include 'opendb.php';
?>

<section>
    <div class = "adrent-container">
        <table class = "adrent-table">
           <tr class = "row adrent-row">
           <th class = "col adrent-labels text-align-center">Order Number</th>
           <th class = "col adrent-labels text-align-center">Customer</th>
           <th class = "col adrent-labels text-align-center">Product Name</th>
           <th class = "col adrent-labels text-align-center">Duration</th>
           <th class = "col adrent-labels text-align-center">Deadline</th>
           <th class = "col adrent-labels text-align-center">Price</th>
           <th class = "col adrent-labels text-align-center">Penalty</th>
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
                                    <th class="col adrent-list text-align-center"><?php echo $game_price; ?></th>
                                    <th class="col adrent-list text-align-center"><?php echo $row["penalty"]; ?></th>
                                    <form method="post" action="admin-rented.php">
                                        <th class="col text-align-center">
                                        <input type="submit" class = "adrent-button" style="width:auto;" name="delete" value="Delete"/>
                                        </th>
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

        if($DBConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
            }

        $sql = "DELETE FROM rented WHERE order_id = '$id'";

        if (mysqli_query($DBConnect, $sql)) {
            mysqli_close($DBConnect);
        } else {
            echo "Error deleting of game";
        }

    }
?>   
</section>