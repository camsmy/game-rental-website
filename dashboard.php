<?php
include 'head.php';
include 'adblock.php';
include 'admin-navigation.php';
include 'opendb.php';

?>
<div class="adminnavbar-main_content">
<div class="adminnavbar-header">KEJPlaystation game status...</div>
<div class="adminnavbar-info">
<?php
$data = mysqli_query($DBConnect,"SELECT COUNT(*) as reserve from reserved");
$res = mysqli_fetch_array($data);
$data = mysqli_query($DBConnect,"SELECT COUNT(*) as rent from rented");
$rent = mysqli_fetch_array($data);
$data = mysqli_query($DBConnect,"SELECT SUM(avail) as avail from gameinfo");
$avail = mysqli_fetch_array($data);
?>
<div class="container">
<div class="row">
<div class="dashboard-col m-2"><h2>Reserved</h2><div class="dashboard-info"><?php echo $res['reserve'];?></div></div>
<div class="dashboard-col m-2"><h2>Rented</h2><div class="dashboard-info"><?php echo $rent['rent'];?></div></div>
<div class="dashboard-col m-2"><h2>Available</h2><div class="dashboard-info"><?php echo $avail['avail'];?></div></div>
</div>
</div>
</div>
</div>
</div>