<?php
  require_once 'menu.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <title> Setor </title>
  </head>
  <body>
    <fieldset> <legend> Cadastro de Setor </legend>
    <form class="" action="php/processa-set.php" method="post">
      <p> Digite setor: <input type="text" name="nome_setor" value=""> </p>
      <input type="submit" value="Ok">
    </form>
  </fieldset>
  </body>
</html>
