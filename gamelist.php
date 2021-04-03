<?php
include 'head.php';
include 'admin-navigation.php';
include 'adblock.php';
include 'opendb.php';

if(isset($_POST['Edit'])){
    $_SESSION['sku'] = $_POST['sku'];
    header("location: editgame.php");
}
?>
<section>
    <div class= "glist-backcolor">
        <form method="post" action="addgame.php">
                <button type="submit" class = "glist-addbtn red" style="width:auto;" name="add">Add New Product</button>
        </form><br><br>
        <div class = "glist-container">
            <div class = "glist-boxy">
               <div class = "row glist-tr">
               <div class = "col glist-labels text-align-center"><h4>Game</h4></div>
               <div class = "col glist-labels text-align-center"><h4>Sku</h4></div>
               <div class = "col glist-labels text-align-center"><h4>Price</h4></div>
               <div class = "col glist-labels text-align-center"><h4>Rent</h4></div>
               <div class = "col glist-labels text-align-center"><h4>Reserve</h4></div>
               <div class = "col glist-labels text-align-center"><h4>Avail</h4></div>
               <div class = "col glist-labels text-align-center"><h4>Total</h4></div>
               <div class = "col text-align-center">&nbsp;</div></div>
               <div class = "glist-contents">
                   <?php
                       if($DBConnect === false){
                           die("ERROR: Could not connect. " . mysqli_connect_error());
                           }
                           $sql = "SELECT gname, sku, price, rent, reserve, avail FROM gameinfo";
                           $result = mysqli_query($DBConnect, $sql);


                           if (mysqli_num_rows($result) > 0) {
                               $_SESSION['count'] = 0;
                               while($row = mysqli_fetch_assoc($result)) {
                                   $total = $row["rent"] + $row["avail"];
                                   $_SESSION['count']++;
                               ?>
                                   <div class = "glist-tr row">
                                        <div class="col glist-list text-align-center"><?php echo $row["gname"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["sku"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["price"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["rent"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["reserve"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["avail"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $total; ?></div>
                                        <form method="post">
                                            <div class="col text-align-center">
                                            <input type="submit" class = "glist-button violet" style="width:auto;" name="Edit" value="Edit">
                                            </div><input type="hidden" name="sku" value="<?php echo $row["sku"]; ?>"/>
                                        </form>
                                        &nbsp;&nbsp;&nbsp;
                                        <form method="post" action="gamelist.php">
                                            <div class="col text-align-center">
                                            <input type="submit" class = "glist-button red" style="width:auto;" name="delete" value="Delete"/>
                                            </div>
                                            <input type="hidden" name="sku" value="<?php echo $row["sku"]; ?>"/>
                                        </form>
                                   </div>
                           <?php    
                               }
                           } $DBConnect -> close();
                   ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['delete'])){
        $id = $_POST['sku'];
        $isGood = true;
        include 'opendb.php';
        if($DBConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
            }
        $isrented = $isreserved = "";
        $query = mysqli_query($DBConnect,"SELECT rent_game from rented") or die("ERROR");
        while($rentgame = mysqli_fetch_array($query)){
            if($id==$rentgame['rent_game'])
                $isGood = false;
        }
        $query = mysqli_query($DBConnect,"SELECT res_game from reserved") or die("ERROR");
        while($resgame = mysqli_fetch_array($query)){
            if($id==$resgame['res_game'])
                $isGood = false;
        }
        if(!$isGood)
            echo '<script>alert("Game still rented/reserved!");</script>';
        else{
            $sql = "DELETE FROM gameinfo WHERE sku = '$id'";
            if (mysqli_query($DBConnect, $sql)) {
                mysqli_close($DBConnect);
                echo '<script>location.reload();</script>';
            } else {
                echo "Error deleting of game";
            }
        }
    }
?>
</section>