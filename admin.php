<?php
    include 'check_login.php';
    include 'bd_connect.php';
	$usuario = $_SESSION['usuario'];

    if($_SESSION['nivel'] != 'A'){
        header('location:login.php?access=true');
        exit;
    }

    if(!empty($_GET['search'])){
	    $data = $_GET['search'];
	    $sql = "select * from pedidos where status = 'pendente' and pedido_id like '%$data%' or status = 'pendente' and nome like '%$data%' or status = 'pendente' and cod_cliente like '%$data%' order by pedido_id desc";
    }else{
	    $sql = "select * from pedidos where status = 'pendente' order by pedido_id desc";
    }

    $result = $con->query($sql);
	
	if(!empty($_GET['pes'])){
	    $data = $_GET['pes'];
	    $s = "select * from pedidos where status = 'finalizado' and pedido_id like '%$data%' or status = 'finalizado' and nome like '%$data%' or status = 'finalizado' and cod_cliente like '%$data%' order by pedido_id desc";
    }else{
	    $s = "select * from pedidos where status = 'finalizado' order by pedido_id desc";
    }

    $resultado = $con->query($s);
    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
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
                <li><a href="#pesquisa" class="nav-link">Pedidos</a></li>
                <li><a href="cria_usuarios.php" class="nav-link">Add Usuários</a></li>
				<li><a href="inserir_produtos.php" class="nav-link">Produtos</a></li>
                <li><a href="#area-contato" class="nav-link">Contato</a></li>
                <li><a href="logout.php" class="nav-link-bnt">Sair</a></li>
            </ul>

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"> <img class="icon" src="img/barra.png" alt=""> </button>
            </div>
        </div>
        

        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="#pesquisa" class="nav-link">Pedidos</a></li>
                <li class="nav-item"><a href="cria_usuarios.php" class="nav-link">Add Usuários</a></li>
				<li class="nav-item"><a href="inserir_produtos.php" class="nav-link">Produtos</a></li>
                <li class="nav-item"><a href="#area-contato" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link-bnt">Sair</a></li>
            </ul>
        </div>
    </header>

	<section class="pesquisa" id="pesquisa">
    <div class='boxsearch'>
			<input type="search" placeholder="Pesquisar" id="pesquisar">
			<button onclick="searchData()" class="bntsearch">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
					<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
				</svg>
			</button>
	</div>
	<br>
	<div class ="div-pesquisa">
		<table class="tb" cellspacing="10" cellpadding="5">
		  <thead class="thead">
			<tr>
			  <th>Código</th>
			  <th>Data e hora</th>
			  <th>Código cliente</th>
			  <th>Nome</th>
			  <th>Valor total</th>
			  <th>Status</th>
			  <!--th>Configurar</th-->
			</tr>
		  </thead>
		  <tbody> 
			<?php
				while($user_data = mysqli_fetch_assoc($result))
				{
					echo "<tr>";
					echo "<td>".$user_data['pedido_id']."</td>";
					echo "<td>".$user_data['datahora']."</td>";
					echo "<td>".$user_data['cod_cliente']."</td>";
					echo "<td>".$user_data['nome']."</td>";
					echo "<td>R$ ".$user_data['total']."</td>";
					echo "<td>".$user_data['status']."</td>";
					echo "</tr>";
				}
			?>
		  </tbody>
		</table>
	</div>



	<div class='boxsearch'>
			<input type="search" placeholder="Pesquisar" id="pes">
			<button onclick="searchData()" class="bntsearch">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
					<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
				</svg>
			</button>
	</div>
	<br>
	<div class ="div-pesquisa">
		<table class="tb" cellspacing="10" cellpadding="5">
		  <thead class="thead">
			<tr>
			  <th>Código</th>
			  <th>Data e hora</th>
			  <th>Código cliente</th>
			  <th>Nome</th>
			  <th>Valor total</th>
			  <th>Status</th>
			  <!--th>Configurar</th-->
			</tr>
		  </thead>
		  <tbody> 
			<?php
				while($user_data = mysqli_fetch_assoc($resultado))
				{
					echo "<tr>";
					echo "<td>".$user_data['pedido_id']."</td>";
					echo "<td>".$user_data['datahora']."</td>";
					echo "<td>".$user_data['cod_cliente']."</td>";
					echo "<td>".$user_data['nome']."</td>";
					echo "<td>R$ ".$user_data['total']."</td>";
					echo "<td>".$user_data['status']."</td>";
					echo "</tr>";
				}
			?>
		  </tbody>
		</table>
	</div>


	</section>

	<br><br><br><br><br><br><br><br><br><br>
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

    <script>
	var search = document.getElementById("pesquisar");
	
	search.addEventListener("keydown", function(event){
		if (event.key === "Enter")
		{
			searchData();
		}
	});
	
	function searchData()
	{
		window.location = 'admin.php?search='+search.value;
	}
	
	
	var pes = document.getElementById("pes");
	
	pes.addEventListener("keydown", function(event){
		if (event.key === "Enter")
		{
			pesData();
		}
	});
	
	function pesData()
	{
		window.location = 'admin.php?pes='+pes.value;
	}
	
</script>

</body>
</html>