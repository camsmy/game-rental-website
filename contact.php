<?php
include 'head.php';
?>

<body>
    <?php
include 'navigation.php';
?>

    <div class="contact-container position-relative d-flex justify-content-center align-items-center">
    <span class="contact-big-circle"></span>  
    <div class="row contact-form">
            <div class="contact-info">
                <h3 class="contact-title">Let's get in touch!</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe similique, hic nam necessitatibus
                    excepturi doloremque aliquid quibusdam placeat, aliquam quod adipisci inventore. Ex dolore, saepe
                    quasi alias ab corrupti cum?</p>
                <div class="contact-info-info">
                    <div class="contact-information">
                        <p>insert address here</p>
                    </div>
                </div>
                <div class="contact-info-info">
                    <div class="contact-information">
                        <p>email</p>
                    </div>
                </div>
                <div class="contact-info-info">
                    <div class="contact-information">
                        <p>contact num</p>
                    </div>
                </div>
                <div class="contact-social-media">
                    <p>Connect with us:</p>
                    <div class="contact-social-icons">
                        <a href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="contact-form2 position-relative">
                <span class="contact-circle one position-absolute"></span>
                <span class="contact-circle two position-absolute"></span>

                <form action="contactform-code.php" method="post">
                    <h3 class="contact-title">Contact Us</h3>
                    <div class="contact-input-container focus">
                        <input type="text" name="name" id="name" class="contact-input">
                        <label for="">Name</label>
                        <span>Name</span>
                    </div>
                    <div class="contact-input-container focus">
                        <input type="email" name="email" id="email" class="contact-input">
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="contact-input-container focus">
                        <input type="tel" name="phone" id="phone" class="contact-input">
                        <label for="">Telephone</label>
                        <span>Telephone</span>
                    </div>
                    <div class="contact-input-container contact-textarea focus">
                        <textarea name="message" id="message" class="contact-input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" value="Send Mail" class="contact-btn">
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
</body>

</html>