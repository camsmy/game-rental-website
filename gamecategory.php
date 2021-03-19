<?php
include 'head.php';
?>
<body>
<?php
include 'block.php';
include 'customer-navigation.php';
include 'opendb.php';
include 'search.php';
if(!isset($_GET['category'])){
    echo '<script> window.location="games-landing.php"; </script>';
}
?>
<section><!--lalagay pa ako condition-->
    <div class="container">
        <div class="row text-align-center m-2">
            <div class="col-xl-12">
                <h2><?php echo $_GET['category'];?></h2>
            </div>
        </div>
    </div>
</section>
<?php
$cat = $_GET['category'];
$query = mysqli_query($DBConnect, "SELECT * FROM gameinfo WHERE genre = '$cat';");
$gamecount = mysqli_num_rows($query);
$lgames = array();
$temps = array();
if($gamecount==0){
    $display = "No game found!";
}else{
    $temp = 1;
    echo '<section>';
    echo '<div class="gcat-container">';
    while($games=mysqli_fetch_array($query)){        
        if($temp%4 == 1)
        echo '<div class="gcat-row my-2 p-1 justify-content-flex-end align-items-center">';
        echo '<div class="col-sm-1 m-2 p-1 gcat-game align-items-center">';
        echo '<a href="gameinfo.php?gname='.$games['sku'].'"><img src="data:image/jpeg;base64,'.base64_encode($games['img'] ).'" class="gcat-img"></a>';
        echo '<div class="p-1 gcat-text text-align-left"><h2 class="gcat-h2">'.$games['gname'].'</h2><h3 class="gcat-h3">Php '.$games['price'].'</h3></div>';
        echo '</div>';
        if($temp%4==0)
            echo '</div>';
        $temp++;
    }
    echo '</div></section>';
}
?>






<div class="custom-shape-divider-top-1614623845 mt-5">
<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
    <path
        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
        class="shape-fill"></path>
</svg>
</div>
<footer>
<?php
include 'footer.php';
?>
</footer>
</body>

</html>