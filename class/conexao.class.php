<?php
class Conexao {
  public static $host = "localhost:3306";
  public static $usuario = "root";
  public static $senha = "1234";
  private static $banco = "empresa_fulls";
  private static $Connect = null;

  public function __construct(){
    try {
      if (self::$Connect == null){
        self::$Connect = new PDO ('mysql:host='. self::$host .';dbname='.self::$banco, self::$usuario, self::$senha);
      }
    } catch (Exception $ex) {
      echo 'Mensagem:' . $ex->getMessage();
      die;
    }
    return self::$Connect;
  }

  public function getConexao(){
    return self::$Connect;
  }
}
?>
