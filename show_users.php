<?php
    if(!isset($_SESSION['usuario'])){ //existe algum erro aí?
        header('location:login.php?login=true');
        exit;
    }

    include 'bd_connect.php';
    $query = "select * from usuarios";
    $usuarios = mysqli_query($con,$query);


    

        echo "<table class='tb' cellspacing='10' cellpadding='5'>
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Nível de acesso</th>
            <th>Email</th>
            <th>Remover</th>
            <th>Alterar senha</th>
            <!--th>Configurar</th-->
          </tr>
        </thead>
        <tbody>";
          
            while($row = mysqli_fetch_assoc($usuarios)) {
                  echo "<tr>";
                  echo "<td>".$row['id_usuario']."</td>";
                  echo "<td>".$row['username']."</td>";
                  echo "<td>".$row['name']."</td>";
                  echo "<td>".$row['level']."</td>";
                  echo "<td>".$row['email']."</td>";
                  echo "<td><a href='confirm_remove.php?user=".$row['username']."'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' color='black' fill='currentColor' class='bi bi-x-square' viewBox='0 0 16 16'>
						  <path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
						  <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
				    </svg>
                  </a></td>";
                  echo "<td><a href='altera_senha.php?user=".$row['username']."'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' color='black' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                <path stroke-linecap='round' stroke-linejoin='round' d='M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10' />
                </svg>
                  </a></td>";
                  echo "</tr>";
              }

       echo " </tbody>
      </table> <br><br><br><br><br><br><br><br><br><br>";
        
?>

