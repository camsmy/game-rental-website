<?php
include 'head.php';
?>

<body>
    <?php
if(!isset($_SESSION['user'])){ include 'navigation.php'; 
    if(isset($_POST['emailsubmit'])){
        $sender_name = $_POST['name'];
        $sender_email = $_POST['email'];
        $sender_phone = $_POST['phone'];
        $sender_message = $_POST['message'];
        $email_subject = "You have a new email from your website!";
        $to = 'byxllaeheh@gmail.com';//change this email
        $body = "";
        if(empty($sender_email)||empty($sender_name)||empty($sender_phone)||empty($sender_message)){
            // header("Location: contact.php?form=empty");
            // exit();
        }
        elseif(!filter_var($sender_email,FILTER_VALIDATE_EMAIL)){
            // header("Location: contact.php?form=invalidemail");
            // exit();
        }
        elseif(!preg_match('/^[+]?[\d]+([\-][\d]+)*\d$/',$sender_phone)){
            // header("Location: contact.php?form=phone");
            // exit();
        }
        elseif(strlen($sender_message) > 70){
            // header("Location: contact.php?form=message");
            // exit();
        }else{
            $headers = "From: ".$sender_email;
            // $body .="Sender Name: ".$sender_name."\r\n";
            // $body .="Sender's Contact Number ".$sender_phone."\r\n";
            $body .="Message: ".$sender_message."\r\n";
            mail($to,$email_subject,$body,$headers);
            header("Location: contact.php?mailsend");
            exit();
        }
    }
}
else{ include 'customer-navigation.php'; }
?>
    <div class="contact-container position-relative d-flex justify-content-center align-items-center">
        <span class="contact-big-circle"></span>
        <div class="row contact-form">
            <div class="contact-info">
                <h3 class="contact-title">Let's get in touch!</h3>
                <p>You're not going to hit a ridiculously long phone menu when you call us. Your email isn't going to
                    the inbox abyss, never to be seen or heard from again. At Choice Screening, we provide the
                    exceptional service we'd want to experience ourselves!
                </p>
                <div class="contact-info-info">
                    <div class="contact-information">
                        <i class="fas fa-map-marked-alt"></i>
                        <p>Blk. 6 Lot 22 Oak St. Phase A Treelane III Bayan Luma IX 4103 Imus, Philippines</p>
                    </div>
                </div>
                <div class="contact-info-info">
                    <div class="contact-information">
                        <i class="fas fa-at"></i>
                        <p>
                            kej_novice831@yahoo.com
                        </p>
                    </div>
                </div>
                <div class="contact-info-info">
                    <div class="contact-information">
                        <i class="fas fa-address-book"></i>
                        <p>+63464547783</p>
                    </div>
                </div>
                <div class="contact-social-media">
                    <p>Connect with us:</p>
                    <div class="contact-social-icons">
                        <a href="https://www.facebook.com/kej.ps4.rental/">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form2 position-relative">
                <span class="contact-circle one position-absolute"></span>
                <span class="contact-circle two position-absolute"></span>
                <form action="formvalidation.inc.php" method="post" name="google-sheet">
                    <h3 class="contact-title">Contact Us</h3>
                    <?php
                $fullurl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(strpos($fullurl,"form=empty")){
                    echo "<p class='error text-align-center m-1'>You did not fill in all fields!</p>";
                }
                if(strpos($fullurl,"form=invalidemail")){
                    echo "<p class='error text-align-center m-1'>Your email is invalid!</p>";
                }
                if(strpos($fullurl,"form=phone")){
                    echo "<p class='error text-align-center m-1'>Your phone is invalid!</p>";
                }
                if(strpos($fullurl,"form=message")){
                    echo "<p class='error text-align-center m-1'>Message shoud be below 70 characters</p>";
                }
                if(strpos($fullurl,"mailsend")){
                    echo "<p class='error text-align-center m-1'>Message has been successfully sent!</p>";
                }
                ?>
                    <div class="contact-input-container focus">
                        <input type="text" name="name" id="name" class="contact-input <?=$invalid_class_name??""?>">
                        <label for="">Name</label>
                        <span>Name</span>
                    </div>
                    <div class="contact-input-container focus">
                        <input type="text" name="email" id="email" class="contact-input">
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="contact-input-container focus">
                        <input type="text" name="phone" id="phone" class="contact-input">
                        <label for="">Telephone</label>
                        <span>Telephone</span>
                    </div>
                    <div class="contact-input-container contact-textarea focus">
                        <textarea name="message" id="message" class="contact-input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" value="Send Mail" class="contact-btn" name="emailsubmit">
                </form>
            </div>
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
    <script>
            const scriptURL = 'https://script.google.com/macros/s/AKfycbwe_wcNl7fNrM90whhlLDXuByG7ao8NGu-XCao69K3TGPcUXRKkhhmG9SQ_oYwO15nZ/exec'
            const form = document.forms['google-sheet']
          
            form.addEventListener('submit', e => {
              e.preventDefault()
              fetch(scriptURL, { method: 'POST', body: new FormData(form)})
            })
          </script>


</body>

</html>