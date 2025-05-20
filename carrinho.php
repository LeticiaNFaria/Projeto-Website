<?php
    include 'check_login.php';
    include 'bd_connect.php';
	$usuario = $_SESSION['usuario'];
	$total = 0;
    if (!isset($_SESSION['carrinho'])){
	    $_SESSION['carrinho'] = array();
    }

    if (isset($_GET['acao'])){
	
        if ($_GET['acao'] == 'add'){
		    $id = $_GET['id'];
		    //echo 'inserido o ultimo produto código '.$id.'<br/>';
		
		    if (!isset($_SESSION['carrinho'][$id])){
			    $_SESSION['carrinho'][$id] = 1;
			    header('Location: carrinho.php');
		    }else {
			    $_SESSION['carrinho'][$id] += 1;
			    header('Location: carrinho.php');
		    }
	    }
	
	    if ($_GET['acao'] == 'exc'){
	        $id = $_GET['id'];

		    if (isset($_SESSION['carrinho'][$id])){
			    $_SESSION['carrinho'][$id]--;
			    if($_SESSION['carrinho'][$id] <= 0){
				    unset($_SESSION['carrinho'][$id]);
			    }
			header('Location: carrinho.php');
		    }
	    }
	
	
	
	    if ($_GET['acao'] == 'del'){
		    $id = $_GET['id'];
		    if(isset($_SESSION['carrinho'][$id])){
			    unset($_SESSION['carrinho'][$id]);
			    header('Location: carrinho.php');
		    }
	    }
    }


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
                <li><a href="home.php#area-home" class="nav-link">Home</a></li>
                <li><a href="home.php#cardapio" class="nav-link">Cardápio</a></li>
                <li><a href="home.php#area-contato" class="nav-link">Contato</a></li>
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
                <li class="nav-item"><a href="home.php#area-home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="home.php#cardapio" class="nav-link">Cardápio</a></li>
                <li class="nav-item"><a href="home.php#area-contato" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="carrinho.php" class="nav-link">Carrinho</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link-bnt">Sair</a></li>
            </ul>
        </div>
    </header>
    <br><br><br><br><br><br><br><br><br>
    <?php
        if (count($_SESSION['carrinho'])==0 ){
			echo '<div class="centro"><p> Não há pedido! </p></div>';
		}else{
			echo "<table class='tb' cellspacing='10' cellpadding='5' > 
			<thead>
				<tr>
					<th width='244'>Produto</th>
					<th width='244'>Descrição</th>
					<th width='244'>Quantidade</th>
                    <th width='244'>Valor</th>
					<th width='244'>Remover</th>
				</tr>
				</thead>";
			
			foreach ($_SESSION['carrinho'] as $id => $qtd)
			{
				$sql = "select * from produtos where produto_id = '$id';";
				
				$resultado = mysqli_query($con,$sql) or die (mysqli_error());
				$produtos = mysqli_fetch_array($resultado);
				
				$imagem = $produtos['imagem'];
				$nome = $produtos['nome'];
                $valor = $produtos['valor'];

				


                if ($qtd >= 0){
                    $valor = $valor * $qtd;
                } else {
                    $valor = 0;
                }
				
				$total = $total + $valor;

				echo "<tbody><tr>
						<td width='244'><img class='imagem' src='$imagem'/></td>
						<td width='244'>$nome</td>
						<td width='244'>
                        <a class='diminuir' href='carrinho.php?acao=exc&id=$id'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-dash' viewBox='0 0 16 16'>
						  <path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/>
						</svg></a>
                        ". $qtd ."
                        <a class='aumentar' href='carrinho.php?acao=add&id=$id'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-lg' viewBox='0 0 16 16'>
						  <path fill-rule='evenodd' d='M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z'/>
						</svg>
						</a> 
						</td>
                        <td width='244'>R$ $valor</td>
						<td width='64'><a class='remover' href='carrinho.php?acao=del&id=$id'>
						<!--svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
						  <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
						</svg-->
						
						<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-x-square' viewBox='0 0 16 16'>
						  <path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
						  <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
						</svg>
						</a></td>
						</tr></tbody>";
			}
			echo '</table>';

			echo "<h3 class ='total' >Total do pedido: R$ ". $total ."</h3>";

            if ( count($_SESSION['carrinho'])<>0) {
                echo '<br><br><div class="botao"><a class="badd" href="finalizar.php">Finalizar</a></div>';
            }
		}


    ?>
    

    
    <script src="js/script.js"></script>

</body>
</html>