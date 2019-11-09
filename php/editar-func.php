<meta charset="utf-8">
<?php
  require_once '../class/conexao.class.php';
  require_once '../class/valida.class.php';

  $id = $_POST['id'];



  $valida = new Valida();
  $valida->setNome($_POST["nome"]);
  $valida->setSexo($_POST["sexo"]);
  $valida->setData($_POST["data"]);
  $valida->setCpf($_POST["cpf"]);
  $valida->setObs($_POST["obs"]);
  $valida->setSetor($_POST["setor"]);

  if($valida->validaBranco()==false){
    echo "<script> alert ('Não Envie Campos em Branco'); location.href='../edita-func.php'</script>";
    exit();
  }else if ($valida->validaCPF()==false){
    echo "<script>alert ('Cpf Inavlido'); location.href='../edita-func.php'</script>";
    exit();
  }else if (!$valida->validaString()==true) {
    echo "<script>alert ('Campos Invalidos'); location.href='../edita-func.php'</script>";
  }else{

  $conexao = new Conexao();

  $query = "UPDATE funcionarios SET nome_func=:nome, sexo_func=:sexo, data_nasc = :data, cpf=:cpf, observacoes=:obs, idSetor=:setor WHERE id_func=:id";
  //echo $query;exit;
  $executa = $conexao->getConexao()->prepare($query);

  $executa->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
  $executa->bindParam(':id', $id, PDO::PARAM_STR);
  $executa->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
  $executa->bindParam(':data', $_POST['data'], PDO::PARAM_STR);
  $executa->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
  $executa->bindParam(':obs', $_POST['obs'], PDO::PARAM_STR);
  $executa->bindParam(':setor', $_POST['setor'], PDO::PARAM_STR);



  if($executa->execute()){
    echo "<script>alert('Funcionario Atualizado'); location.href='../edita-func.php';</script>";
  }else{
    echo "<script>alert('Erro ao Atualizar'); location.href='../edita-func.php';</script>";
  }
}
?>
