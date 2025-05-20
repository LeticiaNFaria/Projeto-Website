<?php
    include 'check_login.php';
    include 'bd_connect.php';

    $id = $_GET['pedido_id'];

    $sqlgeraped = "update pedidos set status = 'finalizado' where pedido_id = '$id';";
	mysqli_query($con, $sqlgeraped) or die (mysqli_error($con));

    $sql = "update pedido_itens set status = 'finalizado' where pedido = '$id';";
	mysqli_query($con, $sql) or die (mysqli_error($con));

    header('Location: gerente.php');

?>