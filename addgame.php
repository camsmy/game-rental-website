<?php include 'head.php'; ?>
<body>
    <?php

include 'admin-navigation.php';
?>
<?php // OPENS THE DATABASE
include 'opendb.php';
?>
<div class="adminnavbar-main_content">
    <div class="login-container position-relative d-flex justify-content-center align-items-center">
            <div class="signup-form2 position-relative d-flex justify-content-center align-items-center">

                <form name="signup" method="post">
                    <h3 class="login-title text-align-center">Add New Game</h3>
                    <div class="login-input-container focus">
                        <input type="text" name="sk" class="login-input" required>
                        <label for="">SKU</label>
                        <span>SKU</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="text" name="gamen" class="login-input" required>
                        <label for="">Game Name</label>
                        <span>Game Name</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="text" name="price" class="login-input" required>
                        <label for="">Price</label>
                        <span>Price</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="text" name="available" class="login-input address" required>
                        <label for="">Availability</label>
                        <span>Availability</span>
                    </div>
                    <div class="login-input-container focus">
                        <input type="file" name="image" id="file" required>
                        <label for="">img</label>
                        <span>img</span>
                    </div>
                    <div class="login-input-container focus">
                        <select name ="Genre">
                            <option>---Category---</option>
                            <option value ="Adventure">Adventure</option>
                            <option value ="Adventure">Horror</option>
                            <option value ="Adventure">Action</option>
                            <option value ="Adventure">Sports</option>
                            <option value ="Adventure">Fighting</option>
                            <option value ="Adventure">Shooter</option>
                        </select>
                    </div>
                    <div class="login-input-container focus">
                        <input type="email" name="gamedes" class="contact-input" required>
                        <label for="">Game Description</label>
                        <span>Game Description</span>
                    </div>
                    <input type="submit" name="Submit" value="Add Game" class="login-btn">
                </form>
            </div>
        </div>
    </div>

</div>
    <?php
    if(isset($_POST['Submit'])){
        $v1 = $_POST['sk'];
        $v2 = $_POST['gamen'];
        $v3 = $_POST['price'];
        $v8 = $_POST['available'];
        $v4 = $_POST['rented'];
        $v5 = $_POST['reserved'];
        $v6 = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $v7 = $_POST['genre'];
        $v9 = $_POST['gamedes'];
        mysqli_query($DBConnect,"INSERT INTO gameinfo (sku,gname,price,avail,rent,reserve,img,genre,gdesc) VALUES ('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8','$v9')");
    }?>
</body>

</html>