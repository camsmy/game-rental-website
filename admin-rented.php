<?php
include 'head.php';
include 'admin-navigation.php';
include 'opendb.php';
?>
<section>
        <div class = "adrent-container">
            <div class = "adrent-table">
               <div class = "row adrent-row">
               <div class = "col adrent-labels text-align-center">Order Number</div>
               <div class = "col adrent-labels text-align-center">Customer</div>
               <div class = "col adrent-labels text-align-center">Duration</div>
               <div class = "col adrent-labels text-align-center">Deadline</div>
               <div class = "col adrent-labels text-align-center">Price</div>
               <div class = "col adrent-labels text-align-center">Penalty</div>
               <div class = "col adrent-labels text-align-center">&nbsp;</div></div>
               <div class = "adrent-items">
                   <?php
                       if($DBConnect === false){
                           die("ERROR: Could not connect. " . mysqli_connect_error());
                           }
                           
                           $sql = "SELECT gname, sku, price, rent, avail FROM gameinfo";
                           $result = mysqli_query($DBConnect, $sql);


                           if (mysqli_num_rows($result) > 0) {
                               while($row = mysqli_fetch_assoc($result)) {
                                   $total = $row["rent"] + $row["avail"];
                               ?>
                                   <div class = "adrent-row row">
                                        <div class="col adrent-list text-align-center"><?php echo $row["gname"]; ?></div>
                                        <div class="col adrent-list text-align-center"><?php echo $row["sku"]; ?></div>
                                        <div class="col adrent-list text-align-center"><?php echo $row["price"]; ?></div>
                                        <div class="col adrent-list text-align-center"><?php echo $row["rent"]; ?></div>
                                        <div class="col adrent-list text-align-center"><?php echo $row["avail"]; ?></div>
                                        <div class="col adrent-list text-align-center"><?php echo $total; ?></div>
                                        &nbsp;&nbsp;&nbsp;
                                        <form method="post" action="gamelist.php">
                                            <div class="col text-align-center">
                                            <input type="submit" class = "adrent-button" style="width:auto;" name="delete" value="Delete"/>
                                            </div>
                                            <input type="hidden" name="sku" value="<?php echo $row["sku"]; ?>"/>
                                        </form>
                                   </div>
                           <?php    
                               }
                           } 
                   ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['delete'])){
        $id = $_POST['sku'];

        if($DBConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
            }

        $sql = "DELETE FROM gameinfo WHERE sku = '$id'";

        if (mysqli_query($DBConnect, $sql)) {
            mysqli_close($DBConnect);
        } else {
            echo "Error deleting of game";
        }

    }
?>   
</section>