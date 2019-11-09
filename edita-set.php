<?php
  require_once 'menu.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>edita setor</title>
  </head>
  <body>
      <?php
        require_once 'class/conexao.class.php';
        $conexao = new Conexao();


        $query = "SELECT * FROM setores";
        $exe = $conexao->getConexao()->prepare($query);
        $exe->execute();

        echo" <table border='5px'>
          <tr>
            <td> Setor </td>
            <td> Editar </td>
          </tr>";

          while ($array= $exe->fetch(PDO::FETCH_ASSOC)){
    				echo"<tr>
    					<form action='php/editar-set.php' method='post'>
    						<td> <input type='text' name='nome_setor' value='$array[nome]'/> </td>";

        echo"</td>
          <td> <input type='submit' value='OK'> </td>
          <input type='hidden' name='id' value='$array[id_setores]'/>
        </form>
        </tr>";
        }
        echo "</table>";
      ?>
  </body>
</html>
