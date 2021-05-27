<?php namespace Dao{
use \BD\Conection;


class TookenDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}

public function salvar($pessoaId,$tooken){
    try{
     $dataTime  = new \DateTime();
     $data =  $dataTime->format('Y-m-d H:i:s');
    $stm =  $this->con->prepare("insert into tokken(tokken,pessoa_id,data_criacao) values(:tooken,:pessoaId,:data);");
    $stm->bindParam(":tooken",$tooken );
    $stm->bindParam(":pessoaId",$pessoaId);
    $stm->bindParam(":data", $data);

   
    $stm->execute();
    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}









public function findTokken($tokken){
    
    $stm =  $this->con->prepare("select 
    p.pessoa_id,
     p.nome,
     u.idusuario, 
     t.data_criacao,
     t.tokken_id,
     t.valido
     from 
     pessoa p ,
     usuario u  ,  
     tokken t
     where
     p.pessoa_id = u.pessoa_pessoa_id 
     and t.pessoa_id = p.pessoa_id
     and t.tokken  = :tokken;");
    $stm->bindParam(":tokken",$tokken);
    $stm->execute();
    $tokken = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $tokken;
}



public function cancelarTokken($tokkenId){
  try{

  $stm =  $this->con->prepare("update tokken set valido = 'N' where tokken_id = :tokkenId");
  $stm->bindParam(":tokkenId",$tokkenId);
  $stm->execute();
  }catch(Exception $e){
      echo  $e->getMessage();
    return $e->getMessage();
  }
}


}

}

?>