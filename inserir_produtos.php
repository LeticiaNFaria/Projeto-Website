<?php
    include 'bd_connect.php';
    include 'check_login.php';
	
    if(isset($_FILES['imagem'])) {
        $arquivo = $_FILES['imagem'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $tipo = $_POST['tipo'];

        if($arquivo['error']){
		    header('location:inserir_produtos.php?erro_inserir=true');
        }

        $pasta = "img/";
        $nomeDoArquivo = $arquivo['name'];
	    $novoNomeDoArquivo = uniqid();
	    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png"){
            header('location:inserir_produtos.php?erro_inserir=true');
        }

        $imagem = $pasta . $novoNomeDoArquivo . "." . $extensao;

        if ($tipo == "BEBIDA"){
            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $imagem);
            if ($deu_certo) {
                
                $con->query("insert into produtos (tipo, imagem, nome, valor) values('$tipo', '$imagem', '$nome', '$valor')") or die($conexao->error);
                echo "<p>Arquivo enviado com sucesso! </p>";
            } else 
                header('location:inserir_produtos.php?erro_inserir=true');
        }

        if ($tipo == "COMIDA"){
            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $imagem);
            if ($deu_certo) {
                
                $con->query("insert into produtos (tipo, imagem, nome, valor) values('$tipo', '$imagem', '$nome', '$valor')") or die($conexao->error);
                echo "<p>Arquivo enviado com sucesso! </p>";
            } else 
                header('location:inserir_produtos.php?erro_inserir=true');
        }

    }

    if(!empty($_GET['search']))
	{
		$data = $_GET['search'];
		$sql = "select * from produtos where produto_id like '%$data%' or nome like '%$data%' or tipo like '%$data%' order by produto_id";
	} 
	else 
	{
		$sql = "select * from produtos order by produto_id";
	}

	$result = mysqli_query($con,$sql);
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
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
               <!-- <li class="nav-item" ><a href="#home" class="nav-link">Home</a></li>-->
                <li class="nav-item"><a href="admin.php#pesquisa" class="nav-link">Pedidos</a></li>
                <li class="nav-item"><a href="cria_usuarios.php" class="nav-link">Add Usuários</a></li>
                <li class="nav-item"><a href="inserir_produtos.php" class="nav-link">Produtos</a></li>
                <li class="nav-item"><a href="admin.php#area-contato" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link-bnt">Sair</a></li>
            </ul>
        </div>
    </header>
    <section class="arquivo">
    <div class="upload">
		
			<form method="POST" enctype="multipart/form-data" action="">
                <h1 class="centro">Adicionar novos produtos</h1>
				<input type="text" name="nome" placeholder="Nome do Produto">
				<br><br>
				<input type="number" step="any" min="0" name="valor" placeholder="Valor do Produto">
				<br><br>
				<div class="div-select">
					<select name="tipo" class="input-form" required>
						<option selected disabled value="">Selecione o tipo de produto</option>
						<option value="BEBIDA">BEBIDA</option>
						<option value="COMIDA">COMIDA</option>
					</select>
				</div>
				<br>
				<label for="arquivo">Selecione o arquivo</label>
				<input type="file" name="imagem" id="arquivo" required>
				<br>
				<button type="submit">Enviar arquivo</button>
		</form>
		</div>
    </section>

    <section class="pes-produto" id ="pes-produto">
    <div class='boxsearch'>
			<input type="search" placeholder="Pesquisar" id="pesquisar">
			<button onclick="searchData()" class="bntsearch">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
					<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
				</svg>
			</button>
		</div>

    <div class="tb-produto">
    <table class="tb" cellspacing="10" cellpadding="5">
		  <thead>
			<tr>
			  <th>Código</th>
			  <th>Tipo</th>
			  <th>Nome</th>
              <th>Valor</th>
			  <th>Imagem</th>
			  <th>Configurar</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
				while($user_data = mysqli_fetch_assoc($result))
				{
					echo "<tr>";
					echo "<td>".$user_data['produto_id']."</td>";
					echo "<td>".$user_data['tipo']."</td>";
					echo "<td>".$user_data['nome']."</td>";
                    echo "<td>".$user_data['valor']."</td>";
					echo "<td><img class='imagem-tb' src='".$user_data['imagem']."'></td>";
					echo "<td>
						<!--<a class='bnt' href='edit.php?produto_id=".$user_data['produto_id']."'><img src='img/editar.png'></a>-->
						
						
						<a class='bnt2' href='delete.php?produto_id=".$user_data['produto_id']."'><img src='img/excluir.png'></a>
						
					</td>";
					echo "</tr>";
				}
			?>
		  </tbody>
		</table>

    </div>
    </section>
    
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
		window.location = 'inserir_produtos.php?search='+search.value;
	}
	</script>

</body>
</html>