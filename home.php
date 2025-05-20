<?php
    include 'check_login.php';
	$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
               <!-- <li><a href="#home" class="nav-link">Home</a></li>-->
                <li><a href="#area-home" class="nav-link">Home</a></li>
                <li><a href="#cardapio" class="nav-link">Cardápio</a></li>
                <li><a href="#area-contato" class="nav-link">Contato</a></li>
                <li><a href="carrinho.php" class="nav-link">Carrinho</a></li>
                <li><a href="logout.php" class="nav-link-bnt">Sair</a></li>
            </ul>

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"> <img class="icon" src="img/barra.png" alt=""> </button>
            </div>
        </div>
        

        <div class="mobile-menu">
            <ul>
               <!-- <li class="nav-item" ><a href="#home" class="nav-link">Home</a></li>-->
                <li class="nav-item"><a href="#area-home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#cardapio" class="nav-link">Cardápio</a></li>
                <li class="nav-item"><a href="#area-contato" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="carrinho.php" class="nav-link">Carrinho</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link-bnt">Sair</a></li>
            </ul>
        </div>
    </header>

    <section class="section-home" id="area-home">

        <div class="home">
            <div class="text-home">
                <h2><?php echo 'Seja bem vindo(a) ', $usuario , '! '; ?></h2>
                <p>
                    Escolha a melhor opção de prato no nosso cardapio abaixo.
            </p>
            </div>

            <img src="img/logo.png" alt="Logo" class="image-home">
        </div>

    </section>

    <!--<section class="section-destaques" id="area-destaques">

        <div class="title-destaques" >
            <h2>Mais pedidos</h2>
            <p>Descubra agora o seu café da manhã preferido!</p>
        </div>
            
        <div class="destaques">
            <img class="image-destaques" src="img/cafe.jpg" alt="Imagem" >
            <img class="image-destaques" src="img/croasaint.jpg" alt="Imagem" >
            <img class="image-destaques" src="img/baguettes.jpg" alt="Imagem" >
        </div>
    </section>-->

    <section class="cardapio" id = "cardapio">
        <div class="container">
        <?php
            include 'bd_connect.php';
            $sql = "select * from produtos where tipo = 'BEBIDA';";
            $query = mysqli_query($con,$sql);

            while($row = mysqli_fetch_assoc($query)) {
        ?>
            <div class="box">
                <img src="<?php echo $row['imagem'] ?>" alt=""><br><br>
                <h4><?php echo $row['nome'] ?></h4>
                <p>R$ <?php echo $row['valor'] ?></p>
                <div class = "botao">
					<a class="badd" href="carrinho.php?acao=add&id=<?php echo $row['produto_id']?>">Adicionar</a>
				</div>
            </div>

        <?php
            }
        ?>
        </div>

        <div class="container">
        <?php
            include 'bd_connect.php';
            $sql = "select * from produtos where tipo = 'COMIDA';";
            $query = mysqli_query($con,$sql);

            while($row = mysqli_fetch_assoc($query)) {
        ?>
            <div class="box">
                <img src="<?php echo $row['imagem'] ?>" alt=""><br><br>
                <h4><?php echo $row['nome'] ?></h4>
                <p>R$ <?php echo $row['valor'] ?></p>
                <div class = "botao">
					<a class="badd" href="carrinho.php?acao=add&id=<?php echo $row['produto_id']?>">Adicionar</a>
				</div>
            </div>

        <?php
            }
        ?>
        </div>
    </section>

    <footer class="bakery-footer" id="area-contato">
        <img class="logo-footer" src="img/logo.png" alt="Logo">

        <div class="message-contato">
            <input class="input-contato" type="text" name="form-nome" id="form-nome" placeholder="Nome" >
            <input class="input-contato" type="email" name="form-email" id="form-email" placeholder="E-mail">
            <br>
            <textarea class="input-contato" name="message" id="form-text" cols="30" rows="5" placeholder="Mensagem"></textarea>
            <button>Enviar</button>
        </div>

    </footer>
    <script src="js/script.js"></script>

</body>
</html>