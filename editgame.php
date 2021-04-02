<?php include 'head.php'; include 'adblock.php';?>
<body>
<?php
include 'admin-navigation.php';
include 'opendb.php';
if(isset($_POST['Edit'])){
    $sku = $_POST['sk'];
    $gname = mysqli_real_escape_string($DBConnect,$_POST['gname']);
    $price = $_POST['price'];
    mysqli_query($DBConnect,"UPDATE gameinfo SET sku = '$sku',gname='$gname',price='$price' WHERE sku='$sku'") or die("ERROR UPDATING THE GAME!");
    unset($_SESSION['sku']);
    echo '<script>window.location="gamelist.php";</script>';
}
?>  
<div class="adminnavbar-main_content">
    <div class="editgame-container position-relative d-flex justify-content-center align-items-center">
        <form class="editgame-form form-style-9" method="post">
            <h3 class="edit-game text-align-center">Edit Game</h3>
            <ul><li>
                <?php
                $query = mysqli_query($DBConnect,"SELECT sku,gname,price from gameinfo WHERE sku='".$_SESSION['sku']."';") or die("ERROR");
                $game = mysqli_fetch_array($query);
                ?>
                    <p>SKU:</p><input type="text" name="sk" class="editgame-input" value="<?php echo $game['sku']?>"/>
                </li>
                <li>
                    <p>Game Name:</p><input type="text" name="gname" class="editgame-input " value="<?php echo $game['gname']?>"/>
                </li>
                <li>
                    <p>Price:</p><input type="text" name="price" class="editgame-input" value="<?php echo $game['price']?>"/>
                </li><li>
                    <input type="submit" name="Edit" id="insert" value="Edit Game" class="editgame-input" />
                </li>
            </ul>
        </form>
    </div>
</div>
</div> 
</body> 
</html>