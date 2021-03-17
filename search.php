<div class="search-container">
    <div class="search-form2 position-relative">
        <form action="gamegallery.php" method="post">
            <div class="search-input-container focus">
                <input type="search" name="sgames" class="search-input" placeholder="Search games...">
                <label for="">Search</label>
                <span>Search</span>
                <input type="submit" name="Search" value="Search" class="search-btn" id="search">
            </div>
        </form>
    </div>
</div>
<?php
if(isset($_POST['Search'])){
    $searchg = $_POST['sgames'];
    $_SESSION['Search'] = preg_replace("/[^0-9a-z]#/i","",$searchg);
}
?>