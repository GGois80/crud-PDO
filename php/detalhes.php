<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
		<meta charset="utf-8">
		<title>
			index
		</title>
	</head>
	<body>
		<header class="menu">
		<ul>
			<a href="../index.php"><li>Cadastrar Setor</li></a>
			<a href="../edita-set.php"><li>Atualizar Setor</li></a>
			<a href="../delete-set.php"><li>Deletar Setor</li></a>
			<a href="../funcionario.php"><li>Cadastrar Funcionario</li></a>
			<a href="../edita-func.php"><li>Atualizar Funcionario</li></a>
			<a href="../delete-func.php"><li>Deletar Funcionario</li></a>
			<a href="../listagem.php"><li>Listagem</li></a>
			
		</ul>
	</header>
	</body>
</html>	
	
<?php
    require_once '../class/conexao.class.php';
    $conexao = new Conexao();

    $id_funcionario = $_GET['id'];

    $sql = "SELECT s.nome AS nome_setor, nome_func, f.sexo_func, f.data_nasc, f.cpf, f.observacoes
    FROM funcionarios AS f INNER JOIN setores AS s ON s.id_setores = f.idSetor WHERE id_func = $id_funcionario";


    $dados = $conexao->getConexao()->prepare($sql);

    $dados->execute();

    $lista = $dados->fetch(PDO::FETCH_ASSOC);

    echo "<table border='5px'>
    <tr>
        <td>Nome</td>
        <td>Sexo</td>
        <td>Data de nascimento</td>
        <td>CPF</td>
        <td>OBS</td>
        <td>setor</td>
    </tr>

    <tr>
        <td> $lista[nome_func]   </td>
        <td> $lista[sexo_func]   </td>
        <td> $lista[data_nasc]   </td>
        <td> $lista[cpf]         </td>
        <td> $lista[observacoes] </td>
        <td> $lista[nome_setor]  </td>
    </tr>
</table>";


?>
