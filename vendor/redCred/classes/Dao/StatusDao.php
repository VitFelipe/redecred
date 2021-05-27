<?php namespace Dao{
use \BD\Conection;





class StatusDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}









public function findAll(){
    
    $stm =  $this->con->query("select * from u440036343_mydb.status_solicitacao;");
    $status = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $status;
}

















}


}


?>