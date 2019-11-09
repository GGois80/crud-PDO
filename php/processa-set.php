<meta charset="utf-8">
<?php
  require_once '../class/conexao.class.php';
  require_once '../class/valida.class.php';

  $valida = new Valida();
  $valida->setNome_setor($_POST["nome_setor"]);

  if($valida->ValidaSetor()==false){
    echo "<script> alert ('campo invalido'); location.href='../index.php'</script>";
    exit();
  }else{

  

  $conexao = new Conexao();

  $query = "INSERT INTO setores (nome) VALUES (:nome_setor)";
  $exe = $conexao->getConexao()->prepare($query);

  $exe->bindParam(':nome_setor', $_POST['nome_setor'], PDO::PARAM_STR);

  $exe->execute();

  if($exe->rowCount()){
    echo "<script>alert('Setor Cadastrado'); location.href='../index.php';</script>";
  }else{
    echo "<script>alert('Erro ao Cadastrar'); location.href='../index.php';</script>";
  }
}
?>
