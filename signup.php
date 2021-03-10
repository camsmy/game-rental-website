<?php
include 'head.php';
?>

<body>
    <?php
include 'navigation.php';
?>
<?php // OPENS THE DATABASE
include 'opendb.php';
?>
    <div class="login-container position-relative d-flex justify-content-center align-items-center">
        <div class="row login-form">
            <div class="signup-form2 position-relative d-flex justify-content-center align-items-center">

                <form name="signup" method="post">
                    <h3 class="login-title text-align-center">Sign up</h3>
                    <div class="login-input-container focus">
                        <input type="text" name="fname" class="login-input" required>
                        <label for="">First Name</label>
                        <span>First Name</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="text" name="mname" class="login-input" required>
                        <label for="">Middle Name</label>
                        <span>Middle Name</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="text" name="lname" class="login-input" required>
                        <label for="">Last Name</label>
                        <span>Last Name</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="text" name="address" class="login-input address" required>
                        <label for="">Address</label>
                        <span>Address</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="tel" name="phonenum" class="login-input phonenum"
                            placeholder="Format:639-1234-56789" pattern="[0-9]{3}-[0-9]{4}-[0-9]{5}" required>
                        <label for="">Contact Number</label>
                        <span>Contact Number</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="text" name="uname" class="login-input address" required>
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="password" name="password" class="login-input" id="password" required>
                        <label for="">Password</label>
                        <span>Password</span>
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </div>
                    <div class="login-input-container focus">
                        <input type="email" name="email" class="contact-input" required>
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <input type="submit" name="Submit" value="Sign Up" class="login-btn">
                </form>

            </div>

            <div class="login-info">
                <img src="./assets/img/signup.svg" class="p-2 my-5 text-align-center" alt="" />
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat ex, nisi omnis similique debitis
                    culpa ipsum laborum, repellendus, laboriosam impedit perferendis quasi. Omnis sequi in eaque vero
                    autem accusamus hic.</p>
            </div>
            <script>
                function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
        </div>
    </div>
    <?php
    if(isset($_POST['Submit'])){
        $v1 = $_POST['fname'];
        $v2 = $_POST['mname'];
        $v3 = $_POST['lname'];
        $v4 = $_POST['address'];
        $v5 = $_POST['phonenum'];
        $v6 = $_POST['uname'];
        $v7 = $_POST['password'];
        $v8 = $_POST['email'];
        mysqli_query($DBConnect,"INSERT INTO userinfo (fname,mname,lname,address,contactno,uname,pw,email) VALUES ('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8')");
    }?>
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