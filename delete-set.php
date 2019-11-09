<?php
	require_once 'class/conexao.class.php';
  $conexao = new Conexao();
  require_once 'menu.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>
		atualização
		</title>
	</head>
	<body>

		<?php
			$query = "SELECT * FROM setores";
      $exe = $conexao->getConexao()->prepare($query);
      $exe->execute();
			echo "<table border='5px'>
			<tr>
				<td> Nome </td>
				<td> Excluir </td>
			</tr> ";

			while ($array = $exe->fetch(PDO::FETCH_ASSOC)){
				echo"<tr>
					<form action='php/deletar-set.php' method='post'>

						<td> $array[nome] </td>
						<td> <input type='submit' value='OK'> </td>
						<input type='hidden' name='id' value='$array[id_setores]'/>
					</form>
					</tr>";
			}
		?>
		</table>
	</body>
</html>
