<?php
include 'head.php'; 
include 'block.php';
include 'opendb.php';
?>
<body>
<?php
	$user = $_SESSION['user'];
	$pass = $_SESSION['pass'];
	include 'customer-navigation.php';
?>
<div class="login-container position-relative d-flex justify-content-center align-items-center">
	<div class="signup-form2 position-relative d-flex justify-content-center align-items-center">
		<form name="signup" method="post" action="formvalidation.inc.php">
			<h6 class="login-title text-align-center">CHANGE PASSWORD</h6>
			<?php
                $fullurl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(strpos($fullurl,"success")){
                echo "";
                 echo "<p class='error text-align-center m-1'>
                 <i class='fas fa-check-circle text-align-center'></i>
                 Password changed successfully!</p>";
                }
                if(strpos($fullurl,"empty")){
                   echo "<p class='error text-align-center m-1'>You did not fill in all the fields!</p>";
                }
                if(strpos($fullurl,"incorrect")){
                     echo "<p class='error text-align-center m-1'>Incorrect Current Password!</p>";
                }
				if(strpos($fullurl,"match")){
					echo "<p class='error text-align-center m-1'>Password does not match</p>";
			   }
                ?>
			<div><?php if(isset($message)) { echo $message; } ?></div>
			<div class="login-input-container focus">				
				<input type="password" name="password" class="login-input" id="password">
                        <i class="far fa-eye" id="eye-show" onclick="showpass()"></i>
                        <i class="far fa-eye-slash" id="eye-hide" onclick="showpass()"></i>
				<label for="">Current Password</label>
				<span>Current Password</span>
			</div>
			<br>
			<div class="login-input-container focus">
				<input type="password" name="newPassword" class="login-input" id="newPassword">
				<label for="">New Password</label>
				<span>New Password</span>
			</div>
			<br>
			<div class="login-input-container focus">
				<input type="password" name="confirmPassword" class="login-input" id="confirmPassword">
				<label for="">Confirm Password</label>
				<span>Confirm Password</span>
			</div>
			<br><br>
			<input type="submit" name="changePW" value="Change Password" class="login-btn">
		</form>
	</div>
</div>
<script>
	        var state=false;
	        function showpass(){
            if(state){
                document.getElementById('password').setAttribute("type","password");
				document.getElementById('newPassword').setAttribute("type","password");
				document.getElementById('confirmPassword').setAttribute("type","password");
                document.getElementById('eye-show').style.display = "none";
                document.getElementById('eye-hide').style.display = "block";
                state = false;
            }else{
                document.getElementById('password').setAttribute("type","text");
				document.getElementById('newPassword').setAttribute("type","text");
				document.getElementById('confirmPassword').setAttribute("type","text");
                document.getElementById('eye-show').style.display = "block";
                document.getElementById('eye-hide').style.display = "none";
                state = true;
            }
        }
</script>
</body>
</html>