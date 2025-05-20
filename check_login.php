<?php
        session_start();
        if(!isset($_SESSION['usuario'])){ //existe algum erro aí?
            header('location:login.php?login=true');
            exit;
        }
?>