<?php
	require_once '../class/conexao.class.php';
  $conexao = new Conexao();
  $id = $_POST['id'];

	$query = "DELETE FROM setores WHERE id_setores = '$id'";
  $exe = $conexao->getConexao()->prepare($query);
	if($exe->execute()){
		echo "<script>alert('Setor Deletado'); location.href='../delete-set.php';  </script>";
	}else{
		echo "<script>alert ('Erro ao Deletar'); location.href='../delete-set.php'; <script>";
	}

?>
