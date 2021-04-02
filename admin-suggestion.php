<?php
include 'head.php';
include 'adblock.php';
include 'admin-navigation.php';
include 'opendb.php';
?>
    <div class="adminsuggestion-main_content">
        <div class="adminsuggestion-header">KEJPlaystation suggestions...</div>
        <div class="adminsuggestion-info">
            <table class="adsuggestion-table">
                <thead>
                    <tr class="row adsuggestion-row">
                        <th class = "col adsuggest-labels text-align-center">Date</th>
                       <th class = "col adsuggest-labels text-align-center">Suggestions</th>
                    </tr>
                </thead>
                <tbody class="adsuggestion-items">
                    <?php
                    $query = mysqli_query($DBConnect,"SELECT * from suggestion ORDER BY date DESC");
                    while($suggest = mysqli_fetch_array($query)){
                        echo '<tr class="row adsuggestion-itemrow">';
                        echo '<td>'.$suggest['date'].'</td>';
                        echo '<td>'.$suggest['message'].'</td>';
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
