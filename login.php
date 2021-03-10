<?php
include 'head.php';
?>

<body>
    <?php
include 'navigation.php';
?>
<?php
include 'opendb.php';
//mysqli_query($DBConnect,"DELETE from userinfo");
?>
    <div class="login-container position-relative d-flex justify-content-center align-items-center">
    <div class="row login-form">
            <div class="login-info">
                <img src="./assets/img/register.svg" class="p-2 my-5 text-align-center" alt="" />
            </div>
            
            <div class="login-form2 position-relative d-flex justify-content-center align-items-center">

                <form name="signin" method="post">
                    <h3 class="login-title text-align-center">Log In</h3>
                    <div class="login-input-container focus">
                        <input type="text" name="username" class="login-input" id="username">
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="password" name="password" class="login-input" id="password">
                        <label for="">Password</label>
                        <span>Password</span>
                    </div>
                    <input type="submit" name="Submit" value="Log in" class="login-btn" onclick="return loginUser()">
                </form>
            </div>
        </div>
</div>
<script>
function loginUser(){
    var x = document.getElementById("username").value;
    var y = document.getElementById("password").value;
    if(x == "admin"){ //admin access
        if(y =="admin"){
            document.signin.action = "dashboard.php";
            return true;
        }else{
            alert("Invalid username or password!");
        }
    }else{
        var isUser = false;
        <?php
        $data = mysqli_query($DBConnect,"SELECT * from userinfo");
        $total = mysqli_num_rows($data);
        $v1=$v2="";
        if($total!=0){
            while($user=mysqli_fetch_array($data)){
                $v1 = $user['uname'];
                $v2 = $user['pw'];
                ?>
                var username = <?php echo json_encode($v1); ?>;
                var password = <?php echo json_encode($v2); ?>;
                if(username == x){
                    if(password == y){
                        isUser = true;
                    }
                }
                <?php
            }}
            ?>
        if(Boolean(isUser)){
            document.signin.action = "index.php";
            return true;
        }else{
            alert("Invalid username or password!");
        }
    }
}
</script>
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