<?php
include 'head.php';
?>

<body>
    <?php
include 'navigation.php';
?>

    <div class="login-container position-relative d-flex justify-content-center align-items-center">
    <!-- <span class="contact-big-circle"></span>   -->
    <div class="row login-form">
            <div class="contact-info">
            <span class="login-circle first position-absolute"></span>
                <h3 class="login-title">New here?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe similique, hic nam necessitatibus
                    excepturi doloremque aliquid quibusdam placeat, aliquam quod adipisci inventore. Ex dolore, saepe
                    quasi alias ab corrupti cum?</p>
                <input type="submit" value="Sign up" class="signup-btn my-3">
                <img src="./assets/img/register.svg" class="text-align-right px-4" alt="" />
            </div>
            
            <div class="login-form2 position-relative  d-flex justify-content-center align-items-center">
                <span class="login-circle one position-absolute"></span>
                <span class="login-circle two position-absolute"></span>

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
                    <input type="submit" value="Log in" class="signup-btn-two">
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