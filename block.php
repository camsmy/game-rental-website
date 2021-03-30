<?php
if(!isset($_SESSION['user'])){
    echo '<script> window.location="login.php"; </script>';
}?>