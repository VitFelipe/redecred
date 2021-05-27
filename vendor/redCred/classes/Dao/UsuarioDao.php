<?php namespace Dao{
use \BD\Conection;
use \Model\Usuario;



class UsuarioDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();

}



public function salvar($nome,$email,$telefone,$cpf,$login,$senha,$perfilId,$dataCriacao, $cidade, $endereco,
$bairro, $banco, 
$agencia, $conta, 
$cep ,$comissao){

    try{
      
  
    $stm =  $this->con->prepare("CALL `u440036343_mydb`.`addPessoaUser`(:email , :nome 
     , :telefone , :cpf , :login , :senha , :perfil_id, :data_criacao, :cidade, :endereco,
     :bairro, :banco, 
     :agencia, :conta, 
     :cep , :comissao);");
    $stm->bindParam(":email",$email );
    $stm->bindParam(":nome",$nome );
    $stm->bindParam(":telefone",$telefone );
    $stm->bindParam(":cpf",$cpf );
    $stm->bindParam(":senha",$senha);
    $stm->bindParam(":login",$login );
    $stm->bindParam(":perfil_id",$perfilId );
    $stm->bindParam(":cidade",$cidade);
    $stm->bindParam(":data_criacao",$dataCriacao);
    $stm->bindParam(":endereco",$endereco);
    $stm->bindParam(":bairro",$bairro);
    $stm->bindParam(":banco",$banco);
    $stm->bindParam(":agencia",$agencia);
    $stm->bindParam(":conta",$conta);
    $stm->bindParam(":cep",$cep);
    $stm->bindParam(":comissao",$comissao);

    $stm->execute();

    $result  = $stm->fetchAll(\PDO::FETCH_ASSOC);

    $pessoaId = $result[0]['pessoa_id'];





    
      return  $pessoaId;
    }catch(Exception $e){
       
      return $e->getMessage();
    }
}



public function findPessoaCpf($cpf){
    
    $stm =  $this->con->prepare("SELECT * FROM u440036343_mydb.pessoa p where p.cpf   = :cpf ");
    $stm->bindParam(":cpf",$cpf);
    $stm->execute();
    $pessoa = $stm->fetchAll(\PDO::FETCH_ASSOC);

    if(empty($pessoa)){
    return false;
    }else{
     return true;
    }

}






public function excluirUsuarioPorPessoa($pessoaId){
    
    $stm =  $this->con->prepare("delete from usuario where pessoa_pessoa_id = :id");
    $stm->bindParam(":id",$pessoaId );
    $stm->execute();

    $this->excluirPessoa($pessoaId);
}



public function excluirPessoa($pessoaId){
    
    $stm =  $this->con->prepare("delete from pessoa    where pessoa_id = :id");
    $stm->bindParam(":id",$pessoaId );
    $stm->execute();
}




public function findAll(){
    
    $stm =  $this->con->query("select 
    p.pessoa_id,
    p.nome,
    p.email,
    p.cidade,
    u.idusuario,
    pf.descricao as perfil,
    u.login
    from 
    pessoa p ,
    usuario u  ,
    perfil pf
    where
    p.pessoa_id = u.pessoa_pessoa_id 
     and u.perfil_perfil_id = pf.perfil_id;");
    $usuarios = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $usuarios;
}


public function login($login){
    
    $stm =  $this->con->prepare("select 
    p.nome,
    p.email,
    u.login,
    u.senha,
    pf.descricao as perfil,
    pf.perfil_id,
    u.data_criacao as data_criacao_usuario,
    p.pessoa_id as pessoa_id ,
    u.idusuario
    from pessoa p  , 
    usuario u , 
    perfil pf 
    where 
    p.pessoa_id = u.pessoa_pessoa_id
     and u.perfil_perfil_id = pf.perfil_id
    and  u.login = :login");
    $stm->bindParam(":login",$login);
    $stm->execute();
    $usuario = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $usuario;
}

public function loginExist($login){
    
    $stm =  $this->con->prepare("select 
    *
    from 
    usuario u
    where 
      u.login = :login");
    $stm->bindParam(":login",$login);
    $stm->execute();
    $usuario = $stm->fetchAll(\PDO::FETCH_ASSOC);

    if(empty($usuario)){
   return "1";

    }else{
   return "0";
    }
  
}


public function findEmail($email){
    
    $stm =  $this->con->prepare("select 
    p.pessoa_id,
    p.email,
    p.nome,
    u.login
    from
     pessoa p  , 
    usuario u , 
    perfil pf 
    where 
    p.pessoa_id = u.pessoa_pessoa_id
     and u.perfil_perfil_id = pf.perfil_id
     and p.email = :email");
    $stm->bindParam(":email",$email);
    $stm->execute();
    $pessoa = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $pessoa;
}

public function findPessoaId($pessoaId){
    
    $stm =  $this->con->prepare("select 
    *
    from pessoa p  , 
    usuario u , 
    perfil pf 
    where 
    p.pessoa_id = u.pessoa_pessoa_id
     and u.perfil_perfil_id = pf.perfil_id
     and p.pessoa_id = :pessoaId");
    $stm->bindParam(":pessoaId",$pessoaId);
    $stm->execute();
    $pessoa = $stm->fetchAll(\PDO::FETCH_ASSOC);
  return $pessoa;
}

public function findAllPessoa(){
    
  $stm =  $this->con->prepare("select 
  *
  from pessoa p  , 
  usuario u , 
  perfil pf 
  where 
  p.pessoa_id = u.pessoa_pessoa_id
   and u.perfil_perfil_id = pf.perfil_id
  ");
  $stm->execute();
  $pessoa = $stm->fetchAll(\PDO::FETCH_ASSOC);
return $pessoa;
}




public function alterar($nome,$email,$telefone,$cpf,$login,$perfilId,$pessoaId,$cidade ,
$endereco ,
$bairro ,
$banco ,
$agencia ,
$conta ,
$cep,
$comissao){
    try{
  
    $stm =  $this->con->prepare("CALL `u440036343_mydb`.`editPessoaUser`(:email , :nome 
     , :telefone , :cpf , :login  , :perfil_id, :pessoa_id ,:cidade ,
     :endereco ,
     :bairro ,
     :banco ,
     :agencia ,
     :conta ,
     :cep, 
     :comissao);");
    $stm->bindParam(":email",$email );
    $stm->bindParam(":nome",$nome );
    $stm->bindParam(":telefone",$telefone );
    $stm->bindParam(":cpf",$cpf );
    $stm->bindParam(":login",$login );
    $stm->bindParam(":perfil_id",$perfilId );
    $stm->bindParam(":pessoa_id",$pessoaId);
    $stm->bindParam(":cidade",$cidade);
    $stm->bindParam(":endereco",$endereco);
    $stm->bindParam(":bairro",$bairro);
    $stm->bindParam(":banco",$banco);
    $stm->bindParam(":agencia",$agencia);
    $stm->bindParam(":conta",$conta);
    $stm->bindParam(":cep",$cep);
    $stm->bindParam(":comissao",$comissao);

    $stm->execute();
    
      return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}

public function alterarSenha($senha,$usuarioId){
    try{

    $stm =  $this->con->prepare("update usuario set senha  = :senha where idusuario = :usuarioId;");
    $stm->bindParam(":senha",$senha );
    $stm->bindParam(":usuarioId",$usuarioId);
    $stm->execute();
    }catch(Exception $e){
        echo  $e->getMessage();
      return $e->getMessage();
    }
}









}


}


?>