<?php
class Valida {

  private $nome;
  private $sexo;
  private $data;
  private $cpf;
  private $obs;
  private $setor;

  public function setNome($nome){
    $this->nome = $nome;
  }
  public function getNome(){
    return $this->nome;
  }

  public function setSexo($sexo){
    $this->sexo = $sexo;
  }
  public function getSexo(){
    return $this->sexo;
  }

  public function setData($data){
    $this->data = $data;
  }
  public function getData(){
    return $this->data;
  }

  public function setCpf($cpf){
    $this->cpf = $cpf;
  }
  public function getCpf(){
    return $this->cpf;
  }

  public function setObs($obs){
    $this->obs = $obs;
  }
  public function getObs(){
    return $this->obs;
  }

  public function setSetor($setor){
    $this->setor = $setor;
  }
  public function getSetor(){
    return $this->setor;
  }

    public function validaCPF() {

    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $this->cpf );

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($this->cpf) != 11) {
        return false;
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $this->cpf)) {
        return false;
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;
}

public function validaBranco() {
  if(empty($this->nome) || empty($this->sexo) || empty($this->data) || empty($this->cpf) || empty($this->obs) || empty($this->setor)){
    return false;
  }else{
    return true;
  }
}

public function validaString(){
  if (!is_numeric($this->nome) and (!is_numeric($this->sexo))) {
    return true;
  }else{
    return false;
  }
}
  public function ValidaData(){
    //data[0]= ano data[1] = mes e data[2] = dia
    $data =explode('-',$this->data);
    if($data[0]<1900 || $data[1]>12 || $data[3]>31){
      return false;
    }else{
      return true;
    }
  }

  public function ValidaTamanho(){
    if(strlen($this->nome)>30 || strlen($this->sexo)>5 || strlen($this->data)>15 || strlen($this->obs)>255){
      return false;
    }else{
      return true;
    }
  }



}
