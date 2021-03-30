<?php
if(!isset($_SESSION['access']))
    echo '<script> window.location="login.php"; </script>';
?>