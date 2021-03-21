<?php include 'head.php'; ?>
<body>
<?php
include 'admin-navigation.php';
include 'opendb.php';
?>  
<div class="adminnavbar-main_content">
    <div class="login-container position-relative d-flex justify-content-center align-items-center">

                <form action="<?php echo $_SERVER['PHP_SELF']?>" class="form-style-9" method="post" enctype="multipart/form-data">
                  <h3 class="add-game text-align-center">Add New Game</h3>
<ul>
<li>
    <input type="text" name="sk" class="field-style field-split align-left" placeholder="SKU" />
    <input type="text" name="gname" class="field-style field-split align-right" placeholder="Game Name" />

</li>
<li>
    <input type="text" name="price" class="field-style field-split align-left" placeholder="Price" />
    <input type="text" name="available" class="field-style field-split align-right" placeholder="Availability" />
</li>
<li>
<input type="file" name="image" id="image" class="field-style field-full align-none" placeholder="image" />
</li>
<li>
  <div class = "field-style field-full align-none"> Genre: &nbsp &nbsp &nbsp  <select name ="genre">
                            <option>---Category---</option>
                            <option value ="Adventure">Adventure</option>
                            <option value ="Adventure">Horror</option>
                            <option value ="Adventure">Action</option>
                            <option value ="Adventure">Sports</option>
                            <option value ="Adventure">Fighting</option>
                            <option value ="Adventure">Shooter</option>
                        </select>
                        </div>
  </li>
<li>
<textarea name="gamedes" class="field-style" placeholder="Game Description"></textarea>
</li>
<li>
<input type="submit" name="Add" value="Add Game" />
</li>
</ul>
</form>
            </div>
        </div>
    </div>

</div>
    <?php
    if(isset($_POST['Add'])){
        $v1 = $_POST['sk'];
        $v2 = $_POST['gname'];
        $v3 = $_POST['price'];
        $v4 = $_POST['available'];
        $v5 = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $v6 = $_POST['genre'];
        $v7 = $_POST['gamedes'];
        echo $v1.$v2.$v3.$v4.$v6.$v7;
        mysqli_query($DBConnect,"INSERT INTO gameinfo (sku,gname,price,avail,img,genre,gdesc) VALUES ('$v1','$v2','$v3','$v4','$v5','$v6','$v7')");
        header('Location: gamelist.php');
    }?>
</body>
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 
</html>