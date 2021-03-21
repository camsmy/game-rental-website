<?php
include 'head.php';
?>
<body>
<?php
include 'block.php';
include 'navigation.php';
include 'opendb.php';
?>
<?php
    $data = mysqli_query($DBConnect,"SELECT * from userinfo");
    $total = mysqli_num_rows($data);
    $user=mysqli_fetch_array($data);
    $isTrue = true;
        $_SESSION['user'] = $user['uname'];
        $_SESSION['pass'] = $user['pw'];
        $_SESSION['fullname'] = $user['fname']." ".$user['mname']." ".$user['lname'];
        $_SESSION['add'] = $user['address'];
        $_SESSION['connum'] = $user['contactno'];
        $_SESSION['email'] = $user['email'];
?>
      <div class="adminnavbar-main_content">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" class="form-style-profile" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Username:</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['user']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Full Name:</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $_SESSION['fullname']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Home Address:</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['add']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Contact #:</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['connum']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Email Address:</h4>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['email']; ?>
                    </div>
                  </div>
                </div>
              </div>
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