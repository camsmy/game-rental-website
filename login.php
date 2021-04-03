<?php
include 'head.php';
?>
<body>
<?php
include 'navigation.php';
include 'opendb.php';
if(isset($_SESSION['user'])){
    switch($_SESSION['user']):
        case "admin": echo '<script> window.location="dashboard.php"; </script>'; break;
        default: echo '<script> window.location="games-landing.php"; </script>'; break;
    endswitch;
}
?>
    <div class="login-container position-relative d-flex justify-content-center align-items-center">
    <div class="row login-form">
            <div class="login-info">
                <img src="./assets/img/register.svg" class="p-2 my-5 text-align-center" alt="" />
            </div>
            
            <div class="login-form2 position-relative d-flex justify-content-center align-items-center">

                <form action="formvalidation.inc.php" method="post">
                    <h3 class="login-title text-align-center">Log In</h3>
                <?php
                $fullurl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(strpos($fullurl,"empty")){
                    echo "<p class='login-error text-align-center m-1'>You did not fill in all fields!</p>";
                }
                if(strpos($fullurl,"doesnotexist")){
                    echo "<p class='login-error text-align-center m-1'>User name does not exist!<br>
                    Create an account <a href='signup.php'>here.</a>
                    </p>";
                }
                ?>
                    <div class="login-input-container focus">
                        <input type="text" name="LogIn_username" class="login-input">
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="password" id="password" name="LogIn_password" class="login-input">
                        <i class="far fa-eye" id="eye-show" onclick="showpass()"></i>
                        <i class="far fa-eye-slash" id="eye-hide" onclick="showpass()"></i>
                        <label for="">Password</label>
                        <span>Password</span>
                    </div>
                    <?php    
                if(strpos($fullurl,"Invalid")){
                    echo "<p class='login-error text-align-center m-1'>**Invalid username or password!**</p>";
                }
                ?>
                    <input type="submit" name="LogInSubmit" value="Log in" class="login-btn">
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
    
    <script>
        var state=false;
        function showpass(){
            if(state){
                document.getElementById('password').setAttribute("type","password");
                document.getElementById('eye-show').style.display = "none";
                document.getElementById('eye-hide').style.display = "block";
                state = false;
            }else{
                document.getElementById('password').setAttribute("type","text");
                document.getElementById('eye-show').style.display = "block";
                document.getElementById('eye-hide').style.display = "none";
                state = true;
            }
        }
    </script>
</body>

</html>