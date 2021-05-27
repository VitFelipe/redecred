<?php namespace Dao{
use \BD\Conection;
use \Model\Banco;







class BancoDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}



public function salvar($banco){
    try{
        $dataTime  = new \DateTime();
        $dataCricao =  $dataTime->format('Y-m-d');

        $descricao =  $banco->getDescricao();
        $sigla = $banco->getSigla();
    $stm =  $this->con->prepare("INSERT INTO banco (descricao,sigla,data_criacao) values(:descricao,:sigla,:data_criacao)");
    $stm->bindParam(":descricao",$descricao );
    $stm->bindParam(":sigla",$sigla);
    $stm->bindParam(":data_criacao",$dataCricao);
   
    $stm->execute();
   
    
    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}



public function excluir($id){
    
    $stm =  $this->con->prepare("DELETE FROM banco  where banco_id = :id ");
    $stm->bindParam(":id",$id );
    $stm->execute();
}


public function findAll(){
    
    $stm =  $this->con->query("select * from banco order by descricao ");
    $bancos = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $bancos;
}



public function alterar($banco){
    try{
        $id =  $banco->getBancoId();
        $descricao =  $banco->getDescricao();
        $sigla = $banco->getSigla();
    $stm =  $this->con->prepare("update banco b set b.descricao = :descricao , b.sigla = :sigla where b.banco_id =  :id");
    $stm->bindParam(":descricao",$descricao );
    $stm->bindParam(":sigla",$sigla);
    $stm->bindParam(":id",$id );
   
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