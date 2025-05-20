<?php
    include 'check_login.php';
    include 'bd_connect.php';
    $nome = $_SESSION['nome'];
    $id_cliente = $_SESSION['id_cliente'];
    $total = 0.0;

    $sqlgeraped = "insert into pedidos (cod_cliente, nome, status, total) values ( '$id_cliente', '$nome', 'pendente', '$total');";
	mysqli_query($con, $sqlgeraped) or die (mysqli_error($con));

    $x = 'select max(pedido_id) as maiorcodigo from pedidos;';

    $queryconsulta = mysqli_query($con,$x) or die (mysqli_error());
	$produtos = mysqli_fetch_assoc($queryconsulta);

    $ultpedido =0;
	$ultpedido = $produtos['maiorcodigo'];

    foreach ($_SESSION['carrinho'] as $id => $qtd)
					{
						$sql = "select produto_id, imagem, nome, valor from produtos where produto_id = '$id'";
						
						$resultado = mysqli_query($con,$sql) or die (mysqli_error());
						$registro = mysqli_fetch_array($resultado);
						$produto = $registro[1];
                        $nome = $registro[2];
						$valor = $registro[3];
                        $valor = $valor * $qtd;
						$codproduto = $registro[0];
                        $total = $total + $valor;
						
						$inspeditem = "insert into pedido_itens (produto, nome, valor, qtd, codproduto, pedido, status) values('$produto', '$nome', '$valor', '$qtd', '$codproduto', '$ultpedido', 'pendente')";
						
						mysqli_query($con,$inspeditem) or die (mysqli_error());
					}
    $s = "update pedidos set total = '$total' where pedido_id = '$ultpedido'";
    mysqli_query($con, $s) or die (mysqli_error($con));
    
    $_SESSION['carrinho'] = array();
    header('Location: carrinho.php');



?>