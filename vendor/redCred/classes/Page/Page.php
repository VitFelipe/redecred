<?php 
namespace Page{


use Rain\Tpl;
class Page {


private $tpl;
private $opcoes = [] ;
private $default  = [
"data"=>[ ]
];

function __construct($option = array()){
$this->opcoes  = array_merge_recursive($this->default , $option);

$config ["tpl_dir"] = $_SERVER['DOCUMENT_ROOT']."/tpl/site/";
$config ["cache_dir"] = $_SERVER['DOCUMENT_ROOT']."/tpl/view_cache/";
$config ["debug"] = false;

Tpl::configure($config);

$this->tpl =  new Tpl;

$this->tplVariavel($this->opcoes["data"]);

}


public function setTpl($conteudo,$data = array() , $return  = false){
$this->tplVariavel($data);//passando o array com as variaveis paraserem adicionadas no template 


return $this->tpl->draw($conteudo,$return);
}



private function tplVariavel($array =  array()){
foreach ($array as $key => $value) {
	$this->tpl->assign($key,$value);
}
}




function __destruct(){



}





}
}

 ?>