<?php
include 'head.php';
include 'opendb.php';
?>

<section>
    <div id="edit" class="glist-edit justify-content-center align-items-center">
        <form class="glist-edit-box animate" action="gamelist-update.php" method="post">
        <div class="glist-pop">
            <input type="hidden" name="sku" value="<?php echo $_POST['sku']; ?>"/>
            <span class="close" title="Close">&times;</span><br>
            <label for="p-name"><b>Product Name</b></label><br>
            <input class="glist-input" type="text" placeholder="Enter New Product Name" name="p-name" required><br>
            <label for="p-sku"><b>SKU</b></label><br>
            <input class="glist-input" type="text" placeholder="Enter New SKU" name="p-sku" required><br>
            <label for="p-price"><b>Price</b></label><br>
            <input class="glist-input" type="number" step="0.01" placeholder="Enter New Price" name="p-price" required><br><br>
            <input class="glist-button glist-confirm" type="submit" name="confirm" value="Confirm">
        </div>
      </form>
    </div>

<script>
    var modal = document.getElementById("edit");
    var show = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0]
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        window.close();
    }
    function reload(){ 
        O = window.opener;
        if (O)
            if (O.closed){  alert('Home page has been closed');}
            else{    window.close(); O.here();}
        else alert('This tab has no home page')
    }
</script>

<?php
    if(isset($_POST['confirm'])){
        $id = $_POST['sku'];
        $pname = $_POST['p-name'];
        $sku = $_POST['p-sku'];
        $price = $_POST['p-price'];

        if($DBConnect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "UPDATE gameinfo set gname = '$pname', sku = '$sku', price = '$price' WHERE sku = '$id'";

        if (mysqli_query($DBConnect, $sql)) {
            mysqli_close($DBConnect);
            echo "<script type='text/javascript'> reload(); </script>";
        } else {
            echo "Error updating game info";
        }

    }
?>

</section>

