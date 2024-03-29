<?php
    include 'opendb.php';
    $message_status = false;
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    //$link = mysqli_connect("localhost", "root", "password", "dbname");
    // Check connection
    if($DBConnect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    // Escape user inputs for security
    
    // Attempt insert query execution
    if(isset($_POST['submit'])) {
        if(empty($_POST['suggestion-message'])){
            header("Location: suggestion.php?=empty");
            exit();
        }
        $sg_msg = mysqli_real_escape_string($DBConnect, $_REQUEST['suggestion-message']);
        $currentDateTime = date('Y-m-d');
        $sql = "INSERT INTO suggestion VALUES('$currentDateTime','$sg_msg')";
        if(mysqli_query($DBConnect, $sql)){
            // alert("Message successfully sent!");
            $message_status = true;
        } else{
            alert("ERROR: Could not able to execute $sql");
            header("Location: suggestion.php?=didnotsent");
            $message_status = false;
            mysqli_error($DBConnect);
        }
    }
    // Close connection
    mysqli_close($DBConnect);
    include 'head.php'; 
?>

<body>
    <?php
    include 'customer-navigation.php';
    include 'block.php';
    if($message_status):
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 confirm justify-content-center align-items-center">
            <h2><i class="fas fa-check-square"></i>Message has successfully sent!</h2>
            </div>
        </div>
    </div>
    <?php
    else:
    ?>
    <div class="suggestion-container">
        <div class="suggestion-form ">
                <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                    <h2 class="suggestion-title">Suggestion</h2>
                    <?php
                $fullurl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(strpos($fullurl,"didnotsent")){
                 echo "<p class='error text-align-center m-1'>
                 Your message failed to send. Please try again.";
                }
                if(strpos($fullurl,"empty")){
                    echo "<p class='error text-align-center m-1'>
                    You did not fill in the message field!";
                   }
                ?>
                    <div class="suggestion-input-container suggestion-textarea focus">
                        <textarea name="suggestion-message" id="suggestion-message" class="suggestion-input"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Send Message" class="suggestion-btn">
                </form>             
            </div>
        </div>
    </div>
    <?php 
    endif;
    ?>

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