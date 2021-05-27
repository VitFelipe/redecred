<?php
 namespace Model{


  class Banco {

  


private $bancoId;
private $descricao;
private $sigla;

//Get e Sette
public function getBancoId(){
return $this->bancoId;
}

public function getDescricao(){
return $this->descricao;
}


public function getSigla(){
  return $this->sigla;
}


public function setSigla($sigla){
   $this->sigla = $sigla;
}


public function setDescricao($descricao){
 $this->descricao = $descricao ;
}

public function setBancoId($bancoId){
 $this->bancoId = $bancoId ;
}

}

}

?>