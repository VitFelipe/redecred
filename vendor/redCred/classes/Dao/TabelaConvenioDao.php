<?php namespace Dao{
use \BD\Conection;





class TabelaConvenioDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}



public function salvar($convenioId,$descricao){
    try{
        
    $stm =  $this->con->prepare("INSERT INTO u440036343_mydb.tabela_convenio(descricao,convenio_contrato_id) values(:descricao,:convenioId)");
    $stm->bindParam(":descricao",$descricao );
    $stm->bindParam(":convenioId",$convenioId);
   
    $stm->execute();
   
    echo "sucesso";
    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}



public function excluir($id){
    
    $stm =  $this->con->prepare("DELETE FROM u440036343_mydb.tabela_convenio  where tabela_convenio_id = :id ");
    $stm->bindParam(":id",$id );
    $stm->execute();
}


public function findAll(){
    
    $stm =  $this->con->query("select 
    tc.tabela_convenio_id,
    tc.descricao,
    b.descricao as banco,
    c.descricao as convenio
     from 
    u440036343_mydb.tabela_convenio tc ,
     u440036343_mydb.convenio_contrato c , 
     u440036343_mydb.banco b 
    where 
    tc.convenio_contrato_id = c.convenio_contrato_id
    and b.banco_id = c.banco_banco_id;");
    $bancos = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $bancos;
}



public function findToConvenio($convenioId){
    
    $stm =  $this->con->prepare("select tc.* from  u440036343_mydb.tabela_convenio tc  where tc.convenio_contrato_id  = :convenioId;");
    $stm->bindParam(":convenioId",$convenioId);
    $stm->execute();
    $tabelas = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $tabelas;
}



public function findPrimaryKey($id){
    
    $stm =  $this->con->prepare("select 
     tc.tabela_convenio_id ,
     tc.descricao ,
     b.descricao as banco ,
     c.descricao as convenio ,
     c.convenio_contrato_id ,
     b.banco_id
from 
     u440036343_mydb.tabela_convenio tc ,
     u440036343_mydb.convenio_contrato c , 
     u440036343_mydb.banco b 
where 
    tc.convenio_contrato_id = c.convenio_contrato_id
    and b.banco_id = c.banco_banco_id
    and tc.tabela_convenio_id = :id ;");
    $stm->bindParam(":id",$id);

    $stm->execute();
   

    $tabelaConvenio = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $tabelaConvenio[0];
}





public function alterar($convenioId,$descricao,$tabelaConvenioId){
    try{
        
    $stm =  $this->con->prepare(" UPDATE  u440036343_mydb.tabela_convenio tc set tc.descricao = :descricao , tc.convenio_contrato_id =  :convenio_contrato_id where tc.tabela_convenio_id = :tabela_convenio_id ;");
    $stm->bindParam(":descricao",$descricao );
    $stm->bindParam(":convenio_contrato_id",$convenioId);
    $stm->bindParam(":tabela_convenio_id",$tabelaConvenioId);
   
    $stm->execute();
   
    echo "sucesso";
    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}








}


}


?>