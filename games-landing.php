<?php
include 'head.php';
?>

<body>
    <?php
include 'customer-navigation.php';
if(isset($_SESSION['user'])){
    echo '<script> alert("Login first!"); </script>';
    echo '<script> window.location="login.php"; </script>';
}
?>
<section>
<div class="hero-image">
  <div class="col-xl-4 hero-text">
    <h2>PS4 games</h2>
    <h5>Experience an overwhelming generation of critically-acclaimed games, including stand-out exclusives from PlayStation Studios.
</h5>
  </div>
</div>
</section>
    <section>
        <div class="container">
            <div class="row text-align-center  m-2">
                <div class="col-xl-12">
                    <h2>Categories</h2>
                </div>
            </div>
        </div>
    </section>
    <?php
    $bgimg = array("adventure.jpg", "horror.png", "action.jpg","sports.jpg","fighting.jpg","shooting.jpg");
            $categories = array("Adventure","Horror","Action","Sports","Fighting","Shooter");
    ?>
    <section>
        <div class="container">
            <div class="row my-2">
            <?php
            for($x=0;$x<=2;$x++){
                    echo "<div class='col-xl-3 categories m-1'>";
                    echo "<img src='assets/img/".$bgimg[$x]."' alt='categories image'>";
                    echo "<div class='col-xl-12 text-align-center categories-h3'>";
                    echo  "<h3>".$categories[$x]."</h3>";
                    echo   "</div>";
                    echo "</div>";
            }
            ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row my-2">
            <?php
            for($x=3;$x<=5;$x++){
                    echo "<div class='col-xl-3 categories m-1'>";
                    echo "<img src='assets/img/".$bgimg[$x]."' alt='categories image'>";
                    echo "<div class='col-xl-12 text-align-center categories-h3'>";
                    echo  "<h3>".$categories[$x]."</h3>";
                    echo   "</div>";
                    echo "</div>";
            }
            ?>
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