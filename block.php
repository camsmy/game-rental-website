<?php
if(!isset($_SESSION['user'])){
    //echo '<script> alert("Login first!"); </script>';
    echo '<script> window.location="login.php"; </script>';
}?>