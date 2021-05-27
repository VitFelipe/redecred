<?php namespace Dao{
use \BD\Conection;





class ComissaoPrazoParceiroDao{

  
function   __construct(){
$this->con  = Conection::getConnection();
}



public function salvar($pessoaId , $modeloPrazoId ,$itemTipoContratoId,$comissao,$prazoConvenioID){    
    $stm =  $this->con->prepare("INSERT INTO `u440036343_mydb`.`comissao_prazo_parceiro`
    (`pessoa_id`,
    `modelo_prazo`,
    `comissao`,
    `item_tipo_contrato_id`,
     prazo_convenio_id)
    VALUES
    (:pessoa_id,
    :modelo_prazo,
    :comissao,
    :item_tipo_contrato_id,
    :prazo_convenio_id);");

    $stm->bindParam(":pessoa_id",$pessoaId );
    $stm->bindParam(":modelo_prazo",$modeloPrazoId );
    $stm->bindParam(":comissao",$comissao );
    $stm->bindParam(":item_tipo_contrato_id",$itemTipoContratoId );
    $stm->bindParam(":prazo_convenio_id",$prazoConvenioID );
    $stm->execute();


}


public function salvarPorPrazoConvenio($pessoaId,$prazos){    
//echo "Pessoa : ".$pessoaId."</br/>";
//var_dump($prazos[0]);
$comissao = 0 ;
    foreach ($prazos as $prazo ){

  $stm =  $this->con->prepare("INSERT INTO `u440036343_mydb`.`comissao_prazo_parceiro`
    (`pessoa_id`,
    `modelo_prazo`,
    `comissao`,
    `item_tipo_contrato_id`,
     prazo_convenio_id)
    VALUES
    (:pessoa_id,
    :modelo_prazo,
    :comissao,
    :item_tipo_contrato_id,
    :prazo_convenio_id);");

    $stm->bindParam(":pessoa_id",$pessoaId );
    $stm->bindParam(":modelo_prazo",$prazo["modelo"] );
    $stm->bindParam(":comissao",$comissao );
    $stm->bindParam(":item_tipo_contrato_id",$prazo["item_tipo_contrato_id"] );
    $stm->bindParam(":prazo_convenio_id",$prazo["item_prazo_convenio_id"] );
    $stm->execute();

    }

   

}





public function findAllToPessoaItemTipo($pessoaId,$itemTipoId){
    
    $stm =  $this->con->prepare(" SELECT 
    cpp.*,
    p.nome as nome_pessoa , 
    p.cpf ,
    b.descricao as banco ,
    cc.descricao as convenio ,
    tc.descricao as tipo_contrato,
    cc.convenio_contrato_id 

    FROM
     u440036343_mydb.comissao_prazo_parceiro cpp ,
     u440036343_mydb.item_tipo_contrato itc ,
     u440036343_mydb.convenio_contrato cc ,
     u440036343_mydb.banco b  ,
     u440036343_mydb.tipo_contrato tc ,
     u440036343_mydb.pessoa p
     
     where 
     cpp.pessoa_id = :pessoa_id
     and  p.pessoa_id =   cpp.pessoa_id
     and cpp.item_tipo_contrato_id = itc.item_tipo_contrato_id
     and itc.convenio_contrato_id = cc.convenio_contrato_id
     and itc.tipo_contrato_id =  tc.tipo_contrato_id
     and cc.banco_banco_id = b.banco_id
     and cpp.item_tipo_contrato_id = :item_tipo_contrato_id  
     order by cpp.comissao_prazo_parceiro_id desc ;");
    $stm->bindParam(":pessoa_id",$pessoaId);
    $stm->bindParam(":item_tipo_contrato_id",$itemTipoId);
    $stm->execute();
    $itensTiposContrato = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $itensTiposContrato;
}


public function findAllToPrazoConvenioPorPessoa($pessoaId){
    
    $stm =  $this->con->prepare("SELECT cpp.prazo_convenio_id FROM u440036343_mydb.comissao_prazo_parceiro cpp where cpp.pessoa_id = :pessoa_id ;  ");
    $stm->bindParam(":pessoa_id",$pessoaId);
    $stm->execute();
    $list = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $list;
}



public function alterarPrazos($prazos){
      foreach ($prazos as $key => $value){
          $stm =  $this->con->prepare("UPDATE  u440036343_mydb.comissao_prazo_parceiro
          SET
          comissao  = :comissao 
          WHERE comissao_prazo_parceiro_id =  :comissao_prazo_parceiro_id ");
          $stm->bindParam(":comissao",$value[0]);
          $stm->bindParam(":comissao_prazo_parceiro_id",$key);
         
          $stm->execute();

      }
}



public function deletePorPessoa($pessoaId){
    
    $stm =  $this->con->prepare("delete  from  u440036343_mydb.comissao_prazo_parceiro  where  pessoa_id = :pessoa_id;");
    $stm->bindParam(":pessoa_id",$pessoaId);
    $stm->execute();
}




public function deletePorPrazoId($prazoId){
  $stm =  $this->con->prepare("delete from u440036343_mydb.comissao_prazo_parceiro where prazo_convenio_id = :prazoId;");
  $stm->bindParam(":prazoId",$prazoId);
  $stm->execute();
}



}

}


?>