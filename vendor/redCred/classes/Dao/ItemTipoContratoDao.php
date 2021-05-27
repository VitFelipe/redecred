<?php namespace Dao{
use \BD\Conection;





class ItemTipoContratoDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}



public function salvar($convenioId , $tipoContratoId){
    try{
        
    $stm =  $this->con->prepare("INSERT INTO `u440036343_mydb`.`item_tipo_contrato`
    (`tipo_contrato_id`,
    `convenio_contrato_id`)
    VALUES
    ( 
    :tipo_contrato_id ,
    :convenio_contrato_id );");

    $stm->bindParam(":tipo_contrato_id",$tipoContratoId );
    $stm->bindParam(":convenio_contrato_id",$convenioId );
    $stm->execute();


    $stm =  $this->con->query("SELECT LAST_INSERT_ID() AS id;");
    $itemTipoContrato = $stm->fetchAll(\PDO::FETCH_ASSOC);

    return  $itemTipoContrato[0]["id"];
    
    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}



public function excluir($id){
    
    $stm =  $this->con->prepare("DELETE FROM `u440036343_mydb`.`item_tipo_contrato`
    WHERE  item_tipo_contrato_id = :id  ;");
    $stm->bindParam(":id",$id );
    $stm->execute();
}


public function findAllToConvenio($convenioId){
    
    $stm =  $this->con->prepare("select 
    itc.item_tipo_contrato_id,
    tc.descricao  as tipo_contrato,
    b.descricao as banco,
    cc.descricao as convenio
     
     from
     u440036343_mydb.item_tipo_contrato itc , 
     u440036343_mydb.tipo_contrato tc ,
     u440036343_mydb.convenio_contrato cc,
     u440036343_mydb.banco b
     where   
     itc.tipo_contrato_id = tc.tipo_contrato_id
     and cc.convenio_contrato_id =  itc.convenio_contrato_id
     and cc.banco_banco_id = b.banco_id
     and  itc.convenio_contrato_id =  :convenio_id");
    $stm->bindParam(":convenio_id",$convenioId);
    $stm->execute();
    $itensTiposContrato = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $itensTiposContrato;
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