
<?php

use \Dao\ItemPrazoConvenioDao;

use \Model\Usuario;
use \Page\PageAdmin;


//============= Inicio Item  Prazo Convenio

$app->get("/admin/convenio/itemprazo/:itemTipoId",function($itemTipoId){
    pagePrazo($itemTipoId,null);
 });
 
 


    //busca ajax
    $app->get("/admin/convenio/itemprazo/solicitacao/:itemTipoId",function($itemTipoId){
        
    $itemPrazoConvenioDao = 	new ItemPrazoConvenioDao();
    $itensPrazoConvenio = $itemPrazoConvenioDao->findToItemTipoContrato($itemTipoId);
    
    echo json_encode($itensPrazoConvenio);
        
    });
    



    
    
    $app->post("/admin/convenio/itemprazo",function(){
    
        $itemTipoContratoId = $_POST['item_tipo_contrato_id'];
        $prazos = $_POST['prazo'];
        $itemPrazoConvenioDao = 	new ItemPrazoConvenioDao();
    
      
    
        $itemPrazoConvenioDao->alterarPrazos($prazos);
    
        pagePrazo($itemTipoContratoId,"Comissões salvas com Sucesso !!");
        exit;
        });
    
    
    //============= Fim Item  Prazo Convenio




    
function pagePrazo($itemTipoId,$msg){

	$pageAdmin  =  new PageAdmin();
	try{
$itemPrazoConvenioDao = 	new ItemPrazoConvenioDao();
$itensPrazoConvenio = $itemPrazoConvenioDao->findToItemTipoContrato($itemTipoId);
//echo "Tipo : ".$itemTipoId[0]['item_tipo_contrato_id'];
//var_dump($itemTipoId);
//exit;

$banco  =   $itensPrazoConvenio [0]['banco'];
$convenio  = $itensPrazoConvenio [0]['convenio'];
$tipoContrato  = $itensPrazoConvenio [0]['tipo_contrato'];

$pageAdmin->setTpl("itemPrazoConvenio",array("banco"=>$banco,"convenio"=>$convenio,"tipoContrato"=>$tipoContrato,"itens"=>$itensPrazoConvenio,"msg"=>$msg));

exit;
}catch(Exception $e){
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
}