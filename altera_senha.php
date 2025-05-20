<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<?php
    include 'check_login.php';
    $username = $_GET['user'];
    $_SESSION['username'] = $username;

?> 
    <div class="formc">
        <h3>Digite a nova senha do usuário <?php echo $username ?> :</h3>
        <form action="update.php" method="post">
            <div class="box">
                <input type="password" name="senha" required>
                <br>
            </div>
            <button type="submit" class="btn-login">Enviar</button>
        </from>
    </div>

</body>
</html> 