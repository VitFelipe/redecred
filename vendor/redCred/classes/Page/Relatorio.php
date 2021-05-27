<?php 
namespace Page{


use Rain\Tpl;
class Relatorio {


private $tpl;

function __construct($option = array()){


$config ["tpl_dir"] = $_SERVER['DOCUMENT_ROOT']."/tpl/admin/relatorio/";
$config ["cache_dir"] = $_SERVER['DOCUMENT_ROOT']."/tpl/view_cache/";
$config ["debug"] = false;

Tpl::configure($config);

$this->tpl =  new Tpl();

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



}
}

 ?>