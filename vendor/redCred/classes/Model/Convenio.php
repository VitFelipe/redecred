<?php namespace Model{


  class Convenio {

private $conenioId;
private $bancoId;
private $descricao;

//Get e Sette
public function getConenioId(){
return $this->conenioId;
}

public function getBancoId(){
    return $this->bancoId;
    }

public function getDescricao(){
return $this->descricao;
}


public function setDescricao($descricao){
 $this->descricao = $descricao ;
}

public function setBancoId($bancoId){
 $this->bancoId = $bancoId ;
}

public function setConenioId($conenioId){
 $this->conenioId = $conenioId ;
    }

}

}

?>