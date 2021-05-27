<?php 
namespace Page{


use Rain\Tpl;
class PageAdmin {


private $tpl;
private $opcoes = [] ;
private $default  = [
"data"=>[ ]
];

function __construct($option = array()){
$this->opcoes  = array_merge_recursive($this->default , $option);

$config ["tpl_dir"] = $_SERVER['DOCUMENT_ROOT']."/tpl/admin/";
$config ["cache_dir"] = $_SERVER['DOCUMENT_ROOT']."/tpl/view_cache/";
$config ["debug"] = false;

Tpl::configure($config);

$this->tpl =  new Tpl;

$this->tpl->assign("usuario",$_SESSION['usuario']);

$this->tplVariavel($this->opcoes["data"]);

$this->tpl->draw("header");

}


public function setTpl($conteudo,$data = array() , $return  = false){
	
$this->tplVariavel($data);//passando o array com as variaveis paraserem adicionadas no template 
return $this->tpl->draw($conteudo,$return);
}



private function tplVariavel($array){
	
foreach ($array as $key => $value) {
	$this->tpl->assign($key,$value);
}
}




function __destruct(){

$this->tpl->draw("footer");

}





}
}

 ?>