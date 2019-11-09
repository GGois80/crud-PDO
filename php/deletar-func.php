<meta charset="utf-8">
<?php
	require_once '../class/conexao.class.php';
  $conexao = new Conexao();
  $id = $_POST['id'];

	$query = "DELETE FROM funcionarios WHERE id_func = '$id'";
  $exe = $conexao->getConexao()->prepare($query);
	if($exe->execute()){
		echo "<script>alert('Funcionario Deletado'); location.href='../delete-func.php';  </script>";
	}else{
		echo "<script>alert ('Erro ao Deletar!'); location.href='../delete-func.php'; <script>";
	}

?>
