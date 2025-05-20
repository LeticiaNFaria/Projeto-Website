<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakery Coffee</title>
    <link rel="stylesheet" href="css/style.css">
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
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#area-about" class="nav-link">Quem somos</a></li>
                <li><a href="#area-destaques" class="nav-link">Mais pedidos</a></li>
                <li><a href="#area-contato" class="nav-link">Contato</a></li>
                <li><a href="login.php" class="nav-link-bnt">Login</a></li>
            </ul>

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"> <img class="icon" src="img/barra.png" alt=""> </button>
            </div>
        </div>
        

        <div class="mobile-menu">
            <ul>
                <li class="nav-item" ><a href="#home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#area-about" class="nav-link">Quem somos</a></li>
                <li class="nav-item"><a href="#area-destaques" class="nav-link">Mais pedidos</a></li>
                <li class="nav-item"><a href="#area-contato" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link-bnt">Login</a></li>
            </ul>
        </div>
    </header>

    <section id = "home">
        <img  class="top-banner" src="img/banner.jpg" alt="Banner">
    </section>

    <section class="section-about" id="area-about">

        <div class="about">
            <div class="text-about">
                <h2>A melhor padaria da região</h2>
                <p>
                    Mussum Ipsum, cacilds vidis litro abertis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Quem manda na minha terra sou euzis! Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Manduma pindureta quium dia nois paga. Diuretics paradis num copo é motivis de denguis. Praesent malesuada urna nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus. Quem manda na minha terra sou euzis! Detraxit consequat et quo num tendi nada.
                </p>
            </div>

            <img src="img/cappuccino.jpg" alt="Imagem about" class="image-about">
        </div>

    </section>

    <section class="section-destaques" id="area-destaques">

        <div class="title-destaques" >
            <h2>Mais pedidos</h2>
            <p>Descubra agora o seu café da manhã preferido!</p>
        </div>
            
        <div class="destaques">
            <img class="image-destaques" src="img/cafe.jpg" alt="Imagem" >
            <img class="image-destaques" src="img/croasaint.jpg" alt="Imagem" >
            <img class="image-destaques" src="img/baguettes.jpg" alt="Imagem" >
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