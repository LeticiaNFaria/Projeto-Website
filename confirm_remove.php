<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirma</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<?php
    include 'check_login.php';
    $username = $_GET['user'];
    $_SESSION['username'] = $username;

?> 
    <div class="formc">
        <h3>Você deseja remover o usuário <?php echo $username ?> ?</h3>
        <form action="remove_user.php" method="post">
        <div class="opcao">
            <input type="radio" name="confirm" value="S" required> Sim
            <input type="radio" name="confirm" value="N" required> Não
        </div>
        <br>
        <button type="submit" class="btn-login">Enviar</button>
        </form>
    </div>
</body>
</html>
