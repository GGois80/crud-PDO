<?php
  require_once '../class/conexao.class.php';
  require_once '../class/valida.class.php';

  $valida = new Valida();
  $valida->setNome($_POST["nome"]);
  $valida->setSexo($_POST["sexo"]);
  $valida->setData($_POST["data"]);
  $valida->setCpf($_POST["cpf"]);
  $valida->setObs($_POST["obs"]);
  $valida->setSetor($_POST["setor"]);

  if($valida->validaBranco()==false){
    echo "<script> alert ('Não Envie Campos em Branco'); location.href='../funcionario.php'</script>";
    exit();
  }else if ($valida->validaCPF()==false){
    echo "<script>alert ('Cpf Inavlido'); location.href='../funcionario.php'</script>";
    exit();
  }else if (!$valida->validaString()==true) {
    echo "<script>alert ('Não Envie Números no Campo Nome'); location.href='../funcionario.php'</script>";
    exit();
  }else if ($valida->ValidaData()==false){
    echo "<script>alert ('Formato de Data Invalido');  location.href='../funcionario.php' </script>";
    exit();
  }else if ($valida->ValidaTamanho()==false){
    echo "<script>alert ('Tamanho de Campo maior que permitido');  </script>";
    exit();
  }else

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
      echo "<script>alert('Funcionario Cadastrado'); location.href='../funcionario.php';</script>";
    }else{
      echo "<script>alert('Erro ao Cadastrar'); location.href='../funcionario.php';</script>";
    }
  


?>
