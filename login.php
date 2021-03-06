<?php
include 'head.php';
?>

<body>
    <?php
include 'navigation.php';
?>

    <div class="login-container position-relative d-flex justify-content-center align-items-center">
    <div class="row login-form">
            <div class="login-info">
                <img src="./assets/img/register.svg" class="p-2 my-5 text-align-center" alt="" />
            </div>
            
            <div class="login-form2 position-relative d-flex justify-content-center align-items-center">

                <form action="#" method="post">
                    <h3 class="login-title text-align-center">Log In</h3>
                    <div class="login-input-container focus">
                        <input type="text" name="username" class="login-input">
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="password" name="password" class="login-input">
                        <label for="">Password</label>
                        <span>Password</span>
                    </div>
                    <input type="submit" value="Log in" class="login-btn">
                </form>
                
            </div>
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