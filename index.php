<?php
include 'head.php';
?>

<body>
    <?php
include 'navigation.php';
?>
    <!-- <main>
      <section class="glass">
          <div class="container">
            <div class="row text-align-center m-3">
            <h1>Play your way and experience of gaming at home</h1>
            <p>A Philippine game store aims to make it easy for customers to play their game at home.</p>
            </div>
          </div>
      </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div> -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 section-1 text-align-center position-relative head">
                    <img src="./assets/img/imghead.jpg" alt="img-header" class="img-m">
                    <img src="./assets/img/imgm.jpg" alt="img-header" class="img-d">
                    <div class="col-xl-7 col-xs-12 position-absolute head-txt">
                        <h2>Play your way and experience of gaming at home</h2>
                        <p class="p-2">A Philippine game rental store that aims to make it easy for
                            gamers to play their favorite games in the comfort of their home.
                        </p>
                        <!-- <form id="search-form" class="form-inline" role="form" method="post"
                            action="//www.google.com/search" target="_blank">
                            <div class="input-group">
                                <input type="text" class="form-control search-form" placeholder="Search">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary search-btn" data-target="#search-form"
                                        name="q">
                                        <i class="fa fa-search">
                                        </i>
                                    </button>
                                </span>
                            </div>
                        </form> -->
                        <form action="search-form" role="form" method="post" action="www.google.com" target="_blank">
                        <input type="text" class="search-form" placeholder="Search" id="search" name="search">
                        <button type="button" class="btn-search">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>