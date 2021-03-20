<?php
include 'head.php';
?>

<body>
    <?php
        if(!isset($_SESSION['user'])){ include 'navigation.php'; }
        else{ include 'customer-navigation.php'; }
    ?>

<?php //down here ?>

    <div class="about-container">
        <div class= "row text-align-center about-top">
            <div class= "col-xl-7 about-title p-4 ">
                About Us!
            </div>
        </div>
    </div>

    <div class="about-container">
        <div class= "row justify-content-center align-items-center column">
            <div class= "col-xl-2 col-lg-6 col-md-10 col-sm-12 col-xs-12 p-2 text-align-center">
                <h3>How We Started...</h3>
                <p><b>KEJ</b> started as a game renting store, having a physical stall located in Imus, Cavite. 
                As the game renting community grows larger, KEJ decided to expand its business online to reach larger audience.
                With a goal to make PS4 games more accessible and playable to many, KEJ offers variety of PS4 games that you can rent with just a quick, simple, and easy steps. </p>
            </div>
            <div class= "col-xl-2 col-lg-6 col-md-10 col-sm-12 col-xs-12 p-2 text-align-center">
                <h3>Additional info...</h3>
                <p>📍Blk. 6 Lot 22 Oak St. Phase A Treelane III Bayan Luma IX (45.79 mi)<br>
                    Imus, Philippines, 4103<br>
                    📞(046) 454 7783<br>
                </p>
            </div>
        </div>
    </div>

    <div class= "about-container">
        <div class= "row justify-content-center align-items-center column">
            <div class= "col-xl-12 text-align-center">
                <iframe class= "about-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.3192859015335!2d120.9309012145432!3d14.408748889924905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d3023bc81a35%3A0xd2b851da72ec97f6!2sTreelane3%20Main%20Rd%2C%20Imus%2C%20Cavite!5e0!3m2!1sen!2sph!4v1615225376220!5m2!1sen!2sph" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <div class= "about-container">
        <div class= "row justify-content-center align-items-center column">
            <div class= "col-xl-12 text-align-center">
            <h3>Connect With Us...</h3>
                <a href="https://www.facebook.com/kej.ps4.rental/">
                    <img class= "about-logo" src="./assets/img/fb.png" alt="KEJ Facebook">
                </a>
            </div>
        </div>
    </div>

<?php //up here ?>

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