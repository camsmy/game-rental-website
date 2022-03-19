<?php include 'head.php'; include 'adblock.php';?>
<body>
<?php
include 'admin-navigation.php';
include 'opendb.php';
$query = mysqli_query($DBConnect,"SELECT sku,gname,price,rent,reserve from gameinfo WHERE sku='".$_SESSION['sku']."';") or die("ERROR");
$game = mysqli_fetch_array($query);
$isRented = $isReserved = false;
if($game['rent']>0)
    $isRented = true;
if($game['reserve']>0)
    $isReserved = true;
if(isset($_POST['Edit'])){
    $sku = $_POST['sk'];
    $gname = mysqli_real_escape_string($DBConnect,$_POST['gname']);
    $price = $_POST['price'];
    mysqli_query($DBConnect,"UPDATE gameinfo SET sku = '$sku',gname='$gname',price='$price' WHERE sku='".$_SESSION['sku']."';") or die("ERROR UPDATING THE GAME!");
    if($isRented){
        mysqli_query($DBConnect,"UPDATE rented SET rent_game = '$sku' WHERE rent_game ='".$_SESSION['sku']."';") or die("ERROR UPDATING THE rented!");
    }
    if($isReserved){
        mysqli_query($DBConnect,"UPDATE reserved SET res_game = '$sku' WHERE res_game ='".$_SESSION['sku']."';") or die("ERROR UPDATING THE reserved!");
    }
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
                
                ?>
                    <p>SKU:</p><input type="text" name="sk" class="editgame-input" value="<?php echo $game['sku']?>"/>
                </li>
                <li>
                    <p>Game Name:</p><input type="text" name="gname" class="editgame-input " value="<?php echo $game['gname']?>"/>
                </li>
                <li>
                    <p>Price:</p><input type="text" name="price" class="editgame-input" value="<?php echo number_format($game['price'],2)?>"/>
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