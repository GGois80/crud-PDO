<?php
	require_once 'class/conexao.class.php';
  $conexao = new Conexao();
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
			$query = "SELECT * FROM funcionarios";
      $exe = $conexao->getConexao()->prepare($query);
      $exe->execute();
			echo "<table border='5px'>
			<tr>
				<td> Nome </td>
        <td> Sexo </td>
        <td> Data Nascimento </td>
        <td> cpf </td>
        <td> Observações </td>
				<td> Excluir </td>
			</tr> ";

			while ($array = $exe->fetch(PDO::FETCH_ASSOC)){
				echo"<tr>
					<form action='php/deletar-func.php' method='post'>

						<td> $array[nome_func] </td>
            <td> $array[sexo_func] </td>
            <td> $array[data_nasc] </td>
            <td> $array[cpf] </td>
            <td> $array[observacoes] </td>
						<td> <input type='submit' value='OK'> </td>
						<input type='hidden' name='id' value='$array[id_func]'/>
					</form>
					</tr>";
			}
		?>
		</table>
	</body>
</html>
