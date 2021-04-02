<?php
include 'head.php';
include 'admin-navigation.php';
include 'opendb.php';
?>

<section>
    <div class= "glist-backcolor">
        <form method="post" action="addgame.php">
                <button type="submit" class = "glist-addbtn" style="width:auto;" name="add">Add New Product</button>
        </form><br><br>
        <div class = "glist-container">
            <div class = "glist-boxy">
               <div class = "row glist-tr">
               <div class = "col glist-labels text-align-center">Product name</div>
               <div class = "col glist-labels text-align-center">Sku</div>
               <div class = "col glist-labels text-align-center">Price</div>
               <div class = "col glist-labels text-align-center">Rent</div>
               <div class = "col glist-labels text-align-center">Reserve</div>
               <div class = "col glist-labels text-align-center">Avail</div>
               <div class = "col glist-labels text-align-center">Total</div>
               <div class = "col text-align-center">&nbsp;</div></div>
               <div class = "glist-contents">
                   <?php
                       if($DBConnect === false){
                           die("ERROR: Could not connect. " . mysqli_connect_error());
                           }
                           $sql = "SELECT gname, sku, price, rent, reserve, avail FROM gameinfo";
                           $result = mysqli_query($DBConnect, $sql);


                           if (mysqli_num_rows($result) > 0) {
                               while($row = mysqli_fetch_assoc($result)) {
                                   $total = $row["rent"] + $row["avail"];
                               ?>
                                   <div class = "glist-tr row">
                                        <div class="col glist-list text-align-center"><?php echo $row["gname"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["sku"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["price"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["rent"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["reserve"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $row["avail"]; ?></div>
                                        <div class="col glist-list text-align-center"><?php echo $total; ?></div>
                                        <form method="post" action="gamelist-update.php" target="popUp" onsubmit="popup(this);">
                                            <div class="col text-align-center">
                                            <input type="submit" class = "glist-button" style="width:auto;" id="myBtn" name="Edit" value="Edit">
                                            </div><input type="hidden" name="sku" value="<?php echo $row["sku"]; ?>"/>
                                        </form>
                                        &nbsp;&nbsp;&nbsp;
                                        <form method="post" action="gamelist.php">
                                            <div class="col text-align-center">
                                            <input type="submit" class = "glist-button" style="width:auto;" name="delete" value="Delete"/>
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
        include 'opendb.php';
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

<script>
    function popup(form) {
        window.open('', 'formpopup', 'view text','menubar=yes,scrollbars=yes,resizable=yes,width=250,height=300');
        form.target = 'formpopup';
    }
    function here() {
        window.focus()
        location.reload();
    }
</script>    
</section>