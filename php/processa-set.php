<?php
  require_once '../class/conexao.class.php';

  $conexao = new Conexao();

  $query = "INSERT INTO setores (nome) VALUES (:nome)";
  $exe = $conexao->getConexao()->prepare($query);

  $exe->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);

  $exe->execute();

  if($exe->rowCount()){
    echo "<script>alert('Setor Cadastrado'); location.href='../index.php';</script>";
  }else{
    echo "<script>alert('Erro ao Cadastrar'); location.href='../index.php';</script>";
  }
?>
