<?php namespace Dao{
use \BD\Conection;


class ClienteDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}




public function findAll(){
    
    $stm =  $this->con->prepare("SELECT * FROM u440036343_mydb.cliente;");
    
    $stm->execute();
    $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $result;
}




public function findCpf($cpf){
    
  $stm =  $this->con->prepare("SELECT * FROM u440036343_mydb.cliente c where c.cpf = :cpf ");
  $stm->bindParam(":cpf",$cpf); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  if(empty($result)){
  return array();
  }else{
    return $result[0];
  }

}

public function findCpfClientId($cpf){
    
  $stm =  $this->con->prepare("SELECT c.cliente_id FROM u440036343_mydb.cliente c where c.cpf = :cpf ");
  $stm->bindParam(":cpf",$cpf); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
return $result;
}


public function findPrimaryKey($id){
    
  $stm =  $this->con->prepare("SELECT * FROM u440036343_mydb.cliente c where c.cliente_id = :id ");
  $stm->bindParam(":id",$id); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
return $result[0];
}


public function findTotalCliente(){
    
  $stm =  $this->con->prepare("select count(*) as total_cliente from u440036343_mydb.cliente;
  ");
  $stm->bindParam(":id",$id); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
return $result[0];
}
public function salvar($nome,$nomeMae,$email,$cpf,$rg,$nascimento,
$dataEmissao,$orgaoEmissao,$naturalidade,$estado_civil,$telefone,$endereco,$cep,$estado,$cidade,$bairro){
    
  $complemento = "";
    $stm =  $this->con->prepare("INSERT INTO `u440036343_mydb`.`cliente`
    (
    `nome`,
    `cpf`,
    `nome_mae`,
    `rg`,
    `data_emissao`,
    `orgao_emissor`,
    `naturalidade`,
    `estado_civil`,
    `telefone`,
    `email`,
    `endereco`,
    `complemento`,
    `estado`,
    `cidade`,
    `cep`,
    `data_nascimento`,
    `bairro`
    )
    VALUES
    (
    :nome ,
    :cpf ,
    :nome_mae ,
    :rg ,
    :data_emissao ,
    :orgao_emissor ,
    :naturalidade ,
    :estado_civil ,
    :telefone ,
    :email ,
    :endereco ,
    :complemento ,
    :estado ,
    :cidade ,
    :cep ,
    :data_nascimento ,
    :bairro);
    ");

    $stm->bindParam(":nome",$nome); 
    $stm->bindParam(":cpf",$cpf);  
    $stm->bindParam(":nome_mae",$nomeMae);  
    $stm->bindParam(":rg",$rg);  
    $stm->bindParam(":data_emissao",$dataEmissao);  
    $stm->bindParam(":orgao_emissor",$orgaoEmissao); 
    $stm->bindParam(":naturalidade",$naturalidade); 
    $stm->bindParam(":estado_civil",$estado_civil); 
    $stm->bindParam(":telefone",$telefone); 
    $stm->bindParam(":email",$email); 
    $stm->bindParam(":endereco",$endereco);  
    $stm->bindParam(":estado",$estado); 
    $stm->bindParam(":cidade",$cidade); 
    $stm->bindParam(":cep",$cep); 
    $stm->bindParam(":data_nascimento",$nascimento); 
    $stm->bindParam(":bairro",$bairro); 
    $stm->bindParam(":complemento",$complemento); 

    $stm->execute();

    $stm =  $this->con->prepare("SELECT LAST_INSERT_ID() AS last_id;");
  
    $stm->execute();
    $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

  return $result[0]['last_id'];
}


//Alterar Dados do Cliente 

public function alterar($nome,$nomeMae,$email,$cpf,$rg,$nascimento,
$dataEmissao,$orgaoEmissao,$naturalidade,$estado_civil,$telefone,$endereco,
$cep,$estado,$cidade,$bairro,$clienteId,$pessoaId){
    
  $complemento = "";
    $stm =  $this->con->prepare("UPDATE `u440036343_mydb`.`cliente`
    SET
    `cliente_id` = :cliente_id,
    `nome` = :nome,
    `cpf` = :cpf,
    `nome_mae` = :nome_mae,
    `rg` = :rg,
    `data_emissao` = :data_emissao,
    `orgao_emissor` = :orgao_emissor,
    `naturalidade` = :naturalidade,
    `estado_civil` = :estado_civil,
    `telefone` = :telefone,
    `email` = :email,
    `endereco` = :endereco,
    `complemento` = :complemento,
    `estado` = :estado,
    `cidade` = :cidade,
    `cep` = :cep,
    `data_nascimento` = :data_nascimento,
    `bairro` = :bairro,
    `pessoa_id` = :pessoa_id
    WHERE `cliente_id` = :cliente_id ; ");

    $stm->bindParam(":nome",$nome); 
    $stm->bindParam(":cpf",$cpf);  
    $stm->bindParam(":nome_mae",$nomeMae);  
    $stm->bindParam(":rg",$rg);  
    $stm->bindParam(":data_emissao",$dataEmissao);  
    $stm->bindParam(":orgao_emissor",$orgaoEmissao); 
    $stm->bindParam(":naturalidade",$naturalidade); 
    $stm->bindParam(":estado_civil",$estado_civil); 
    $stm->bindParam(":telefone",$telefone); 
    $stm->bindParam(":email",$email); 
    $stm->bindParam(":endereco",$endereco);  
    $stm->bindParam(":estado",$estado); 
    $stm->bindParam(":cidade",$cidade); 
    $stm->bindParam(":cep",$cep); 
    $stm->bindParam(":data_nascimento",$nascimento); 
    $stm->bindParam(":bairro",$bairro); 
    $stm->bindParam(":complemento",$complemento); 
    $stm->bindParam(":cliente_id",$clienteId); 
    $stm->bindParam(":pessoa_id",$pessoa_id); 

    $stm->execute();

    
}




}

}

?>