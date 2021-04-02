<?php
include 'head.php';
?>

<body>
<?php
include 'navigation.php';
include 'opendb.php';// OPENS THE DATABASE
?>
    <div class="login-container position-relative d-flex justify-content-center align-items-center">
        <div class="row login-form">
            <div class="signup-form2 position-relative d-flex justify-content-center align-items-center">

                <form name="signup" method="post" action="formvalidation.inc.php">
                    <h3 class="login-title text-align-center">Sign up</h3>
                    <?php
                $fullurl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(strpos($fullurl,"success")){
                echo "";
                 echo "<p class='error text-align-center m-1'>
                 <i class='fas fa-check-circle text-align-center'></i>
                 You have signed up<br>successfully!</p>";
                }
                if(strpos($fullurl,"empty")){
                   echo "<p class='error text-align-center m-1'>You did not fill in all the fields!</p>";
                }
                if(strpos($fullurl,"invalidphone")){
                     echo "<p class='error text-align-center m-1'>Your phone is invalid!</p>";
                }
                if(strpos($fullurl,"invalidemail")){
                     echo "<p class='error text-align-center m-1'>Your email is invalid!</p>";
                }
                if(strpos($fullurl,"exist")){
                 echo "<p class='error text-align-center m-1'>The username you entered<br>already exist!</p>";
                }
                ?>
                    <div class="login-input-container focus">
                        <?php
                        if(isset($_GET['fname'])){
                            $fname = $_GET['fname'];
                            echo '<input type="text" name="fname" class="login-input" value="'.$fname.'">';
                        }else{
                            echo '<input type="text" name="fname" class="login-input">';
                        }
                        ?>
                        <label for="">First Name</label>
                        <span>First Name</span>
                    </div>
                    <div class="login-input-container focus">
                        <?php
                        if(isset($_GET['mname'])){
                            echo '<input type="text" name="mname" class="login-input" value="'.$_GET['address'].'">';
                        }else{
                            echo '<input type="text" name="mname" class="login-input">';
                        }
                        ?>
                        <label for="">Middle Name</label>
                        <span>Middle Name</span>
                    </div>
                    <div class="login-input-container focus">
                    <?php
                        if(isset($_GET['lname'])){
                            echo '<input type="text" name="lname" class="login-input" value="'.$_GET['address'].'">';
                        }else{
                            echo '<input type="text" name="lname" class="login-input">';
                        }
                        ?>
                        <label for="">Last Name</label>
                        <span>Last Name</span>
                    </div>
                    <div class="login-input-container focus">
                    <?php
                        if(isset($_GET['address'])){
                            echo '<input type="text" name="address" class="login-input" value="'.$_GET['address'].'">';
                        }else{
                            echo '<input type="text" name="address" class="login-input">';
                        }
                        ?>
                        <label for="">Address</label>
                        <span>Address</span>
                    </div>
                    <div class="login-input-container focus">
                    <?php
                        if(isset($_GET['phonenum'])){
                            echo '<input type="text" name="phonenum" class="login-input phonenum" value="'.$_GET['phonenum'].'">';
                        }else{
                            echo '<input type="text" name="phonenum" class="login-input">';
                        }
                        ?>
                        <label for="">Contact Number</label>
                        <span>Contact Number</span>
                    </div>
                    <div class="login-input-container focus">
                    <?php
                        if(isset($_GET['username'])){
                            echo '<input type="text" id="username"name="uname" class="login-input address" onclick="checkusername()" value="'.$_GET['username'].'">';
                        }else{
                            echo '<input type="text" id="username"name="uname" class="login-input address" onclick="checkusername()">';
                        }
                        ?>
                        <!-- <input type="text" id="username"name="uname" class="login-input address" onclick="checkusername()"> -->
                        <label for="">Username</label>
                        <span>Username</span>
                        <p class='note text-align-center m-1' id="note">Username cannot be changed after<br>signing up.</p>
                    </div>
                    <div class="login-input-container focus">
                        <input type="password" name="password" class="login-input" id="password">
                        <i class="far fa-eye" id="eye-show" onclick="showpass()"></i>
                        <i class="far fa-eye-slash" id="eye-hide" onclick="showpass()"></i>
                        <label for="">Password</label>
                        <span>Password</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="text" name="email" class="contact-input">
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <input type="submit" name="SignUpSubmit" value="Sign Up" class="login-btn">
                </form>

            </div>

            <div class="login-info">
                <img src="./assets/img/signup.svg" class="p-2 my-5 text-align-center" alt="" />
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat ex, nisi omnis similique debitis
                    culpa ipsum laborum, repellendus, laboriosam impedit perferendis quasi. Omnis sequi in eaque vero
                    autem accusamus hic.</p>
            </div>
            <script>
        var state=false;
        function showpass(){
            if(state){
                document.getElementById('password').setAttribute("type","password");
                document.getElementById('eye-show').style.display = "none";
                document.getElementById('eye-hide').style.display = "block";
                state = false;
            }else{
                document.getElementById('password').setAttribute("type","password");
                document.getElementById('eye-show').style.display = "block";
                document.getElementById('eye-hide').style.display = "none";
                state = true;
            }
        }

        function checkusername(){
            if(document.getElementById('username')===document.activeElement){
                document.getElementById('note').style.display = "block";
            }
        }
    </script>
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