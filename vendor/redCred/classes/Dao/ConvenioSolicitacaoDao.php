<?php namespace Dao{
use \BD\Conection;





class ConvenioSolicitacaoDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}



public function findAll(){
    
    $stm =  $this->con->query("select * from u440036343_mydb.convenio_solicitacao;");
    $convenioSolicitacao = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $convenioSolicitacao;
}









}


}


?>