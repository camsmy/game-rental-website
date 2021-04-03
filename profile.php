<?php
include 'head.php';
?>
<body>
<?php
include 'block.php';
include 'customer-navigation.php';
include 'opendb.php';
$user = $_SESSION['user'];
$fname = $_SESSION['fname'];
$mname = $_SESSION['mname'];
$lname = $_SESSION['lname'];
$address = $_SESSION['add'];
$cnum = $_SESSION['connum'];
$email = $_SESSION['email'];
if(isset($_POST['editProfile'])){
  $add = $_SESSION['add'] = $_POST['add'];
  $finame = $_SESSION['fname'] = $_POST['fname'];
  $miname = $_SESSION['mname'] = $_POST['mname'];
  $laname = $_SESSION['lname'] = $_POST['lname'];
  $cont = $_POST['contact'];
  $emai = $_POST['email'];
  if(empty($_POST['add'])||empty($_POST['fname'])||empty($_POST['mname'])||empty($_POST['lname'])||empty($_POST['contact'])||empty($_POST['email'])){
    echo '<script>window.location="profile.php?empty";</script>';
    exit();
  }
  if(!preg_match('/^[+]?[\d]+([\-][\d]+)*\d$/',$cont)){
    //header("Location: profile.php?invalidphone&fname=$finame&mname=$miname&lname=$laname&address=$add&email=$emai");
    echo '<script>window.location = "profile.php?invalidphone&fname='.$finame.'&mname='.$miname.'&lname='.$laname.'&address='.$add.'&email='.$emai.'";</script>';
    exit();
  }elseif(!filter_var($emai,FILTER_VALIDATE_EMAIL)){
    echo '<script>window.location = "profile.php?invalidemail&fname='.$finame.'&mname='.$miname.'&lname='.$laname.'&address='.$add.'&contactno='.$cont.'";</script>';
    exit();
  }
    else{
    $_SESSION['connum'] = $_POST['contact'];
    $_SESSION['email'] = $_POST['email'];
    mysqli_query($DBConnect,"UPDATE userinfo SET fname='".$_POST['fname']."',mname='".$_POST['mname']."',lname='".$_POST['lname']."',address='".$_POST['add']."',
    contactno='".$_POST['contact']."',email='".$_POST['email']."' WHERE uname='".$user."'") or die("ERROR");
    echo '<script>window.location ="profile.php";</script>';
    header("Location: contact.php?success");
    exit();  
  }
}
if(isset($_POST['back'])){
  unset($_POST['edit']);
}
?>
      <div class="adminnavbar-main_content">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" class="form-style-profile" method="post" enctype="multipart/form-data">
<?php
                          $fullurl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                          if(strpos($fullurl,"success")){
                           echo "<p class='error text-align-center m-1'>
                           <i class='fas fa-check-circle text-align-center'></i>
                           You have edited your profile successfully!</p>";
                          }
                          if(strpos($fullurl,"invalidphone")){
                            echo "<p class='error text-align-center m-1'>
                            Invalid phone format!</p>";
                           }
                          if(strpos($fullurl,"invalidemail")){
                            echo "<p class='error text-align-center m-1'>
                            Invalid email format!</p>";
                          }
                          if(strpos($fullurl,"empty")){
                            echo "<p class='error text-align-center m-1'>
                            You did not fill-in all fields!</p>";
                          }
?>
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
                      <!-- Edit mo to  -->
                      <h5 class="mb-0">First Name:</h5>
                    </div>
                    <div class="col-sm-9 text-secondary profile">
                    <?php 
                      if(!isset($_POST['edit'])){
                        echo $fname; 
                      }else{
                        echo '<input type="text" name="fname" class="editprofile-input" value="'.$fname.'">';
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
                      <!-- Edit mo to  -->
                      <h5 class="mb-0">Middle Name:</h5>
                    </div>
                    <div class="col-sm-9 text-secondary profile">
                    <?php 
                      if(!isset($_POST['edit'])){
                        echo $mname; 
                      }else{
                        echo '<input type="text" name="mname" class="editprofile-input" value="'.$mname.'">';
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
                      <!-- Edit mo to  -->
                      <h5 class="mb-0">Last Name:</h5>
                    </div>
                    <div class="col-sm-9 text-secondary profile">
                    <?php 
                      if(!isset($_POST['edit'])){
                        echo $lname; 
                      }else{
                        echo '<input type="text" name="lname" class="editprofile-input" value="'.$lname.'">';
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
                        echo '<input type="text" name="contact" class="editprofile-input" value="'.$cnum.'">';
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
                        echo '<input type="text" name="email" class="editprofile-input" value="'.$email.'">';
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
                echo '<div class="edit"><input type="submit" name="editProfile" value="Save Changes" class="edit-btn" id="search"></div>';
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