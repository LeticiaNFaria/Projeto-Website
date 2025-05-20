<?php 
	$host = "localhost";
	$user = "root";
	$password = "patrick147";
	$database = "bakerycoffee";

    $con = mysqli_connect($host, $user, $password, $database);

    if( mysqli_connect_error() ){
		echo "Erro ao conectar com o banco de dados: ";
	}/*else{
		echo "Banco de dados conectado com sucesso!";
	}*/
?>
