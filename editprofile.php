<?php
include 'head.php'; 
include 'opendb.php';
?>
<body>
<?php
include 'block.php';
include 'navigation.php';
$user = $_SESSION["user"]; 
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT *from student WHERE name='" . $id . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $row["confirmPassword"] ) {
mysqli_query($con,"UPDATE student set password='" . $_POST["newPassword"] . "' WHERE name='" . $id . "'");
$message = "Password Changed Sucessfully";
} else{
 $message = "Password is not correct";
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
                    <input type="checkbox" onclick="myFunction()">Show Password
                </div>
				<br>
				<div class="login-input-container focus">
					<input type="password" name="confirmPassword" class="login-input" id="confirmPassword" required>
                    <label for="">Confirm Password</label>
                    <span>Confirm Password</span>
                </div>
				<br><br>
				<input type="submit" name="Submit" value="Change Password" class="login-btn">
</form>
<br>
<br>
</div>
</div>
</div>
</body>