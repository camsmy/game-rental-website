<?php
include 'head.php';
?>
<body>
    <?php
include 'customer-navigation.php';
include 'opendb.php';
/*if(!isset($_SESSION['user'])){
    echo '<script> alert("Login first!"); </script>';
    echo '<script> window.location="login.php"; </script>';
}*/
$game = $_SESSION['Search'];
$query = mysqli_query($DBConnect, "SELECT * FROM gameinfo WHERE gname LIKE '%$game%';");
if(mysqli_num_rows($query)==0){
    $display = "No game found!";
}else{
    while($games=mysqli_fetch_array($query)){
        echo $games['gname'].'<br>';
    }
}
?>
<div class="container">
<div class="row">

</div>
</div>

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