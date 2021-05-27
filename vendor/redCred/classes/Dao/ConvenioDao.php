<?php namespace Dao{
use \BD\Conection;
use \Model\Convenio;
use \Dao\TipoContratoDao;
use \Dao\ItemTipoContratoDao;
use \Dao\ModeloPrazoDao;
use \Dao\ItemPrazoConvenioDao;
use \Dao\ComissaoPrazoParceiroDao;
use \Dao\UsuarioDao;



class ConvenioDao {
private $con;
private $itemTipoContratoDao;
private $modeloPrazoDao;
private $itemModeloPrazoDao;

function   __construct(){
$this->con  = Conection::getConnection();
$this->itemTipoContratoDao =  new ItemTipoContratoDao();
$this->modeloPrazoDao =  new ModeloPrazoDao();
$this->itemModeloPrazoDao =  new ItemPrazoConvenioDao();
}



public function salvar($convenio){
  $comissaoPrazoParceiroDao   = new ComissaoPrazoParceiroDao();
  $usuarioDao =  new UsuarioDao();

        $descricao =  $convenio->getDescricao();
        $bancoId = $convenio->getBancoId();
    $stm =  $this->con->prepare("INSERT INTO convenio_contrato (descricao,banco_banco_id) values(:descricao,:banco_id)");
    $stm->bindParam(":descricao",$descricao );
    $stm->bindParam(":banco_id",$bancoId);
   
    $stm->execute();

    $stm =  $this->con->prepare("SELECT LAST_INSERT_ID() AS last_id;");
  
    $stm->execute();
    $result = $stm->fetchAll(\PDO::FETCH_ASSOC);


    $convenioId = $result[0]["last_id"];
     $tipoContrato = new TipoContratoDao();
  
     $tipos =   $tipoContrato->findAll();//Buscando os Tipo De Contrato
     $modelosPrazo = $this->modeloPrazoDao->findAll();
     foreach($tipos as $tipo){
     
     $itemTipoContratoId =  $this->itemTipoContratoDao->salvar($convenioId,$tipo['tipo_contrato_id']); //SAlvando os item tipos contratos
      
     foreach($modelosPrazo as $modelo){

      $this->itemModeloPrazoDao->salvar($modelo["modelo_prazo_id"],$itemTipoContratoId); // salvando os prazos para cada tipo de item tipo contrato
      
     }



     }
    //Atualizando  as comissões dos Parceiros 
     $parceiros = $usuarioDao->findAllPessoa();

     foreach($parceiros as $parceiro){
 
      $pessoaId = $parceiro["pessoa_id"];
      
    $ids  =    	$comissaoPrazoParceiroDao->findAllToPrazoConvenioPorPessoa($pessoaId);

    //gambiara para passar quando não ouver  comissão parceiro
    if(empty($ids)){
      $ids = 0 ;
    }

   	$prazos  =   $this->itemModeloPrazoDao->findPrazosNaoAtualizados($ids);
	
  	$comissaoPrazoParceiroDao->salvarPorPrazoConvenio($pessoaId,$prazos);


     }





    //Inserindo conve


    
    
}



public function excluir($id){
  $comissaoPrazoParceiroDao   = new ComissaoPrazoParceiroDao();

  $tipos = $this->itemTipoContratoDao->findAllToConvenio($id);

  foreach($tipos as $tipo){

   $prazos = $this->itemModeloPrazoDao->findToItemTipoContrato($tipo['item_tipo_contrato_id']);
   
   foreach($prazos as $prazo){
    $comissaoPrazoParceiroDao->deletePorPrazoId($prazo['item_prazo_convenio_id']);
    $this->itemModeloPrazoDao->excluir($prazo['item_prazo_convenio_id']);

   }

   $this->itemTipoContratoDao->excluir($tipo['item_tipo_contrato_id']);

  }
    
    $stm =  $this->con->prepare("DELETE FROM convenio_contrato  where convenio_contrato_id = :id ");
    $stm->bindParam(":id",$id );
    $stm->execute();
}


public function findAll(){
    
    $stm =  $this->con->query("SELECT
    c.convenio_contrato_id ,
    c.descricao ,
    b.descricao as banco ,
    b.banco_id
   FROM u440036343_mydb.convenio_contrato c ,
    u440036343_mydb.banco b where
    c.banco_banco_id  =  b.banco_id
     order by  b.descricao ");
    $bancos = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $bancos;
}


public function findbyConvenioId($id){
    
    $stm =  $this->con->prepare("SELECT
    c.convenio_contrato_id ,
    c.descricao ,
    c.banco_banco_id as banco_id
   FROM u440036343_mydb.convenio_contrato c where
    c.convenio_contrato_id = :id ;");
      $stm->bindParam(":id",$id );
      $stm->execute();
    $convenio = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $convenio;
}



public function findbyConvenioToBancoId($id){
    
     $stm =  $this->con->prepare("select * from  u440036343_mydb.convenio_contrato c where c.banco_banco_id = :id ;");
      $stm->bindParam(":id",$id );
      $stm->execute();
    $convenios = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $convenios;
}






public function alterar($descricao,$banco_id,$id){
    try{
     
    $stm =  $this->con->prepare("update u440036343_mydb.convenio_contrato set descricao = :descricao , banco_banco_id = :banco_id where convenio_contrato_id = :id ;");
    $stm->bindParam(":descricao",$descricao );
    $stm->bindParam(":banco_id",$banco_id);
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