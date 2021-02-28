<?php
include 'head.php';
?>

<body>
    <?php
include 'navigation.php';
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 section-1 text-align-center position-relative head">
                    <img src="./assets/img/imghead.png" alt="img-header" class="img-m">
                    <img src="./assets/img/imgm.jpg" alt="img-header" class="img-d">
                    <div class="col-xl-7 col-xs-12 position-absolute head-txt">
                        <h2>Play your way and experience of gaming at home</h2>
                        <p class="p-2">A Philippine game rental store that aims to make it easy for
                            gamers to play their favorite games in the comfort of their home.
                        </p>
                        <form id="search-form-head" role="form" method="post" action="www.google.com" target="_blank">
                            <input type="text" class="search-form" placeholder="Search" id="search" name="search">
                            <button type="button" class="btn-search">Search</button>
                        </form>
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
                <div class="col-xl-12 m-5 m-5">
                    <img src="./assets/img/playing.svg" alt="playing">
                </div>
                <div class="col-xl-12 px-2">
                    <h3>Play at the comfoprt of your home</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi exercitationem harum aut ratione odit fugiat officia autem vitae aperiam dolore doloremque, rem alias quia nemo ut maiores atque suscipit aspernatur?
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

    <footer class="mt-5">
    <?php
include 'footer.php';
?>
    </footer>
</body>

</html>