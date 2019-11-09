<?php
  require_once 'menu.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <title> Funcionario </title>
  </head>
  <body>
    <fieldset> <legend> Cadastro de Funcionario </legend>
      <form class="" action="php/processa-func.php" method="post">
        <p>Nome: <input type="text" name="nome" value=""> </p>
        <p>	Selecione Sexo:
          <input type="radio" name="sexo" value="m"> Masculino
          <input type="radio" name="sexo" value="f"> Feminino
        </p>
        <p> Data de Nascimento: <input type="date" name="data" value=""> </p>
        <p> cpf: <input type="text" name="cpf" value=""> </p>

        <p> Setor: <select class="" name="setor">
          <?php

          require_once 'class/conexao.class.php';

          $conexao = new Conexao();
          $query = "SELECT * FROM setores";

          $exe = $conexao->getConexao()->prepare($query);
          $exe->execute();

  					while ($arsetor = $exe->fetch(PDO::FETCH_ASSOC)) {
  						echo"<option value='$arsetor[id_setores]'> $arsetor[nome] </option>";
  					}

            ?>
        </select> </p>

        <p> Observações: <input type="text" name="obs"> </p>
        <p> <input type="submit" name="" value="Cadastrar"> </p>
      </form>
    </fieldset>
  </body>
</html>
