<meta charset="utf-8">
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
