<?php
        include 'check_login.php';
        include 'bd_connect.php';
        $username = $_SESSION['username'];

        $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);

       
        $query = "update usuarios set password = '$senha' where username = '$username'";

            if (mysqli_query($con,$query)){
                header('location:cria_usuarios.php?user_updated=true');
               
            }else {
                header('location:cria_usuarios.php?erro_updated=true');
            }

    ?>