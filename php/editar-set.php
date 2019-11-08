<?php
  require_once '../class/conexao.class.php';
  $conexao = new Conexao();
  $id = $_POST['id'];


  $query = "UPDATE setores SET nome = :nome WHERE id_setores = :id";
  //print_r ($query);exit();
  $executa = $conexao->getConexao()->prepare($query);

  $executa->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
  $executa->bindParam(':id', $id, PDO::PARAM_STR);

  if($executa->execute()){
    echo"<script> alert ('Setor Atualizado'); location.href='../edita-set.php';</script>";
  }else {
    echo"<script> alert ('Erro ao Atualizar'); location.href='../edita-set.php';</script>";
  }
?>
