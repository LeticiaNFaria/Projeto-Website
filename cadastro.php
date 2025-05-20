<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
<body class="login-pag">
    
    <section class="formc">
        <div class="container">
            <form action="cadastrar.php" method="post">
                <div class="box">
                    <label for="usuario">Usuário</label>
                    <p class="cad"><input type="text" name="usuario" id="usuario" required /></p>
                </div>
                <div class="box">
                    <label for="senha">Senha</label>
                    <p class="cad"><input type="password" name="senha" id="senha" required /></p>
                </div>
                <div class="box">
                    <label for="nome">Nome</label>
                    <p class="cad"><input type="text" name="nome" required></p>
                </div>

                <div class="box">
                    <label for="email">Email</label>
                    <p class="cad"><input type="email" name="email" required><br></p>
                </div>
                <div class="erro-box">
                    <?php
                        if (isset($_GET['error_usu'])){
                            echo "<p class='erro-item'> <i class='fa-solid fa-circle-exclamation'></i> Usuário já existe tente outro</p>";
                        }else {
                            echo '';
                        }
                    ?>
                </div>

                <button type="submit" class="btn-login">Cadastrar</button>
            </form>
        </div>
    </section>

</body>
</html>