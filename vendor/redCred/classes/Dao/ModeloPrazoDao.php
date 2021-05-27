<?php namespace Dao{
use \BD\Conection;





class ModeloPrazoDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}



public function salvar($descricao){
    try{
        
    $stm =  $this->con->prepare("insert into u440036343_mydb.tipo_contrato(descricao) values(:descricao);");
    $stm->bindParam(":descricao",$descricao );
    $stm->execute();
    echo "sucesso";
    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}



public function excluir($id){
    
    $stm =  $this->con->prepare("delete from u440036343_mydb.tipo_contrato where tipo_contrato_id =  :id ");
    $stm->bindParam(":id",$id );
    $stm->execute();
}


public function findAll(){
    
    $stm =  $this->con->query("SELECT * FROM u440036343_mydb.modelo_prazo;");
    $modelos = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $modelos;
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





public function alterar($tipoContratoId,$descricao){
    try{
        
    $stm =  $this->con->prepare("update u440036343_mydb.tipo_contrato tc set  tc.descricao = :descricao where tc.tipo_contrato_id = :tipo_contrato_id;");
    $stm->bindParam(":descricao",$descricao );
    $stm->bindParam(":tipo_contrato_id",$tipoContratoId);
   
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