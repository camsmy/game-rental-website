<?php
include 'head.php';
include 'adblock.php';
include 'admin-navigation.php';
include 'opendb.php';
include 'reserve-autocancel.php';
if(isset($_POST['Cancel'])){
    include 'reserve-cancel.php';
}
if(isset($_POST['Rented'])){
    include 'rentgame.php';
}
?>
    <div class="adminreserved-main_content">
        <div class="adminreserved-header">KEJPlaystation reservation list...</div>
        <div class="adminreserved-info">
            <table class="adreserved-table">
                <thead>
                    <tr class="row adreserved-row">
                        <th class = "col adreserved-labels text-align-center"><h4>Order No.</h4></th>
                        <th class = "col adreserved-labels text-align-center"><h4>Customer</h4></th>
                        <th class = "col adreserved-labels text-align-center"><h4>Product</h4></th>
                        <th class = "col adreserved-labels text-align-center"><h4>Duration</h4></th>
                        <th class = "col adreserved-labels text-align-center"><h4>Pickup</h4></th>
                        <th class = "col adreserved-labels text-align-center"><h4>Price</h4></th>
                        <th class = "col adreserved-labels text-align-center"><h4>Deadline</h4></th>
                        <th class = "col adreserved-labels text-align-center">&nbsp;</th></tr>
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
                        echo '<td>'.number_format($game['price'],2).'</td>';
                        ?>
                        <form method="post">
                            <?php $today = date_format(date_add(date_create(),date_interval_create_from_date_string("1 day")),"Y-m-d");
                            $max = date_format(date_add(date_create(),date_interval_create_from_date_string("14 days")),"Y-m-d");
                            ?>
                            <td><input class="adreserved-date"type="date" min="<?php echo $today;?>" max="<?php echo $max; ?>" name="rent" required></td>
                            <td class="adreserved-btn"><input type="submit" class="adreserved-button violet" name="Rented" value="Rent"></td>
                            <td class="adreserved-btn"><input type="submit" class="adreserved-button red" name="Cancel" value="Cancel"></td>
                            <input type="hidden" name="id" value="<?php echo $res['order_id'];?>">
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
