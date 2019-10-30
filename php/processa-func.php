<?php
  require_once '../class/conexao.class.php';

  $conexao = new Conexao();

  $query = "INSERT INTO funcionarios (nome_func, sexo_func, data_nasc, cpf, observacoes, idSetor) VALUES (:nome, :sexo, :data, :cpf, :obs, :setor)";
  $exe = $conexao->getConexao()->prepare($query);

  $exe->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
  $exe->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
  $exe->bindParam(':data', $_POST['data'], PDO::PARAM_STR);
  $exe->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
  $exe->bindParam(':obs', $_POST['obs'], PDO::PARAM_STR);
  $exe->bindParam(':setor', $_POST['setor'], PDO::PARAM_STR);

  $exe->execute();

  if($exe->rowCount()){
    echo "<script>alert('Setor Cadastrado'); location.href='../index.php';</script>";
  }else{
    echo "<script>alert('Erro ao Cadastrar'); location.href='../index.php';</script>";
  }
?>
