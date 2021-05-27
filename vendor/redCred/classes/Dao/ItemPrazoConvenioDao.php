<?php namespace Dao{
use \BD\Conection;





class ItemPrazoConvenioDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}



public function salvar($modeloPrazoId,$itemTipoModelo){
    try{
    $dataTime  = new \DateTime();
    $dataAlteracao =  $dataTime->format('Y-m-d H:i:s');
    $comissa = 0;
        
    $stm =  $this->con->prepare("INSERT INTO `u440036343_mydb`.`item_prazo_convenio`
    (`modelo_prazo_id`,
    `comissao`,
    `data_alteracao`,
    `item_tipo_contrato_id`)
    VALUES
    (
    :modelo_prazo_id ,
    :comissao ,
    :data_alteracao ,
    :item_tipo_contrato_id );");
    $stm->bindParam(":modelo_prazo_id",$modeloPrazoId );
    $stm->bindParam(":comissao",$comissa );
    $stm->bindParam(":data_alteracao",$dataAlteracao );
    $stm->bindParam(":item_tipo_contrato_id",$itemTipoModelo );
    $stm->execute();
   
    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}



public function excluir($id){
    
    $stm =  $this->con->prepare("DELETE FROM `u440036343_mydb`.`item_prazo_convenio`
    WHERE item_prazo_convenio_id = :id ;");
    $stm->bindParam(":id",$id );
    $stm->execute();
}


public function findToItemTipoContrato($itemTipoContratoId){
    
    $stm =  $this->con->prepare("SELECT 
    itpc.item_prazo_convenio_id ,  
    itpc.comissao , 
    mp.descricao ,
    itpc.item_tipo_contrato_id ,
    b.descricao as banco,
    cc.descricao as convenio ,
    cc.convenio_contrato_id,
    tc.descricao as tipo_contrato
   from
       u440036343_mydb.item_prazo_convenio itpc,
        u440036343_mydb.modelo_prazo mp ,
        u440036343_mydb.item_tipo_contrato itc , 
         u440036343_mydb.tipo_contrato tc ,
         u440036343_mydb.convenio_contrato cc,
         u440036343_mydb.banco b
       
     where
     itpc.modelo_prazo_id = mp.modelo_prazo_id
       and itc.tipo_contrato_id = tc.tipo_contrato_id
        and cc.convenio_contrato_id =  itc.convenio_contrato_id
        and cc.banco_banco_id = b.banco_id
        and itpc.item_tipo_contrato_id =  itc.item_tipo_contrato_id
        and itpc.item_tipo_contrato_id = :item_tipo_contrato order by mp.modelo_prazo_id
   ");

$stm->bindParam(":item_tipo_contrato",$itemTipoContratoId );
$stm->execute();
    $itemPrazo = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $itemPrazo;
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





public function alterarPrazos($prazos){
    try{

      
        foreach ($prazos as $key => $value){
            $stm =  $this->con->prepare("UPDATE  u440036343_mydb.item_prazo_convenio
            SET
            comissao  = :comissao 
            WHERE item_prazo_convenio_id =  :item_prazo_convenio ");
            $stm->bindParam(":comissao",$value[0]);
            $stm->bindParam(":item_prazo_convenio",$key);
           
            $stm->execute();

        }
        
    
   

    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}




public function findPrazo($itemPrazoId){
    try{

            $stm =  $this->con->prepare("SELECT 
            itpc.comissao ,
            mp.descricao
        FROM  u440036343_mydb.item_prazo_convenio itpc , u440036343_mydb.modelo_prazo mp 
        where itpc.modelo_prazo_id = mp.modelo_prazo_id 
        and itpc.item_prazo_convenio_id = :itemPrazoId ; ");
            $stm->bindParam(":itemPrazoId",$itemPrazoId);          
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            return $result[0];

    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}



public function findAll(){
    try{

           $stm =  $this->con->query("SELECT itpc.* , mp.descricao as modelo_prazo 
           FROM u440036343_mydb.item_prazo_convenio itpc  ,  
            u440036343_mydb.modelo_prazo mp
             where itpc.modelo_prazo_id = mp.modelo_prazo_id ;");
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $result;

    }catch(Exception $e){
      return $e->getMessage();
    }
}


public function findPrazosNaoAtualizados($ids){

  $placeHolders = implode(', ', array_fill(0, count($ids), '?'));
 // var_dump( $placeHolders);
  //var_dump($ids);

  $sql  = "select 
  itpc.item_prazo_convenio_id,
  mp.descricao as modelo ,
  itpc.item_tipo_contrato_id
   from
   u440036343_mydb.item_prazo_convenio itpc ,
   u440036343_mydb.modelo_prazo mp
   where 
   mp.modelo_prazo_id = itpc.modelo_prazo_id
   ";

   if($ids != 0){
   $sql .= "   and itpc.item_prazo_convenio_id  not in (".$placeHolders.") ;";
   }


  $stm =  $this->con->prepare($sql);
  if($ids != 0){
foreach ($ids as $index => $value) {

    $stm->bindValue($index + 1, $value["prazo_convenio_id"]);
}

  }

   
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $result;

}





}


}


?>