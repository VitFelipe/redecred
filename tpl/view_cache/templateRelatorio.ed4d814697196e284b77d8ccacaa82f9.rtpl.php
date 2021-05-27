<?php if(!class_exists('Rain\Tpl')){exit;}?><html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">

</head>

<body lang=PT-BR link="#2C5C85" vlink="#BF4A27">

<div class=WordSection1>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 summary="Layout table for name, contact info, and objective" align=left
 width="100%" style='width:100.0%;border-collapse:collapse;margin-left:4.8pt;
 margin-right:4.8pt'>
 <tr style='height:114.1pt'>
  <td width=624 valign=top style='width:468.0pt;padding:0cm 0cm 0cm 0cm;
  height:114.1pt'>
  <p class=ContactInfoEmphasis><img width=167 height=78
  src='https://redecredmb.com/tpl/site/img/logo-transparente.png' align=left hspace=12></p>
  <p class=MsoNormalCxSpFirst><b><span lang=EN-US style='color:#1D824C'>        
                                                              </span></b></p>
  <p class=MsoNormalCxSpLast><span lang=EN-US style='font-size:16.0pt'> DADOS
  DA SOLICITAÇÃO - <?php echo formatData($solicitacao['data_solicitacao']); ?> </span> </p>
  <p class=ContactInfo align=left style='text-align:left'><span lang=EN-US>                        
   Promotora de crédito  -  98 8823-3796</span></p>

  </td>
 </tr>
</table>

<h1><span lang=EN-US>Cliente</span></h1>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 summary="Experience layout table" width="100%" style='width:100.0%;margin-left:
 -1.15pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=622 valign=top style='width:466.85pt;border:none;border-left:dotted #BFBFBF 2.25pt;
  padding:0cm 0cm 0cm 28.8pt'>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>Nome :  </span> <?php echo htmlspecialchars( $solicitacao['nome_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>RG </span>: <?php echo htmlspecialchars( $solicitacao['rg'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>RG data emissão </span>: <?php echo htmlspecialchars( $solicitacao['data_emissao'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>Orgão Emissor </span>: <?php echo htmlspecialchars( $solicitacao['orgao_emissor'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>Email :</span> <?php echo htmlspecialchars( $solicitacao['email'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>Cpf :</span>  <?php echo htmlspecialchars( $solicitacao['cpf'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>Estado Civil :</span>  <?php echo htmlspecialchars( $solicitacao['estado_civil'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>telefone :</span>  <?php echo htmlspecialchars( $solicitacao['telefone'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>naturalidade  :</span> <?php echo htmlspecialchars( $solicitacao['naturalidade'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>Data de Nascimento :</span>  <?php echo formatData($solicitacao['data_nascimento']); ?></h3>
  
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>Endereço :</span> <?php echo htmlspecialchars( $solicitacao['endereco_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>Cidade :</span> <?php echo htmlspecialchars( $solicitacao['cidade_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <h3 style='margin-top:6.0pt'><span lang=EN-US style='color:black'>Bairro :</span> <?php echo htmlspecialchars( $solicitacao['bairro'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>


  <p class=MsoNormal><span lang=EN-US>&nbsp;</span></p>
  </td>
 </tr>
</table>





<h1><span lang=EN-US>Dados Bancarios Cliente</span></h1>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 summary="Education layout table" width="99%" style='width:99.5%;margin-left:
 3.6pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=624 valign=top style='width:467.75pt;border:solid #BFBFBF 2.25pt;
  padding:0cm 0cm 0cm 28.8pt'>
  <h3><span lang=EN-US style='color:black'>Banco : </span>  <?php echo htmlspecialchars( $solicitacao['banco_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
 
 

  <h3><span lang=EN-US style='color:black'>Tipo de Conta  : </span>  <?php echo htmlspecialchars( $solicitacao['tipo_conta'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>



  <h3><span lang=EN-US style='color:black'>Conta : </span>  <?php echo htmlspecialchars( $solicitacao['conta'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>




  <h3><span lang=EN-US style='color:black'>Agencia : </span>  <?php echo htmlspecialchars( $solicitacao['agencia'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>


</td>
</tr>
</table>

<h1><span lang=EN-US>Contrato</span></h1>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 summary="Education layout table" width="99%" style='width:99.5%;margin-left:
 3.6pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=624 valign=top style='width:467.75pt;border:solid #BFBFBF 2.25pt;
  padding:0cm 0cm 0cm 28.8pt'>
  <h3><span lang=EN-US style='color:black'>Banco : </span>  <?php echo htmlspecialchars( $solicitacao['banco'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

  <h3><span lang=EN-US style='color:black'>convênio :</span>  <?php echo htmlspecialchars( $solicitacao['convenio'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

  <h3><span lang=EN-US style='color:black'>tabela de convênio :</span>  <?php echo htmlspecialchars( $solicitacao['tabela_convenio'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

  <h3><span lang=EN-US style='color:black'>tipo contrato :</span>  <?php echo htmlspecialchars( $solicitacao['tipo_contrato'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

  <h3><span lang=EN-US style='color:black'>Prazo :</span>  <?php echo htmlspecialchars( $solicitacao['prazo'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

  <h3><span lang=EN-US style='color:black'>valor emprestimo :</span>   <?php echo formatNumber($solicitacao['valor_emprestimo']); ?></h3>

  <h3><span lang=EN-US style='color:black'>valor parcela  : </span>  <?php echo formatNumber($solicitacao['valor_parcela']); ?></h3>

  <h3><span lang=EN-US style='color:black'>status : </span>  <?php echo htmlspecialchars( $solicitacao['statu'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

  <h3><span lang=EN-US style='color:black'>convênio solicitação : </span>  <?php echo htmlspecialchars( $solicitacao['convenio_solicitacao'], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
  <p class=MsoNormal><span lang=EN-US>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=624 valign=top style='width:467.75pt;border:none;border-left:dotted #BFBFBF 2.25pt;
  padding:10.8pt 0cm 0cm 28.8pt'>
  <p class=MsoNormalCxSpMiddle><span lang=EN-US>&nbsp;</span></p>
  </td>
 </tr>
</table>



</div>

</body>

</html>
