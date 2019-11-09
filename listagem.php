<?php
	require_once 'class/conexao.class.php';
	require_once 'menu.php';
?>


<html>
	<head>
		<meta charset="utf-8">
		<title>
		    listagem
		</title>
	</head>
	<body>
	
		<table border="5px">
			<tr>
				<td> Nome </td>
				<td> Detalhes </td>
			</tr>	
		
		<?php
            $conexao = new Conexao();

			$query = "SELECT id_func, nome_func FROM funcionarios ORDER BY nome_func ASC";
            $lista = $conexao->getConexao()->prepare($query);
          
            $lista->execute();



			while ($dados = $lista->fetch(PDO::FETCH_ASSOC)){
				echo"<tr>
						<td>$dados[nome_func]</td>
						<td><a href='php/detalhes.php?id=$dados[id_func]'> VER </a> </td>
					</tr>";
			}
		?>
		</table>
	</body>
</html>