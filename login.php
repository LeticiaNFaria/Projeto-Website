<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/2095c45f49.js" crossorigin="anonymous"></script>
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
</head>
<body class="login-pag">
    <header on class="fixo" >
        <div class="icon-social">
            <a href="https://www.facebook.com" target="_blank" ><i class="fa-brands fa-square-facebook"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
        </div>
        <div class="menu">
            <img class="logo" src="img/logo.png" alt="Logo Bakery Coffee">
            <ul class="item-menu">
                <li><a href="index.php#home" class="nav-link">Home</a></li>
                <li><a href="index.php#area-about" class="nav-link">Quem somos</a></li>
                <li><a href="index.php#area-destaques" class="nav-link">Mais pedidos</a></li>
                <li><a href="index.php#area-contato" class="nav-link">Contato</a></li>
                <li><a href="login.php" class="nav-link-bnt">Login</a></li>
            </ul>

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"> <img class="icon" src="img/barra.png" alt=""> </button>
            </div>
        </div>
        

        <div class="mobile-menu">
            <ul>
                <li class="nav-item" ><a href="index.php#home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="index.php#area-about" class="nav-link">Quem somos</a></li>
                <li class="nav-item"><a href="index.php#area-destaques" class="nav-link">Mais pedidos</a></li>
                <li class="nav-item"><a href="index.php#area-contato" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link-bnt">Login</a></li>
            </ul>
        </div>
    </header>
    
    <section class="form">
        <div class="container">
            <form action="auth.php" method="post">
                <div class="box">
                    <label for="usuario">Usuário</label>
                    <input type="text" name="usuario" id="usuario" required />
                </div>
                <div class="box">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" required />
                </div>
                <div class="cadastrar">
                    <p class='erro-item'>Não tem acesso? <a class="cadi" href="cadastro.php">Cadastre-se</a></p>
                </div>
                <div class="erro-box">
                    <?php
                        if (isset($_GET['pass'])){
                            echo "<p class='erro-item'> <i class='fa-solid fa-circle-exclamation'></i> Usuário e senha incorretos</p>";
                        }elseif(isset($_GET['login'])) {
                            echo "<p class='erro-item' > <i class='fa-solid fa-circle-exclamation'></i> É necessário realizar o login</p>";
                        }elseif(isset($_GET['access'])) {
                            echo "<p class='erro-item' > <i class='fa-solid fa-circle-exclamation'></i> Sem permissão para acessar!</p>";
                        }else {
                            echo '';
                        }
                    ?>
                </div>

                <button type="submit" class="btn-login">Entrar</button>
            </form>
        </div>
    </section>

    <!--<footer class="bakery-footer" id="area-contato">
        <img class="logo-footer" src="img/logo.png" alt="Logo">

        <div class="message-contato">
            <input class="input-contato" type="text" name="form-nome" id="form-nome" placeholder="Nome" >
            <input class="input-contato" type="email" name="form-email" id="form-email" placeholder="E-mail">
            <br>
            <textarea class="input-contato" name="message" id="form-text" cols="30" rows="5" placeholder="Mensagem"></textarea>
            <button>Enviar</button>
        </div>

    </footer>-->

    <script src="js/script.js"></script>

</body>
</html>