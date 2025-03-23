<?php 
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        echo "<script>window.location.href='login.php';</script>";
        exit;
    }
     include "navbar.php";
?>