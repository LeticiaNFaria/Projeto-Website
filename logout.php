<?php
    include 'check_login.php';
    session_destroy();
    header('location:index.php');
?>