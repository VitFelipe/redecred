<?php namespace Dao{
use \BD\Conection;


class ArquivoSolicitacaoDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}




public function findAll(){
    
    $stm =  $this->con->prepare("select * from ");
    $stm->execute();
    $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $result;
}



public function findToSolicitacao($solicitacaoId){
    
  $stm =  $this->con->prepare("select * from arquivo_solicitacao where solicitacao_id = :solicitacaoId ;");
  $stm->bindParam(":solicitacaoId",$solicitacaoId); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
return $result;
}








public function salvar( $tipo_documento,
$arquivo,
$data_criacao,
$solicitacao_id,$nome){

      $stm =  $this->con->prepare("INSERT INTO `u440036343_mydb`.`arquivo_solicitacao`
      (
      `tipo_documento`,
      `arquivo`,
      `data_criacao`,
      `solicitacao_id`,
      nome)
      VALUES
      (
      :tipo_documento,
      :arquivo,
      :data_criacao,
      :solicitacao_id,
      :nome);");
  
      $stm->bindParam(":tipo_documento",$tipo_documento); 
      $stm->bindParam(":arquivo",$arquivo); 
      $stm->bindParam(":data_criacao",$data_criacao); 
      $stm->bindParam(":solicitacao_id",$solicitacao_id); 
      $stm->bindParam(":nome",$nome); 

      $stm->execute();
  }


  public function excluir($solicitacao_id){

      $stm =  $this->con->prepare("delete from u440036343_mydb.arquivo_solicitacao where solicitacao_id =  :solicitacao_id ;");
  

      $stm->bindParam(":solicitacao_id",$solicitacao_id); 

      $stm->execute();
  }
  

  public function excluirAnexo($anexoId){

  $result   =   $this->findPrimaryKey($anexoId);

  $this->removeArquivo($result["arquivo"]);

    $stm =  $this->con->prepare("delete from u440036343_mydb.arquivo_solicitacao where arquivo_solicitacao_id =  :anexo_id ;");
    $stm->bindParam(":anexo_id",$anexoId); 
    $stm->execute();  
  }

  public function findPrimaryKey($anexoId){
    
    $stm =  $this->con->prepare("select * from arquivo_solicitacao where arquivo_solicitacao_id = :anexo_id ;");
    $stm->bindParam(":anexo_id",$anexoId); 
    $stm->execute();
    $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $result[0];
  }





  function removeArquivo($caminho){

    unlink($caminho);
  }


}

}

?>