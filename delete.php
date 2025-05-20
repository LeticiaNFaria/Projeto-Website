<?php
	    include 'check_login.php';
		include 'bd_connect.php';
		
		$id = $_GET['produto_id'];

		$sqlDelete = "delete from produtos where produto_id = $id";

        if (mysqli_query ($con, $sqlDelete) ){
            header('location:inserir_produtos.php?delete_pro=true');
        } else{
            header('location:inserir_produtos.php?error_delete=true');
        }
		
?>