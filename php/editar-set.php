<meta charset="utf-8">
<?php
  require_once '../class/conexao.class.php';
  require_once '../class/valida.class.php';

  $valida = new Valida();
  $valida->setNome_setor($_POST["nome_setor"]);

  if($valida->ValidaSetor()==false){
    echo "<script> alert ('campo invalido'); location.href='../edita-set.php'</script>";
    exit();
  }else{

  $conexao = new Conexao();
  $id = $_POST['id'];


  $query = "UPDATE setores SET nome = :nome_setor WHERE id_setores = :id";
  //print_r ($query);exit();
  $executa = $conexao->getConexao()->prepare($query);

  $executa->bindParam(':nome_setor', $_POST['nome_setor'], PDO::PARAM_STR);
  $executa->bindParam(':id', $id, PDO::PARAM_STR);

  if($executa->execute()){
    echo"<script> alert ('Setor Atualizado'); location.href='../edita-set.php';</script>";
  }else {
    echo"<script> alert ('Erro ao Atualizar'); location.href='../edita-set.php';</script>";
  }
}
?>
