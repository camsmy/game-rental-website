<?php
include 'head.php';
?>

<body>
    <?php
include 'customer-navigation.php';

?>
    <section>
        <div class="container">
            <div class="row text-align-center  m-2">
                <div class="col-xl-12">
                    <h2>Categories</h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <?php
            $bgimg = array("adventure.jpg", "horror.png", "action.jpg","sports.jpg");
        ?>
                <!-- <div class="col-xl-4 categories">adventure</div> -->
                <!-- <div class="col-xl-3 col-md-6 col-sm-12 categories mx-1"
                    style="background-image: url('assets/img/<?php echo $bgimg[1];?>');">Horror</div>
                <div class="col-xl-3 col-md-6 col-sm-12 categories mx-1"
                    style="background-image: url('assets/img/<?php echo $bgimg[1];?>');">Horror</div>
                <div class="col-xl-3 col-md-6 col-sm-12 categories mx-1"
                    style="background-image: url('assets/img/<?php echo $bgimg[2];?>');">Action</div> -->
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row my-2">
                <div class="col-xl-3 categories mx-1">
                <img src="assets/img/adventure.jpg" alt="playing">
                    <div class="col-xl-12 text-align-center categories-h3">
                    <h3>Adventure</h3>
                    </div>
                </div>
                <!-- <div class="col-xl-3 categories mx-1"
                    style="background-image: url('assets/img/adventure.jpg');">
                    <div class="col-xl-12 text-align-center">
                    <h3>Horror</h3>
                    </div>
                </div> -->
                <div class="col-xl-3 categories mx-1">
                <img src="assets/img/adventure.jpg" alt="playing">
                    <div class="col-xl-12 text-align-center categories-h3">
                    <h3>Adventure</h3>
                    </div>
                </div>
                <div class="col-xl-3 categories mx-1">
                <img src="assets/img/adventure.jpg" alt="playing">
                    <div class="col-xl-12 text-align-center categories-h3">
                    <h3>Adventure</h3>
                    </div>
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