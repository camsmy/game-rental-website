<?php
if(!isset($_SESSION['user']) || $_SESSION['pass'] != "ADETWebsiteProject")
    echo '<script> window.location="login.php"; </script>';
?>