<?php

function formatNumber(float $valor){
return number_format($valor,2,",",".");
}


function formatData(string $data){
    $date = date_create( $data);
   return   date_format($date, 'd/m/Y');
 
    }


?>