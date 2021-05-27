
<?php
require "vendor/autoload.php";
// namespace
use Rain\Tpl;
// config
$config = array(
    "tpl_dir"       => "tpl/",
    "cache_dir"     => "cache/",
    "debug"         => true, // set to false to improve the speed
);
Tpl::configure( $config );





$tpl = new Tpl;
// assign a variable

// assign a variable
$tpl->assign( "name", "Vitor" );

$tpl->assign( "version", PHP_VERSION);
// assign an array
$tpl->assign( "week", array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ) );



$tpl->draw( "index" );


?>