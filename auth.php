<?php
    session_start();//criar sessão

    if(isset($_POST['usuario']) && isset($_POST['senha'])){
        $usuario = $_POST["usuario"];
        $senha = $_POST['senha'];
       /* $nivel = "A";*/

        include 'bd_connect.php';
        $query = "select id_usuario,name,username,password,level from usuarios where username = '{$usuario}';";
        $bd_data = mysqli_query($con,$query);
        $login = mysqli_fetch_assoc($bd_data);
        $nivel = $login['level'];

        
        if($login['username'] == $usuario){
            if(password_verify($senha, $login['password'])){
        //define valor para sessão
                $_SESSION['usuario'] = $usuario;
                $_SESSION['nome'] = $login['name'];
                $_SESSION['id_cliente'] = $login['id_usuario'];
                $_SESSION['nivel'] = $nivel;
            
                if($nivel == 'U'){
                    header('location:home.php');
                }elseif ($nivel == 'A') {
                    header('location:admin.php');
                }elseif ($nivel == 'G'){
                    header('location:gerente.php');
                }
            }else {
                header('location:login.php?pass=true');
                exit;
            }
        }else{
            header('location:login.php?pass=true');
            exit;
        }

    }
    mysqli_close( $con );

?>