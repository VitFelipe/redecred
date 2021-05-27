<?php namespace Dao{
use \BD\Conection;


class PerfilDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}




public function findAll(){
    
    $stm =  $this->con->prepare("SELECT * FROM u440036343_mydb.perfil;");
  
    $stm->execute();
    $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $result;
}





}

}

?>