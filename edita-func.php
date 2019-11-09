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
            $query = "SELECT * FROM funcionarios";
            $exe = $conexao->getConexao()->prepare($query);
            $exe->execute();

			echo "<table border='5px'>
			<tr>
				<td> Nome funcionario </td>
				<td> Sexo funcionario </td>
				<td> Data Nascimento  </td>
        <td> CPF              </td>
				<td> Observações      </td>
				<td> Setor            </td>
				<td> Editar           </td>
			</tr> ";

			while ($set= $exe->fetch(PDO::FETCH_ASSOC)){
				echo"<tr>
					<form action='php/editar-func.php' method='post'>

						<td> <input type='text' name='nome' value='$set[nome_func]'/>  </td>
						<td> <input type='text' name='sexo' value='$set[sexo_func]'/>  </td>
						<td> <input type='text' name='data' value='$set[data_nasc]'/>  </td>
            <td> <input type='text' name='cpf' value='$set[cpf]'/>         </td>
						<td> <input type='text' name='obs' value='$set[observacoes]'/> </td>
			<td>
			<select name='setor'/>";
					$querySetor="SELECT * FROM setores WHERE id_setores = ".$set['idSetor']."";
					$exeSetor= $conexao->getConexao()->prepare($querySetor);
          $exeSetor -> execute();
					$arsetor = $exeSetor->fetch(PDO::FETCH_ASSOC);
					echo"<option value='$arsetor[id_setores]'> $arsetor[nome] </option>";

					$querySetor = "SELECT * FROM setores WHERE id_setores != ".$set['idSetor']."";
					$exeSetor = $conexao->getConexao()->prepare($querySetor);
          $exeSetor -> execute();
					while ($arsetor = $exeSetor->fetch(PDO::FETCH_ASSOC)) {
						echo"<option value='$arsetor[id_setores]'> $arsetor[nome] </option>";
					}
			echo "</select>
					</td>
						<td> <input type='submit' value='OK'> </td>
						<input type='hidden' name='id' value='$set[id_func]'/>

					</form>
					</tr>";
			}
		?>
		</table>
	</body>
</html>
