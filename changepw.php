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
	if(isset($_POST['changePW'])){
		if($_POST['password']!=$pass){
			echo '<script> alert("Incorrect current password!");</script>';
		}else{
			if($_POST['newPassword']!=$_POST['confirmPassword']){
				echo '<script> alert("New Password and confirm password does not match!");</script>';
			}else{
				$newpass = $_POST['confirmPassword'];
				mysqli_query($DBConnect,"UPDATE userinfo SET pw='".$newpass."' WHERE uname = '".$user."'") or die ("ERROR");
				$_SESSION['pass'] = $newpass;
				echo '<script> alert("Successfully changed!");
				window.location = "profile.php";
				</script>';
			}
		}
	}
?>
<div class="login-container position-relative d-flex justify-content-center align-items-center">
	<div class="signup-form2 position-relative d-flex justify-content-center align-items-center">
		<form name="signup" method="post">
			<h6 class="login-title text-align-center">CHANGE PASSWORD</h6>
			<div><?php if(isset($message)) { echo $message; } ?></div>
			<div class="login-input-container focus">
				<input type="password" name="password" class="login-input" id="password" required>
				<label for="">Current Password</label>
				<span>Current Password</span>
				<input type="checkbox" onclick="myFunction()">Show Password
			</div>
			<br>
			<div class="login-input-container focus">
				<input type="password" name="newPassword" class="login-input" id="newPassword" required>
				<label for="">New Password</label>
				<span>New Password</span>
			</div>
			<br>
			<div class="login-input-container focus">
				<input type="password" name="confirmPassword" class="login-input" id="confirmPassword" required>
				<label for="">Confirm Password</label>
				<span>Confirm Password</span>
			</div>
			<br><br>
			<input type="submit" name="changePW" value="Change Password" class="login-btn">
		</form>
	</div>
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
</body>
</html>