<?php
    include 'bd_connect.php';
    include 'check_login.php';
	/*$usuario = $_SESSION['usuario'];*/
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://kit.fontawesome.com/2095c45f49.js" crossorigin="anonymous"></script>
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
</head>
<body>
   <header on class="fixo" >
        <div class="icon-social">
            <a href="https://www.facebook.com" target="_blank" ><i class="fa-brands fa-square-facebook"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
        </div>
        <div class="menu">
            <img class="logo" src="img/logo.png" alt="Logo Bakery Coffee">
            <ul class="item-menu">
                <li><a href="admin.php#pesquisa" class="nav-link">Pedidos</a></li>
                <li><a href="cria_usuarios.php" class="nav-link">Add Usuários</a></li>
                <li><a href="inserir_produtos.php" class="nav-link">Produtos</a></li>
                <li><a href="admin.php#area-contato" class="nav-link">Contato</a></li>
                <li><a href="logout.php" class="nav-link-bnt">Sair</a></li>
            </ul>

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"> <img class="icon" src="img/barra.png" alt=""> </button>
            </div>
        </div>
        

        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="admin.php#pesquisa" class="nav-link">Pedidos</a></li>
                <li class="nav-item"><a href="cria_usuarios.php" class="nav-link">Add Usuários</a></li>
                <li class="nav-item"><a href="inserir_produtos.php" class="nav-link">Produtos</a></li>
                <li class="nav-item"><a href="admin.php#area-contato" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link-bnt">Sair</a></li>
            </ul>
        </div>
    </header>

    <section class="form-cadastro" id="cadastro">
        <div class="formc">
            
            <form action="new_user.php" method="post">
                <h3 class="centro" >Criar novo usuário para o sistema</h3>
                <div class="box">
                <label for="usuario">Usuário</label>
                <p class="cad"><input type="text" name="usuario" required><br></p>
                </div>

                <div class="box">
                <label for="senha">Senha</label>
                <p class="cad"><input type="password" name="senha" required><br></p>
                </div>

                <div class="box">
                <label for="nome">Nome</label>
                <p class="cad"><input type="text" name="nome" required><br></p>
                </div>

                <div class="box">
                <label for="email">Email</label>
                <p class="cad"><input type="email" name="email" required><br></p>
                </div>

                <div class="opcao">
                <label for="nivel">Nivel de acesso </label><br>
                <input type="radio" name="nivel" value="A">Administrador
                <input type="radio" name="nivel" value="G">Gerente<br>
                <input type="radio" name="nivel" value="U">Usuário<br>
                </div>

                <button type="submit" class="btn-login">Cadastrar</button>
            </form>
        </div>
    </section>

    <center><h3>Usuários cadastrados</h3></center>
    <br><br>
    <?php 
        include 'show_users.php'; 
    ?>
    
    <script src="js/script.js"></script>

</body>
</html>