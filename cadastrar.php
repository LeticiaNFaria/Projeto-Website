<?php
    session_start();
    include 'bd_connect.php';
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "select username from usuarios;";
    $consulta = mysqli_query($con,$sql);

    while($cadastro = mysqli_fetch_assoc($consulta)){
        if ($usuario == $cadastro['username']){
            header('location:cadastro.php?error_usu=true');
            exit;
        }
    }

    $query = "insert into usuarios (username,password,name,email,level) values ('{$usuario}' , '{$senha}', '{$nome }', '{$email}', 'U');";

    if (mysqli_query ($con, $query) ){
        header('location:login.php?new_user=true');
    } else{
        header('location:login.php?error_new_user=true');
    }
    
?>