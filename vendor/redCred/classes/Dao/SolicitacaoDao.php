<?php namespace Dao{
use \BD\Conection;
use \Dao\HistoricoSolicitacaoDao;
use \Dao\ArquivoSolicitacaoDao;



class SolicitacaoDao {
private $con;

function   __construct(){
$this->con  = Conection::getConnection();
}



public function excluir($id){

  $historicoSolicitacaoDao =  new HistoricoSolicitacaoDao();

  $historicoSolicitacaoDao->excluir($id);

  $arquivoSolicitacaoDao =  new ArquivoSolicitacaoDao();

  $arquivoSolicitacaoDao->excluir($id);

    
  $stm =  $this->con->prepare("delete from u440036343_mydb.solicitacao_contrato where solicitacao_contrato_id =  :id ");
  $stm->bindParam(":id",$id );
  $stm->execute();
}



public function findAll(){
    
    $stm =  $this->con->prepare("SELECT
    sc.solicitacao_contrato_id ,
    sc.data_solicitacao as data_solicitacao,
    sc.valor_emprestimo as valor_emprestimo,
    c.nome as nome_cliente,
    c.cidade as municipio ,
    b.descricao as banco ,
    mp.descricao as prazo ,
    cc.descricao as convenio ,
    s.descricao as statu,
    s.statu_id,
    p.pessoa_id as pessoa_id
   
   FROM 
   u440036343_mydb.solicitacao_contrato sc ,
   u440036343_mydb.pessoa p ,
   u440036343_mydb.status_solicitacao s ,
   u440036343_mydb.item_prazo_convenio itpc ,
   u440036343_mydb.item_tipo_contrato itc ,
   u440036343_mydb.modelo_prazo mp ,
   u440036343_mydb.cliente c,
   u440036343_mydb.tabela_convenio tc ,
   u440036343_mydb.convenio_contrato cc,
   u440036343_mydb.banco b 
   where 
   sc.pessoa_id = p.pessoa_id
   and sc.status_solicitacao_id = s.statu_id
   and sc.item_prazo_id  = itpc.item_prazo_convenio_id
   and itpc.modelo_prazo_id = mp.modelo_prazo_id
   and sc.cliente_cliente_id = c.cliente_id 
   and tc.tabela_convenio_id = sc.tabela_convenio_id
   and cc.banco_banco_id = b.banco_id
   and itc.convenio_contrato_id = cc.convenio_contrato_id
   and itpc.item_tipo_contrato_id = itc.item_tipo_contrato_id");
  
    $stm->execute();
    $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
    $solicitacoes = array();

  return $result;
}



public function findAllToUser($pessoaId){
    
  $stm =  $this->con->prepare("SELECT
  sc.solicitacao_contrato_id ,
  sc.data_solicitacao as data_solicitacao,
  sc.valor_emprestimo as valor_emprestimo,
  c.nome as nome_cliente,
  c.cidade as municipio ,
  b.descricao as banco ,
  mp.descricao as prazo ,
  cc.descricao as convenio ,
  s.descricao as statu,
  s.statu_id,
  p.pessoa_id as pessoa_id
 
 FROM 
 u440036343_mydb.solicitacao_contrato sc ,
 u440036343_mydb.pessoa p ,
 u440036343_mydb.status_solicitacao s ,
 u440036343_mydb.item_prazo_convenio itpc ,
 u440036343_mydb.item_tipo_contrato itc ,
 u440036343_mydb.modelo_prazo mp ,
 u440036343_mydb.cliente c,
 u440036343_mydb.tabela_convenio tc ,
 u440036343_mydb.convenio_contrato cc,
 u440036343_mydb.banco b 
 where 
 sc.pessoa_id = p.pessoa_id
 and sc.status_solicitacao_id = s.statu_id
 and sc.item_prazo_id  = itpc.item_prazo_convenio_id
 and itpc.modelo_prazo_id = mp.modelo_prazo_id
 and sc.cliente_cliente_id = c.cliente_id 
 and tc.tabela_convenio_id = sc.tabela_convenio_id
 and cc.banco_banco_id = b.banco_id
 and itc.convenio_contrato_id = cc.convenio_contrato_id
 and itpc.item_tipo_contrato_id = itc.item_tipo_contrato_id
 and p.pessoa_id = :pessoa_id ");
   $stm->bindParam(":pessoa_id",$pessoaId); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  $solicitacoes = array();

return $result;
}

//==============================================
//Salvar Solicitação de Contrato
//==============================================
public function salvar(
$data_solicitacao,
$prazo,
$fator,
$valor_emprestimo,
$valor_parcela,
$cliente_cliente_id,
$convenio_solicitacao_id,
$status_solicitacao_id,
$tabela_convenio_id,
$pessoa_id,
$numero_beneficio,
$especie_beneficio,
$uf_beneficio,
$senha_beneficio,
$renda,
$numero_matricula,
$senha,
$tipo_conta, 
$banco ,
$agencia ,
$conta,
$view_adm){
    
  $complemento = "";
    $stm =  $this->con->prepare("INSERT INTO `u440036343_mydb`.`solicitacao_contrato`
    (`data_solicitacao`,
    `item_prazo_id`,
    `fator`,
    `valor_emprestimo`,
    `valor_parcela`,
    `cliente_cliente_id`,
    `convenio_solicitacao_id`,
    `status_solicitacao_id`,
    `tabela_convenio_id`,
    `pessoa_id`,
    `numero_beneficio`,
    `especie_beneficio`,
    `uf_beneficio`,
    `senha_beneficio`,
    `renda`,
    `numero_matricula`,
    `senha`,
    tipo_conta, 
    banco ,
    agencia ,
    conta,
    view_adm)
    VALUES
    (:data_solicitacao,
    :item_prazo_id,
    :fator,
    :valor_emprestimo,
    :valor_parcela,
    :cliente_cliente_id,
    :convenio_solicitacao_id,
    :status_solicitacao_id,
    :tabela_convenio_id,
    :pessoa_id,
    :numero_beneficio,
    :especie_beneficio,
    :uf_beneficio,
    :senha_beneficio,
    :renda,
    :numero_matricula,
    :senha,
    :tipo_conta, 
    :banco ,
    :agencia ,
    :conta,
    :view_adm);");

    $stm->bindParam(":data_solicitacao",$data_solicitacao);  
    $stm->bindParam(":item_prazo_id",$prazo); 
    $stm->bindParam(":fator",$fator); 
    $stm->bindParam(":valor_emprestimo",$valor_emprestimo); 
    $stm->bindParam(":valor_parcela",$valor_parcela); 
    $stm->bindParam(":cliente_cliente_id",$cliente_cliente_id); 
    $stm->bindParam(":convenio_solicitacao_id",$convenio_solicitacao_id); 
    $stm->bindParam(":status_solicitacao_id",$status_solicitacao_id); 
    $stm->bindParam(":tabela_convenio_id",$tabela_convenio_id); 
    $stm->bindParam(":pessoa_id",$pessoa_id); 
    $stm->bindParam(":numero_beneficio",$numero_beneficio); 
    $stm->bindParam(":especie_beneficio",$especie_beneficio); 
    $stm->bindParam(":uf_beneficio",$uf_beneficio); 
    $stm->bindParam(":senha_beneficio",$senha_beneficio); 
    $stm->bindParam(":renda",$renda); 
    $stm->bindParam(":numero_matricula",$numero_matricula); 
    $stm->bindParam(":tipo_conta",$tipo_conta); 
    $stm->bindParam(":banco",$banco); 
    $stm->bindParam(":agencia",$agencia); 
    $stm->bindParam(":senha",$senha); 
    $stm->bindParam(":conta",$conta); 
    $stm->bindParam(":view_adm",$view_adm); 

    $stm->execute();

    $stm =  $this->con->prepare("SELECT LAST_INSERT_ID() AS last_id;");
  
    $stm->execute();
    $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

  return $result[0]["last_id"];
}




//==============================================
//Atualizar  Solicitação de Contrato
//==============================================
public function alterar(
  $prazo,
  $fator,
  $valor_emprestimo,
  $valor_parcela,
  $cliente_cliente_id,
  $convenio_solicitacao_id,
  $tabela_convenio_id,
  $pessoa_id,
  $numero_beneficio,
  $especie_beneficio,
  $uf_beneficio,
  $senha_beneficio,
  $renda,
  $numero_matricula,
  $senha,
  $tipo_conta, 
  $banco ,
  $agencia ,
  $conta,
  $view_adm,
  $solicitacaoId
  ){  
    $complemento = "";
      $stm =  $this->con->prepare("UPDATE `u440036343_mydb`.`solicitacao_contrato`
      SET
      `fator` = :fator,
      `valor_emprestimo` = :valor_emprestimo,
      `valor_parcela` = :valor_parcela,
      `cliente_cliente_id` = :cliente_cliente_id,
      `convenio_solicitacao_id` = :convenio_solicitacao_id,
      `tabela_convenio_id` = :tabela_convenio_id,
      `pessoa_id` = :pessoa_id,
      `numero_beneficio` = :numero_beneficio,
      `especie_beneficio` = :especie_beneficio,
      `uf_beneficio` = :uf_beneficio,
      `senha_beneficio` = :senha_beneficio,
      `renda` = :renda,
      `numero_matricula` = :numero_matricula,
      `senha` = :senha,
      `tipo_conta` = :tipo_conta,
      `banco` = :banco,
      `agencia` = :agencia,
      `conta` = :conta,
      `view_adm` = :view_adm,
      `item_prazo_id` = :item_prazo_id
      WHERE `solicitacao_contrato_id` =  :solicitacao_id");
  
      $stm->bindParam(":item_prazo_id",$prazo); 
      $stm->bindParam(":fator",$fator); 
      $stm->bindParam(":valor_emprestimo",$valor_emprestimo); 
      $stm->bindParam(":valor_parcela",$valor_parcela); 
      $stm->bindParam(":cliente_cliente_id",$cliente_cliente_id); 
      $stm->bindParam(":convenio_solicitacao_id",$convenio_solicitacao_id); 
      $stm->bindParam(":tabela_convenio_id",$tabela_convenio_id); 
      $stm->bindParam(":pessoa_id",$pessoa_id); 
      $stm->bindParam(":numero_beneficio",$numero_beneficio); 
      $stm->bindParam(":especie_beneficio",$especie_beneficio); 
      $stm->bindParam(":uf_beneficio",$uf_beneficio); 
      $stm->bindParam(":senha_beneficio",$senha_beneficio); 
      $stm->bindParam(":renda",$renda); 
      $stm->bindParam(":numero_matricula",$numero_matricula); 
      $stm->bindParam(":tipo_conta",$tipo_conta); 
      $stm->bindParam(":banco",$banco); 
      $stm->bindParam(":agencia",$agencia); 
      $stm->bindParam(":senha",$senha); 
      $stm->bindParam(":conta",$conta); 
      $stm->bindParam(":view_adm",$view_adm); 
      $stm->bindParam(":solicitacao_id",$solicitacaoId); 
  
      $stm->execute();
  
  }



public function findTotalSolicitacao(){
    
  $stm =  $this->con->prepare("select count(*) as total_solicitacao from u440036343_mydb.solicitacao_contrato;");
 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  $solicitacoes = array();

return $result[0];
}

public function findTotalSolicitacaoPorPessoa($pessoaId){
    
  $stm =  $this->con->prepare("select count(*) as total_solicitacao from u440036343_mydb.solicitacao_contrato where pessoa_id = :pessoaId ;");
  $stm->bindParam(":pessoaId",$pessoaId); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  $solicitacoes = array();

return $result[0];
}



public function findPrimary($solicitacaoId){
    
  $stm =  $this->con->prepare("SELECT
  sc.solicitacao_contrato_id ,
  sc.data_solicitacao as data_solicitacao,
  sc.valor_emprestimo as valor_emprestimo,
  c.nome as nome_cliente,
  b.descricao as banco ,
  mp.descricao as prazo ,
  cc.descricao as convenio ,
  s.descricao as statu,
  s.statu_id as status_id,
  p.pessoa_id as pessoa_id,
  c.endereco as endereco_cliente,
  c.estado_civil as estado_civil,
  c.cidade as cidade_cliente,
  c.bairro as bairro,
  sc.numero_beneficio,
  sc.renda ,
  sc.especie_beneficio,
  sc.uf_beneficio,
  sc.senha_beneficio,
  sc.numero_matricula,
  sc.senha,
  c.naturalidade as naturalidade,
  tc.descricao as tabela_convenio,
  tc.tabela_convenio_id,
  s.descricao as status_solicitacao,
  c.cpf as cpf ,
  c.cep,
  c.cliente_id,
  c.email as email,
  sc.banco as banco_cliente,
  sc.agencia,
  c.rg,
  c.data_nascimento , 
  c.telefone ,
  c.nome_mae,
  c.orgao_emissor,
  c.data_emissao,
  c.estado,
  sc.tipo_conta,
  sc.conta,
  sc.fator,
  sc.valor_parcela,
  sc.numero_contrato ,
  tic.descricao as tipo_contrato,
  convs.descricao as convenio_solicitacao,
  convs.convenio_solicitacao_id,
  cc.convenio_contrato_id ,
  b.banco_id ,
  itpc.item_prazo_convenio_id,
  itc.item_tipo_contrato_id

 FROM 
 u440036343_mydb.solicitacao_contrato sc ,
 u440036343_mydb.pessoa p ,
 u440036343_mydb.status_solicitacao s ,
 u440036343_mydb.item_prazo_convenio itpc ,
 u440036343_mydb.modelo_prazo mp ,
 u440036343_mydb.cliente c,
 u440036343_mydb.tabela_convenio tc ,
 u440036343_mydb.convenio_contrato cc,
 u440036343_mydb.banco b ,
 u440036343_mydb.item_tipo_contrato itc,
 u440036343_mydb.tipo_contrato tic ,
 u440036343_mydb.convenio_solicitacao convs
 where 
 sc.pessoa_id = p.pessoa_id
 and sc.status_solicitacao_id = s.statu_id
 and sc.item_prazo_id  = itpc.item_prazo_convenio_id
 and cc.convenio_contrato_id  = itc.convenio_contrato_id
 and tic.tipo_contrato_id  = itc.tipo_contrato_id
 and itpc.modelo_prazo_id = mp.modelo_prazo_id
 and sc.cliente_cliente_id = c.cliente_id 
 and itc.item_tipo_contrato_id = itpc.item_tipo_contrato_id
 and tc.convenio_contrato_id = cc.convenio_contrato_id
 and cc.banco_banco_id = b.banco_id 
 and sc.convenio_solicitacao_id = convs.convenio_solicitacao_id
 and sc.solicitacao_contrato_id = :solicitacaoId ");
   $stm->bindParam(":solicitacaoId",$solicitacaoId); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  $solicitacoes = array();

return $result[0];
}





//Query Para Notificação
public function findSolicitacoesNovas(){
    
  $stm =  $this->con->prepare("select sc.solicitacao_contrato_id , p.nome as nome_parceiro  ,  
  format(sc.valor_emprestimo,2,'de_DE') as valor_emprestimo , 
   DATE_FORMAT(sc.data_solicitacao, '%d/%m/%Y') 
  as data_solicitacao from u440036343_mydb.solicitacao_contrato sc , 
  u440036343_mydb.pessoa p where p.pessoa_id =  sc.pessoa_id and sc.view_adm = 'N' ");
 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

return $result;
}



//Qauntidade de Solicitações por Convenio
public function findSolicitacoesConvenio($convenioId){
    
  $stm =  $this->con->prepare("select
  count(*) as quantidade
  from u440036343_mydb.solicitacao_contrato sc ,
  u440036343_mydb.convenio_contrato cc ,
  u440036343_mydb.item_tipo_contrato itc ,
  u440036343_mydb.item_prazo_convenio itpc 
  where 
  sc.item_prazo_id = itpc.item_prazo_convenio_id
  and itpc.item_tipo_contrato_id = itc.item_tipo_contrato_id
  and cc.convenio_contrato_id = itc.convenio_contrato_id
  and cc.convenio_contrato_id = :convenioId");

  $stm->bindParam(":convenioId",$convenioId); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

return $result[0];
}

//Query Adicionar Dados Complementares
public function addDadosComplementares($solicitacaoId , $valorEmprestimo,$valorParcela,$numeroContrato){
    
  $stm =  $this->con->prepare("update u440036343_mydb.solicitacao_contrato set 
   valor_emprestimo  = :valorEmprestimo , 
   numero_contrato = :numeroContrato ,
    valor_parcela = :valorParcela 
    where solicitacao_contrato_id = :solicitacaContratoId; ");
   
    $stm->bindParam(":solicitacaContratoId",$solicitacaoId); 
    $stm->bindParam(":numeroContrato",$numeroContrato); 
    $stm->bindParam(":valorParcela",$valorParcela); 
    $stm->bindParam(":valorEmprestimo",$valorEmprestimo); 
    $stm->execute();
}








public function findAlterarView($solicitacaoId){
  $novaView   = 'S';
  $stm =  $this->con->prepare("UPDATE 
   
  u440036343_mydb.solicitacao_contrato sc 
 SET 
 
 view_adm = :view_adm

where 
solicitacao_contrato_id = :solicitacao_contrato_id ");
  $stm->bindParam(":solicitacao_contrato_id",$solicitacaoId); 
  $stm->bindParam(":view_adm",$novaView); 
 $stm->execute();
}




public function alterarStatus($solicitacaoId,$statusId){
    
  $stm =  $this->con->prepare("UPDATE 
   
   u440036343_mydb.solicitacao_contrato sc 
  SET 
  
  status_solicitacao_id = :statusId

 where 
 solicitacao_contrato_id = :solicitacao_contrato_id ");
   $stm->bindParam(":solicitacao_contrato_id",$solicitacaoId); 
   $stm->bindParam(":statusId",$statusId); 
  $stm->execute();

}





public function findSolicitacaoRelatorio($pessoaId,$bancoId,$statusId,$dataInicio ,$dataFim){
    $sql = "
    select 
    sald_cred.* ,
    (sald_cred.comissao_redCred - sald_cred.comissao_parceiro) as saldo
    
    from 
    (
    
    select 
    vwi_cred.* , 
    (vwi_cred.valor_emprestimo * (vwi_cred.comissao_pessoa /100)) as comissao_parceiro
    from (
    
    SELECT
      sc.solicitacao_contrato_id ,
      c.nome as nome_cliente,
      p.nome as nome_parceiro,
      p.banco as banco_parceiro,
      p.agencia as agencia_parceiro ,
      p.conta as conta_parceiro ,
      c.cidade as municipio ,
      b.descricao as banco ,
      mp.descricao as prazo ,
      cc.descricao as convenio ,
      s.descricao as statu,
      tc.descricao as tabela_convenio,
      s.descricao as status_solicitacao,
      c.cpf as cpf ,
      c.rg,
      tic.descricao as tipo_contrato,
      convs.descricao as convenio_solicitacao,
      sc.tipo_conta,
      sc.valor_parcela,
      sc.data_solicitacao as data_solicitacao,
      sc.valor_emprestimo as valor_emprestimo,
      (SELECT cpp.comissao FROM u440036343_mydb.comissao_prazo_parceiro cpp where cpp.pessoa_id = p.pessoa_id  and cpp.prazo_convenio_id =  itpc.item_prazo_convenio_id)  as comissao_pessoa,
      (sc.valor_emprestimo * (hs.comissao/100)) as comissao_redCred 
    
     FROM 
     u440036343_mydb.solicitacao_contrato sc ,
     u440036343_mydb.pessoa p ,
     u440036343_mydb.status_solicitacao s ,
     u440036343_mydb.item_prazo_convenio itpc ,
     u440036343_mydb.modelo_prazo mp ,
     u440036343_mydb.cliente c,
     u440036343_mydb.tabela_convenio tc ,
     u440036343_mydb.convenio_contrato cc,
     u440036343_mydb.banco b ,
     u440036343_mydb.item_tipo_contrato itc,
     u440036343_mydb.tipo_contrato tic ,
     u440036343_mydb.convenio_solicitacao convs ,
     u440036343_mydb.historico_solicitacao hs
     where 
     sc.pessoa_id = p.pessoa_id
     and sc.status_solicitacao_id = s.statu_id
     and sc.item_prazo_id  = itpc.item_prazo_convenio_id
     and itpc.item_tipo_contrato_id = itc.item_tipo_contrato_id
     and cc.convenio_contrato_id  = itc.convenio_contrato_id
     and tic.tipo_contrato_id  = itc.tipo_contrato_id
     and itpc.modelo_prazo_id = mp.modelo_prazo_id
     and sc.cliente_cliente_id = c.cliente_id 
     and tc.tabela_convenio_id = sc.tabela_convenio_id
     and cc.banco_banco_id = b.banco_id 
     and sc.convenio_solicitacao_id = convs.convenio_solicitacao_id
     and hs.solicitaca_id = sc.solicitacao_contrato_id";

     if($pessoaId != null){
    
      $sql .=" and p.pessoa_id = :pessoa_id";

     }

     if($dataInicio != null){
    
      $sql .=" and sc.data_solicitacao >= :dataInicio";

     }

     if($dataFim != null){
    
      $sql .=" and sc.data_solicitacao <= :dataFim";

     }

     if($statusId != null){
    
      $sql .=" and sc.status_solicitacao_id = :status_id";

     }
     
     
     $sql .="   ) as vwi_cred";
    
     $sql .=" ) as sald_cred ;";
    
    
  $stm =  $this->con->prepare($sql);

  if($pessoaId != null){
    $stm->bindParam(":pessoa_id",$pessoaId); 
  }

  if($dataFim != null){
    $stm->bindParam(":dataFim",$dataFim); 
  }

  
  if($dataInicio != null){
    $stm->bindParam(":dataInicio",$dataInicio); 
  }

  if($statusId != null){
    $stm->bindParam(":status_id",$statusId); 
  }


  // $stm->bindParam(":solicitacaoId",$solicitacaoId); 
  $stm->execute();
  $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
  $solicitacoes = array();

return $result;
}




}

}

?>