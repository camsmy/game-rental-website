<?php //                                        DESIGN KULANG
include 'head.php';
?>
<body>
<?php
if(!isset($_GET['gname']))

    echo '<script> window.location="gamegallery.php"; </script>';
include 'customer-navigation.php';
include 'block.php';
include 'opendb.php';
$game = $_GET['gname'];
$gameinfo = array();
$rented=$reserved=0;
$query = mysqli_query($DBConnect, "SELECT * FROM gameinfo WHERE sku = '$game';");
while($games=mysqli_fetch_array($query)){
    $rented = $games['rent'];
    $reserved = $games['reserve'];
    array_push($gameinfo,$games['gname'],$games['price'],$games['avail'],$games['img'],$games['genre'],$games['gdesc']);
}
//[0] -> gname ; [1] -> price ; [2] -> avail ; [3] -> img ; [4] -> genre ; [5] -> gdesc;
?>
<?php
if(isset($_POST['Rent'])){
    include 'reservegame.php';
}
?>
<section>
        <div class="container">
            <div class="row text-align-center  m-2">
                <div class="col-xl-12">
                    <h2>Rent a game</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container gameinfo-container">
            <div class="gameinfo-row d-flex">
                <div class="col-sm-12 gameinfo-col-1">
                <?php  echo '<img src="data:image/jpeg;base64,'.base64_encode($gameinfo[3]).'" class="gameinfo-img">'; ?>
                </div>
                <div class="column gameinfo-col-2">
                    <?php echo '<h2>'.$gameinfo[0].'</h2>';
                        echo '<p>'.$gameinfo[5].'</p>';
                        echo '<h3><b>Php '.number_format($gameinfo[1],2).'</b></h3>';
                    ?>
                    <form action="" method="post">
                        <?php $today = date_format(date_add(date_create(),date_interval_create_from_date_string("1 day")),"Y-m-d");
                        $max = date_format(date_add(date_create(),date_interval_create_from_date_string("14 days")),"Y-m-d");
                        ?>
                        <input type="date" class="gameinfo-date" min="<?php echo $today;?>" max="<?php echo $max; ?>" name="pick" required> Choose date to pick up
                        <br><input type="submit" class="gameinfo-btn" value="Reserve the Game" name="Rent">
                        <?php
                          $fullurl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                          if(strpos($fullurl,"success")){
                           echo "<p class='error m-1'>
                           <i class='fas fa-check-circle text-align-center'></i>
                           Game has been reserved!</p>";
                          }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
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