<?php
    include 'check_login.php';
    include 'bd_connect.php';
    $username = $_SESSION['username'];
    $confirma = $_POST['confirm'];

    if($confirma == 'S'){

    $query = "delete from credent where username = '$username'";

    if (mysqli_query($con,$query)){
        header('location:cria_usuarios.php?user_deleted=true');
    }else {
        header('location:cria_usuarios.php?erro_deleted=true');
    }

    }else {
        header('location:cria_usuarios.php');
    }

    mysqli_close();
?>