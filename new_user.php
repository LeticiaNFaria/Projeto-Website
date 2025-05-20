<?php
    include 'check_login.php';
    include 'bd_connect.php';
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nivel = $_POST['nivel'];

    $query = "insert into usuarios (username,password,name,email,level) values ('{$usuario}' , '{$senha}', '{$nome }', '{$email}', '{$nivel}');";

    if (mysqli_query ($con, $query) ){
        header('location:admin.php?new_user=true');
    } else{
        header('location:admin.php?error_new_user=true');
    }
    
?>
