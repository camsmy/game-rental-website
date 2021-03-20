<?php
include 'head.php';
?>

<body>
<?php
if(!isset($_SESSION['user'])){ include 'navigation.php'; }
else{ include 'customer-navigation.php'; }
?>
    <section class="heads-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 section-1 text-align-left head">
                    <div class="col-xl-7 col-xs-12 col-sm-10 col-md-8 col-lg-7">
                        <h1>Play your way and experience gaming at home</h1>
                        <p class="py-2">A Philippine game rental store that aims to make it easy for
                            gamers to play their favorite games in the comfort of their home.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="heads-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 section-1 text-align-left my-5 py-5 col-m">
                    <div class="col-xl-5 col-xs-12 col-md-8 col-lg-7 my-5 py-5 vr-txt">
                        <h1>PlayStation VR games</h1>
                        <p class="my-3">
                        Immerse yourself in over 500 incredible games and experiences with the transformative power of PS VR.
                        <br><br>
                        Home to a unique selection of VR experiences – discover unbelievable new worlds waiting to be explored.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-align-center m-2">
                <h2>Discover New Gaming Experience</h2>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center column-reverse">
                <div class="col-xl-2 px-2">
                    <h3>Easy for Payment</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, hic sapiente officia aperiam sed
                        in omnis eos ab aliquam modi libero, maxime porro vitae sint, ea labore inventore non sit?</p>
                </div>
                <div class="col-xl-2 m-5">
                    <img src="./assets/img/payment.svg" alt="payment">
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center column">
                <div class="col-xl-12 m-5">
                    <img src="./assets/img/playing.svg" alt="playing">
                </div>
                <div class="col-xl-12 px-2">
                    <h3>Play at the comfort of your home</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi exercitationem harum aut
                        ratione odit fugiat officia autem vitae aperiam dolore doloremque, rem alias quia nemo ut
                        maiores atque suscipit aspernatur?
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center column-reverse">
                <div class="col-xl-2 px-2">
                    <h3>More choices and games for you!</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, hic sapiente officia aperiam sed
                        in omnis eos ab aliquam modi libero, maxime porro vitae sint, ea labore inventore non sit?</p>
                </div>
                <div class="col-xl-2 m-5">
                    <img src="./assets/img/games.svg" alt="games">
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