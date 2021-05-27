<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
</head>
<body class="hold-transition login-page">
<div class="login-box">
 
  <div class="login-box-body">
    <p class="login-box-msg"></p>
    
    <div class="page-header">
     <h4>Relatório de Solicitações</h4>
    </div>
    <table style="border:1px solid black;">
 <thead>
<th style="border:1px solid black;">Nome Cliente</th>
<th style="border:1px solid black;">Nome Parceiro</th>
<th style="border:1px solid black;">Banco Parceiro</th>
<th style="border:1px solid black;">Agencia Parceiro</th>
<th style="border:1px solid black;">Conta Parceiro</th>
<th style="border:1px solid black;">Banco Solicitacao</th>
<th style="border:1px solid black;">Convênio </th>
<th style="border:1px solid black;">Convênio Solicitacão</th>
<th style="border:1px solid black;">Data Solicitação</th> 
<th style="border:1px solid black;">Valor Emprestimo</th>   
<?php if( $perfil == 1 ){ ?>
<th style="border:1px solid black;">Comissão RedCred</th>
<?php } ?>
<th style="border:1px solid black;">Comissão Parceiro</th>
<?php if( $perfil == 1 ){ ?>
<th style="border:1px solid black;">Saldo</th>
<?php } ?>
 </thead>
<?php $counter1=-1;  if( isset($solicitacoes) && ( is_array($solicitacoes) || $solicitacoes instanceof Traversable ) && sizeof($solicitacoes) ) foreach( $solicitacoes as $key1 => $value1 ){ $counter1++; ?>
<tr>
  <td style="border:1px solid black;"><?php echo htmlspecialchars( $value1["nome_cliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
  <td style="border:1px solid black;"><?php echo htmlspecialchars( $value1["nome_parceiro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
  <td style="border:1px solid black;"><?php echo htmlspecialchars( $value1["banco_parceiro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
  <td style="border:1px solid black;"><?php echo htmlspecialchars( $value1["agencia_parceiro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
  <th style="border:1px solid black;"><?php echo htmlspecialchars( $value1["conta_parceiro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
  <td style="border:1px solid black;"><?php echo htmlspecialchars( $value1["banco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
  <td style="border:1px solid black;"><?php echo htmlspecialchars( $value1["convenio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
  <td style="border:1px solid black;"><?php echo htmlspecialchars( $value1["convenio_solicitacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
  <td style="border:1px solid black;"><?php echo formatData($value1["data_solicitacao"]); ?></td>
  <td style="border:1px solid black;">R$<?php echo formatNumber($value1["valor_emprestimo"]); ?></td>
  <?php if( $perfil ==1 ){ ?>
  <td style="border:1px solid black;">R$<?php echo formatNumber($value1["comissao_redCred"]); ?></td>
  <?php } ?>
  <td style="border:1px solid black;">R$<?php echo formatNumber($value1["comissao_parceiro"]); ?></td>
  <?php if( $perfil ==1 ){ ?>
  <td style="border:1px solid black;">R$<?php echo formatNumber($value1["saldo"]); ?></td>
  <?php } ?>
</tr>
<?php } ?>

    </table>
  </div>
  <!-- /.login-box-body -->
</div>

</body>
</html>
