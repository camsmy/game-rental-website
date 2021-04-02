<?php
include 'head.php';
include 'adblock.php';
include 'admin-navigation.php';
include 'opendb.php';
if(isset($_POST['Delete'])){
$date = $_POST['date'];
$mess = mysqli_real_escape_string($DBConnect,$_POST['mess']);
mysqli_query($DBConnect,"DELETE from suggestion WHERE date='$date' AND message='$mess'");
}
?>
    <div class="adminsuggestion-main_content">
        <div class="adminsuggestion-header">KEJPlaystation suggestions...</div>
        <div class="adminsuggestion-info">
            <table class="adsuggest-table">
                <thead>
                    <tr class="row adsuggest-row">
                        <th class = "col adsuggest-labels text-align-center">Date</th>
                       <th class = "col adsuggest-labels mess-label text-align-center">Suggestions</th>
                    </tr>
                </thead>
                <tbody class="adsuggest-items">
                    <?php
                    $query = mysqli_query($DBConnect,"SELECT * from suggestion ORDER BY date DESC");
                    while($suggest = mysqli_fetch_array($query)){
                        echo '<tr class="row adsuggest-itemrow">';
                        echo '<td>'.$suggest['date'].'</td>';
                        echo '<td class="adsuggest-mess">'.$suggest['message'].'</td>';
                        ?>
                        <td class="adsuggest-btn">
                        <form method="post">
                            <input type="submit" class="adsuggest-button" name="Delete" value="Delete">
                            <input type="hidden" name="date" value="<?php echo $suggest['date']; ?>">
                            <input type="hidden" name="mess" value="<?php echo $suggest['message']; ?>">
                        </form></td>
                        <?php
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
