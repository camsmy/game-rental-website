<?php
include 'head.php';
?>
<body>
<?php
include 'block.php';
include 'customer-navigation.php';
include 'opendb.php';
$user = $_SESSION['user'];
$fullname = $_SESSION['fullname'];
$address = $_SESSION['add'];
$cnum = $_SESSION['connum'];
$email = $_SESSION['email'];
if(isset($_POST['editProfile'])){
  $_SESSION['add'] = $_POST['add'];
  $fullname = explode(" ",$_POST['fname']);
  //$surnames = array("De","Del","Dela","Delos","San","Santa","Sta.");
  $_SESSION['fullname'] = $_POST['fname'];
  $_SESSION['connum'] = $_POST['contact'];
  $_SESSION['email'] = $_POST['email'];
  mysqli_query($DBConnect,"UPDATE userinfo SET fname='".$fullname[0]."',mname='".$fullname[1]."',lname='".$fullname[2]."',address='".$_POST['add']."',
  contactno='".$_POST['contact']."',email='".$_POST['email']."' WHERE uname='".$user."'") or die("ERROR");
  echo '<script>window.location ="profile.php";</script>';
}
if(isset($_POST['back'])){
  unset($_POST['edit']);
}
?>
      <div class="adminnavbar-main_content">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" class="form-style-profile" method="post" enctype="multipart/form-data">
        <div class="edit"><h2>User Information</h2>
        <?php
        if(!isset($_POST['edit'])){
          echo '<input type="submit" name="edit" value="Edit" class="edit-btn">';
        }else{
          echo '<input type="submit" name="back" value="Back" class="edit-btn">';
        }
        ?></div>
        <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Username:</h5>
                    </div>
                    <div class="col-sm-9 text-secondary profile">
                      <?php 
                        echo $user; 
                      ?>
                    </div>
                  </div>
                </div>
              </div>
                  <hr>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Full Name:</h5>
                    </div>
                    <div class="col-sm-9 text-secondary profile">
                    <?php 
                      if(!isset($_POST['edit'])){
                        echo $fullname; 
                      }else{
                        echo '<input type="text" name="fname" class="editprofile-input" value="'.$fullname.'">';
                      }  
                      ?>
                    </div>
                  </div>
                </div>
              </div>
                  <hr>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Home Address:</h5>
                    </div>
                    <div class="col-sm-9 text-secondary profile">
                    <?php 
                      if(!isset($_POST['edit'])){
                        echo $address; 
                      }else{
                        echo '<input type="text" name="add" class="editprofile-input"value="'.$address.'">';
                      }  
                      ?>
                    </div>
                  </div>
                </div>
              </div>
                  <hr>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Contact Number:</h5>
                    </div>
                    <div class="col-sm-9 text-secondary profile">
                    <?php 
                      if(!isset($_POST['edit'])){
                        echo $cnum; 
                      }else{
                        echo '<input type="text" name="contact" class="editprofile-input" placeholder="Format:639-1234-56789" pattern="[0-9]{3}-[0-9]{4}-[0-9]{5}" value="'.$cnum.'">';
                      }  
                      ?>

                    </div>
                  </div>
                </div>
              </div>
                  <hr>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Email Address:</h5>
                    </div>
                    <div class="col-sm-9 text-secondary profile">
                    <?php 
                      if(!isset($_POST['edit'])){
                        echo $email; 
                      }else{
                        echo '<input type="email" name="email" class="editprofile-input" value="'.$email.'">';
                      }  
                      ?>
                    </div>
                  </div>
                </div>
              </div>
                  <hr>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Password:</h5>
                    </div>
                    <div class="col-sm-9 text-secondary profile">
                      <sub>****************</sub><a href="changepw.php" style="font-size:12">[Change Password]</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              if(isset($_POST['edit'])){
                echo '<div class="edit"><input type="submit" name="editProfile" value="Edit Profile" class="edit-btn" id="search"></div>';
              }
                ?>
            </form>
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