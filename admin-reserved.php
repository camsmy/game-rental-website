<?php
include 'head.php';
include 'adblock.php';
include 'admin-navigation.php';
include 'opendb.php';
if(isset($_POST['Cancel'])){
    include 'reserve-cancel.php';
}
if(isset($_POST['Rentg'])){
    include 'rentgame.php';
}
if(isset($_POST['Back'])){
    unset($_POST['Rented']);
}
?>
    <div class="adminreserved-main_content">
        <div class="adminreserved-header">KEJPlaystation reservation list...</div>
        <div class="adminreserved-info">
            <table class="adreserved-table">
                <thead>
                    <tr class="row adreserved-row">
                        <th class = "col adreserved-labels text-align-center">Order Number</th>
                       <th class = "col adreserved-labels text-align-center">Customer</th>
                       <th class = "col adreserved-labels text-align-center">Product</th>
                       <th class = "col adreserved-labels text-align-center">Duration</th>
                       <th class = "col adreserved-labels text-align-center">Pickup</th>
                       <th class = "col adreserved-labels text-align-center">Price</th>
                    </tr>
                </thead>
                <tbody class="adreserved-items">
                    <?php
                    $query = mysqli_query($DBConnect,"SELECT * from reserved ORDER BY pickup ASC");
                    if(mysqli_num_rows($query)!=0){
                    while($res = mysqli_fetch_array($query)){
                        $pickup = $res['pickup'];
                        $pickup = date_create($pickup);
                        $diff = date_diff($pickup, date_create());
                        $duration = $diff->format("%a days");
                        $game = mysqli_fetch_array(mysqli_query($DBConnect,"SELECT gname, price from gameinfo WHERE sku='".$res['res_game']."';"));
                        echo '<tr class="row adreserved-itemrow">';
                        echo '<td>'.$res['order_id'].'</td>';
                        echo '<td>'.$res['customer'].'</td>';
                        echo '<td>'.$game['gname'].'</td>';
                        echo '<td>'.$duration.'</td>';
                        echo '<td>'.$res['pickup'].'</td>';
                        echo '<td>'.$game['price'].'</td>';
                        ?>
                        <form method="post">
                            <?php
                            if(isset($_POST['Rented'])){
                                echo '<script>alert("Choose a deadline");</script>';
                                echo '<td><input type="date" name="rent"></td>';
                            }
                            ?>
                            <td>
                            <?php
                            if(!isset($_POST['Rented'])){
                                echo '<input type="submit" name="Rented" value="Rent">
                                <input type="submit" name="Cancel" value="Cancel">';
                            }else{
                                echo '<input type="submit" name="Rentg" value="Rented">
                                <input type="submit" name="Back" value="Back">';
                            }?>
                            <input type="hidden" name="id" value="<?php echo $res['order_id'];?>">
                        </td>
                        </form>
                        <?php
                        echo '</tr>';
                    }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
