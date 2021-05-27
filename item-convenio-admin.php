
<?php
use \Dao\ItemTipoContratoDao;

use \Model\Usuario;
use \Page\PageAdmin;

//=============Item TipoConvenio 

$app->get("/admin/convenio/:convenioId/detalhe",function($convenioid){
	$pageAdmin  =  new PageAdmin();
try{
$itenTipoContratoDao = 	new ItemTipoContratoDao();
$itensTipoConvenio = $itenTipoContratoDao->findAllToConvenio($convenioid);


$banco  =   $itensTipoConvenio [0]['banco'];
$convenio  = $itensTipoConvenio [0]['convenio'];



$pageAdmin->setTpl("itemTipoContrato",array("banco"=>$banco,"convenio"=>$convenio,"itens"=>$itensTipoConvenio));


}catch(Exception $e){
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
});



//
$app->get("/admin/convenio/tipoconvenio/:convenioId",function($convenioid){
	$itenTipoContratoDao = 	new ItemTipoContratoDao();
	$itensTipoConvenio = $itenTipoContratoDao->findAllToConvenio($convenioid);
	
	echo json_encode($itensTipoConvenio);
	});


//============= Fim Item TipoConvenio 