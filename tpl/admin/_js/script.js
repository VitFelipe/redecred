$(document).ready(function(){

//===================================
//=================Banco ============
//===================================

VerificaSolicitacao();



    //Form Banco
    $("#formularioBanco").submit(function(event){
     
        var erro  = "";

        var descricao  = $("#desc-banco-id").val();
        var sigla  = $("#sigla-banco-id").val();
        
        
        if(descricao.length < 2){
           erro = "*Descrição Incorreta !!<br/>"
        }
    
        

       

   


     
        if(erro.length > 0){
         
            $("#statu").html(erro);
            $("#statu").addClass(" alert ").addClass(" alert-danger");

            event.preventDefault();

        }


    });

  
  //Alerta-Exclusão-BAnco
   $(".btn-excluir-banco").click(function(){

      var tr =   $(this).closest('tr'); 
       var descricao  = tr.find(".descricao_banco").text();
       var id  = tr.find(".id_banco").text();
      var texto = "Tem certeza que deseja excluir o  item  <b>"+descricao+"</b> ? ";
      $("#msg-alert-banco").html(texto);
      $("#btn-delete-banco").attr("href","/admin/banco/"+id+"/delete");

   });

   //Edição Banco ======================
  
   
   
   $(".btn-editar-banco").click(function(){

    var tr =   $(this).closest('tr'); 
     var descricao  = tr.find(".descricao_banco").text();
     var id  = tr.find(".id_banco").text();
     var sigla  = tr.find(".sigla_banco").text();
      

     $("#desc-banco2-id").val(descricao);
     $("#sigla-banco2-id").val(sigla);
     $("#banco-editar-id").val(id);

    


 });



   //===================================
  //==================fim Banco========
  //===================================


  //======================Inicio Convenio
  //=================================


    //Alerta-Exclusão-Convenio
   $(".btn-excluir-convenio").click(function(){

    var tr =   $(this).closest('tr'); 
     var descricao  = tr.find(".descricao_conv").text();
     var id  = tr.find(".id_convenio").text();
    var texto = "Tem certeza que deseja excluir o  item  <b>"+descricao+"</b> ? ";
    $("#msg-alert-convenio").html(texto);
    $("#btn-delete-convenio").attr("href","/admin/convenio/"+id+"/delete");

 });



  $(function () {
    $(".table-style").DataTable();
  });



    //======================Inicio Usuario
  //=================================

  $("#form-user-id").submit(function(){
   

    var senha = $(".senhaId").val();
    var confSenha = $(".confSenhaId").val();
  

    if(senha != confSenha){
        $(".msg-erro-id").html("<p class='alert alert-danger' >confirmação de Senha Invalida</p>");
        return  false;
    }else{
        $(".msg-erro-id").html("");
    }


    return true;
  });
   


 $(".login-add-id").focusout(function(){
   var login  =  $(".login-add-id").val();
   
  
   if(login.length > 3){
       
    verificaLogin(login);
   }else{
    $(".login-layout").removeClass("has-success");
    $(".login-layout").removeClass("has-error");
    $(".msg-user-statu").text("");
   }

 });




  function verificaLogin(login_param){
    $.post( "/admin/usuario/login", { login :login_param  })
    .done(function( data ) {
    if(data == 1){
        
        $(".login-layout").removeClass("has-error");
        $(".login-layout").addClass("has-success");
        $(".msg-user-statu").text("login valido !!");


    }else{
        
        $(".login-layout").removeClass("has-success");
        $(".login-layout").addClass("has-error");
        $(".msg-user-statu").text("login ja exitente  !!");

    }     
    }) .fail(function() {
      
      })
      .always(function() {
      
      });
  }

  
   //======================Fim Usuario
  //=================================


  
  //======================Inicio Tabele Convenio
  //=================================

   
  $(".select-banco").change(function(){

  var bancoId =   $(".select-banco").val();

    //Limpa dados Tipo Contrato
    $("#tipo_contrato").text("");
    $("#tipo_contrato").append("<option value='0' disabled selected >Selecione o  Tipo Contrato</option>");
     //Limpa Tipo prazo
    $("#prazo-id").html("");
    //Limpa Tabela Convenio
    $(".select-tabela-convenio").html("");

    $.post( "/admin/convenio/banco", { banco_id : bancoId  })
    .done(function( data ) {
      var convenios = JSON.parse(data);
      //LimpaDados Convenio
      $(".select-convenio").html("");
      $(".select-convenio").append("<option value='0' disabled selected >Selecione um Convenio</option>");
    
  
      for(var conv of convenios){
          
          $(".select-convenio").append("<option value='"+conv.convenio_contrato_id+"'>"+conv.descricao+"</option>");
  
  
      } 
    }).fail(function(er) {
        console.log(er);
         alert(er);
  });
  
  


  });


//Busca Tabela-Conveio
  $(".select-convenio").change(function(){

   var convenio_Id =    $(".select-convenio").val();




   $.post( "/admin/tabelaConvenio/convenio", { convenioId : convenio_Id  })
  .done(function( data ) {
    var tabConvenios = JSON.parse(data);
    $(".select-tabela-convenio").text("");
   
    //Limpa dados Tipo Contrato
    $("#tipo_contrato").text("");
     $("#tipo_contrato").append("<option value='0' disabled selected >Selecione o  Tipo Contrato</option>");
    //Limpa Tipo Prazo
    $("#prazo-id").text("");

    for(var tabe of tabConvenios){
        
        $(".select-tabela-convenio").append("<option value='"+tabe.tabela_convenio_id+"'>"+tabe.descricao+"</option>");


    } 
  }).fail(function(er) {
      console.log(er);
       alert(er);
});


$.get( "/admin/convenio/tipoconvenio/"+convenio_Id)
   .done(function( data ) {
     var tabConvenios = JSON.parse(data);
     $("#tipo_contrato").text("");
     $("#tipo_contrato").append("<option value='0' disabled selected >Selecione o  Tipo Contrato</option>");

      //Limpa Tipo Prazo
    $("#prazo-id").text("");
 
     for(var tabe of tabConvenios){
         
         $("#tipo_contrato").append("<option value='"+tabe.item_tipo_contrato_id+"'>"+tabe.tipo_contrato+"</option>");
 
     } 
   }).fail(function(er) {
       console.log(er);
        alert(er);
 });




  });


    
    //======================Fim Tabele Convenio
  //=================================


//=================Inicio Prazo

$("#tipo_contrato").change(function(){

    var tipoContratoId =    $("#tipo_contrato").val();

    $.get( "/admin/convenio/itemprazo/solicitacao/"+tipoContratoId)
   .done(function( data ) {
     var tabConvenios = JSON.parse(data);
     $("#prazo-id").text("");
 
     for(var tabe of tabConvenios){
         
         $("#prazo-id").append("<option value='"+tabe.item_prazo_convenio_id+"'>"+tabe.descricao+"</option>");
 
     } 
   }).fail(function(er) {
       console.log(er);
        alert(er);
 });


});


//-----Fim Prazo




   //======================Inicio Tipo Contrato
  //=================================
  
  

  //Busca Tipo Contrato
  //Busca Tabela-Conveio
 

  //Alerta-Exclusão-Convenio
  $(".tipo_contrato_edit").click(function(){

    var tr =   $(this).closest('tr'); 
     var descricao  = tr.find(".descricao-tipo-contrato").text();
     var id  = tr.find(".id-tipo-contrato").text();
  
    $("#desc-tipo-contrato-id").val(descricao);
    $("#tipo-contrato-id").val(id);

 });


   //======================Fim Tipo Contrato
  //=================================


    //======================Inicio Solicitação de Emprestimo
  //=================================

  




//Inicio Busca Cep
 $("#cep-id").focusout(function(){
  var cep = $("#cep-id").val();
  
if(cep.length > 0){
 $.get("https:/viacep.com.br/ws/"+cep+"/json/ ",function(){

 }).done(function( data ) {

    $("#municipio-id").val(data.localidade);
    $("#bairro-id").val(data.bairro);
    $("#estado-id").val(data.uf);
    $("#endereco-id").val(data.logradouro);
 
    disableInput("municipio-id");

    if($("#bairro-id").val().length > 0){
      //  disableInput("bairro-id");
    }

    if($("#endereco-id").val().length > 0){
        //disableInput("endereco-id");
    }
   
    disableInput("estado-id");
    

  }).fail(function(er) {
      
    alert(" Cep Invalido !!");
    $("#municipio-id").removeAttr("disabled");
    $("#municipio-id").val("");

    $("#bairro-id").removeAttr("disabled");
    $("#bairro-id").val("");

    $("#estado-id").removeAttr("disabled");
    $("#estado-id").val("");

    $("#endereco-id").removeAttr("disabled");
    $("#endereco-id").val("");


});

}else{
    $("#municipio-id").removeAttr("disabled");
    $("#municipio-id").val("");

    $("#bairro-id").removeAttr("disabled");
    $("#bairro-id").val("");

    $("#estado-id").removeAttr("disabled");
    $("#estado-id").val("");

    $("#endereco-id").removeAttr("disabled");
    $("#endereco-id").val("");

}
//Fim Busca Cep

 });






//=======================================
//Botões Navegação
//=====================================


//Voltar Solicitação
 $("#btn-passo-solicitacao").click(function(){
    ativarTab("tab-solicitacao-id");
    return true;
 });

 //Voltar Solicitação
 $("#btn-volta-bancario").click(function(){
    ativarTab("tab-bancario-id");
    return true;
 });

 //Voltar Cliente
 $("#btn-volta-cliente").click(function(){
    ativarTab("tab-cliente-id");
    return true;
 });

  //Voltar contrato
  $("#btn-volta-contrato").click(function(){
    ativarTab("tab-contrato-id");
    return true;
 });

 //=============================

 //Avançar Para Cliente
$("#btn-passo-cliente").click(function(){
    var val = $("#solicitacao_id").val();

    if(val == null){
       $(".msg-cad").html("<p class='alert alert-danger'>Selecione o Convênio</p>");
    return false;
    }

    if(val == 1){
    $(".outros_conv").hide();
    $(".inss").show();
    }else{
       $(".outros_conv").show();
       $(".inss").hide();
    }

    $(".msg-cad").html("");
    ativarTab("tab-cliente-id");
    return true;
});
//Fim Avançar Cliente

 
//Btn avançar para 
 $("#btn-passo-bancario").click(function(){
      if(validaDadosCliente()){
        
        ativarTab("tab-bancario-id");
        return true;

     }else{
         return false;
     }

    
 });

 //Btn Avançar Dados de Contato
 $("#btn-passo-contrato").click(function(){
     if(validaDadosBancarios()){
        ativarTab("tab-contrato-id");
        return true;
     }else{

        return false;
     }
    
     ativarTab("tab-contrato-id");
});

//Btn Avança Documentos
$("#btn-passo-documento").click(function(){
    if(validaDadosContrato()){

        ativarTab("tab-documento-id");
 return true;
    }
    return false;
});


//=======================================
//Fim Botões Navegação
//=====================================



//================================================
 // Inicio Functions de Validação
//============================================

function ativarTab(tabP){
    var tabs  = ["tab-solicitacao-id","tab-bancario-id","tab-contrato-id","tab-cliente-id","tab-documento-id"];

for(var tab  of tabs){

   if(tabP == tab ){
    $("#"+tab).addClass("active"); 
}else{
    $("#"+tab).removeClass("active").addClass("disabled");
    var b =  $("#"+tab).find("a");
        b.removeAttr("data-toggle");
}

}

}


//Seleção Dados Bancarios 

$("#tipo_conta_id").change(function(){
   
   var selecao =  $("#tipo_conta_id").val();

   if(selecao == "ORDEM_DE_PAGAMENTO"){
   
    $(".div-conta").hide();

   }else{

    $(".div-conta").show();

   }

});



//Metodos que valida formulario !!

function validaDadosCliente(){


    if($("#cpf-id").val().length < 10){
        $("#cpf-id").css("border-color","red");
        $("#cpf-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  o CPF !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#cpf-id").css("border-color","");
    }


    if($("#nome-id").val().length < 10){
        $("#nome-id").css("border-color","red");
        $("#nome-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  o Nome do Cliente !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#nome-id").css("border-color","");
    }

    if($("#rg-id").val().length < 6){
        $("#rg-id").css("border-color","red");
        $("#rg-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  o RG do Cliente !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#rg-id").css("border-color","");
    }

    if($("#data-em-rg-id").val().length < 6){
        $("#data-em-rg-id").css("border-color","red");
        $("#data-em-rg-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  a Data  de Emissão do RG !!!</p>");
        return false;
    }else{
        $("#data-em-rg-id").css("border-color","");
        $(".msg-cad").html("");
    }
    

    if($("#data-em-nascimento-id").val().length < 6){
        $("#data-em-nascimento-id").css("border-color","red");
        $("#data-em-rg-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  a Data  de Emissão do RG !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#data-em-nascimento-id").css("border-color","");
    }
//nome mãe
    if($("#nome-mae-id").val().length < 6){
        $("#nome-mae-id").css("border-color","red");
        $("#nome-mae-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  a Data  de Emissão do RG !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#nome-mae-id").css("border-color","");
    }
//Email 
    if($("#email-id").val().length < 6){
        $("#email-id").css("border-color","red");
        $("#email-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe o Email!!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#email-id").css("border-color","");
    }

    //cep 
    if($("#cep-id").val().length < 1){
        $("#cep-id").css("border-color","red");
        $("#cep-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  a Data  de Emissão do RG !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#cep-id").css("border-color","");
    }

     //barrio 
     if($("#bairro-id").val().length < 1){
        $("#bairro-id").css("border-color","red");
        $("#bairro-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  a Data  de Emissão do RG !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#bairro-id").css("border-color","");
    }

     //estado 
     if($("#estado-id").val().length < 2){
        $("#estado-id").css("border-color","red");
        $("#estado-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  o Estado !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#estado-id").css("border-color","");
    }


    var solicitacao_id = $("#solicitacao_id").val();

    if(solicitacao_id == 1){
//Caso A Solicitação Seje INSS

          //numero Beneficio 
    if($("#num-beneficio-id").val().length < 1){
        $("#num-beneficio-id").css("border-color","red");
        $("#num-beneficio-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  o Numero do Beneficio !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#num-beneficio-id").css("border-color","");
    }

     //Especie Beneficio 
     if($("#especie-bene-id").val().length < 1){
        $("#especie-bene-id").css("border-color","red");
        $("#especie-bene-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  a Especie do Beneficio !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#especie-bene-id").css("border-color","");
    }

     //Senha Benefeficio 
     if($("#senha-beneficio-id").val().length < 3){
        $("#senha-beneficio-id").css("border-color","red");
        $("#senha-beneficio-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Senha do Beneficio Incorreta!!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#senha-beneficio-id").css("border-color","");
    }

     //UF Beneficio 
     if($("#uf-beneficio-id").val().length < 3){
        $("#uf-beneficio-id").css("border-color","red");
        $("#uf-beneficio-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  a UF do Beneficio !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#uf-beneficio-id").css("border-color","");
    }

    //Renda Beneficio 
    if($("#renda-bene-id").val().length < 3){
        $("#renda-bene-id").css("border-color","red");
        $("#renda-bene-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  a  Renda  !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#renda-bene-id").css("border-color","");
    }


    }else{

        //Caso Não Seje INSS

      //Matricula 
     if($("#num-matricula-id").val().length < 3){
        $("#num-matricula-id").css("border-color","red");
        $("#num-matricula-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  o Numero da Matricula !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#num-matricula-id").css("border-color","");
    }

    //Senha Matricula 
    if($("#senha_matri-id").val().length < 3){
        $("#senha_matri-id").css("border-color","red");
        $("#senha_matri-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe  a   Senha da Matricula  !!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#senha_matri-id").css("border-color","");
    }


    }

   
    return true;
}








function validaDadosBancarios(){

   var tipoConta =  $("#tipo_conta_id").val();
   
   
   if($("#tipo_conta_id").val() == null){
    $("#tipo_conta_id").css("border-color","red");
    $("#tipo_conta_id").focus();
    $(".msg-cad").html("<p class='alert alert-danger'>Selecione o Tipo de Conta !!!</p>");
    return false;
}else{
    $(".msg-cad").html("");
    $("#tipo_conta_id").css("border-color","");
}



if($("#banco-id").val().length < 5){
    $("#banco-id").css("border-color","red");
    $("#banco-id").focus();
    $(".msg-cad").html("<p class='alert alert-danger'>Informe o Banco!!!</p>");
    return false;
}else{
    $(".msg-cad").html("");
    $("#banco-id").css("border-color","");
}

if($("#agencia-id").val().length < 5){
    $("#agencia-id").css("border-color","red");
    $("#agencia-id").focus();
    $(".msg-cad").html("<p class='alert alert-danger'>Informe a Agencia!!!</p>");
    return false;
}else{
    $(".msg-cad").html("");
    $("#agencia-id").css("border-color","");
}

if(tipoConta != "ORDEM_DE_PAGAMENTO"){

    if($("#conta-id").val().length < 5){
        $("#conta-id").css("border-color","red");
        $("#conta-id").focus();
        $(".msg-cad").html("<p class='alert alert-danger'>Informe a Conta!!!</p>");
        return false;
    }else{
        $(".msg-cad").html("");
        $("#conta-id").css("border-color","");
    }



}

    

    return true;
}


function validaDadosContrato(){

     
   if($("#tipo_contrato").val() == null){
    $("#tipo_contrato").css("border-color","red");
    $("#tipo_contrato").focus();
    $(".msg-cad").html("<p class='alert alert-danger'>Selecione o Tipo Contrato !!!</p>");
    return false;
}else{
    $(".msg-cad").html("");
    $("#tipo_contrato").css("border-color","");
}

if($("#selecao_banco_soli").val() == null){
    $("#selecao_banco_soli").css("border-color","red");
    $("#selecao_banco_soli").focus();
    $(".msg-cad").html("<p class='alert alert-danger'>Selecione o Banco do Contato !!!</p>");
    return false;
}else{
    $(".msg-cad").html("");
    $("#selecao_banco_soli").css("border-color","");
}


if($("#selecao-convenio-solit").val() == null){
    $("#selecao-convenio-solit").css("border-color","red");
    $("#selecao-convenio-solit").focus();
    $(".msg-cad").html("<p class='alert alert-danger'>Selecione o Convenio !!!</p>");
    return false;
}else{
    $(".msg-cad").html("");
    $("#selecao-convenio-solit").css("border-color","");
}


if($(".select-tabela-convenio").val() == null){
    $(".select-tabela-convenio").css("border-color","red");
    $(".select-tabela-convenio").focus();
    $(".msg-cad").html("<p class='alert alert-danger'>Selecione o Convenio !!!</p>");
    return false;
}else{
    $(".msg-cad").html("");
    $(".select-tabela-convenio").css("border-color","");
}


if($("#valor-emprestimo-id").val().length < 3 && $("#valor-parcela-id").val().length < 3){
    $("#valor-parcela-id").css("border-color","red");
    $("#valor-emprestimo-id").css("border-color","red");
    $("#valor-emprestimo-id").focus();
    $(".msg-cad").html("<p class='alert alert-danger'>Informe o Valor do emprestimo ou parcela !!!</p>");
    return false;
}else{
    $(".msg-cad").html("");
    $("#valor-emprestimo-id").css("border-color","");
    $("#valor-parcela-id").css("border-color","");
}




    return true;

}

//================================================
 // Inicio busca Cliente por cpf
//============================================


$("#cpf-id").focusout(function(){

    var cpfParam =    $("#cpf-id").val();
 
    $.post("/admin/cliente/buscacpf", { cpf : cpfParam  })
   .done(function( data ) {
     var dataCliente = JSON.parse(data);
   
     if(dataCliente.nome != null){
        
     preencheCampo("nome-id",dataCliente.nome); 
     preencheCampo("data-em-nascimento-id",dataCliente.data_nascimento); 
     preencheCampo("rg-id",dataCliente.rg); 
     preencheCampo("naturalidade-id",dataCliente.naturalidade); 
     preencheCampo("estado_civil-id",dataCliente.estado_civil); 
     preencheCampo("cep-id",dataCliente.cep); 
     preencheCampo("endereco-id",dataCliente.endereco); 
     preencheCampo("nome-mae-id",dataCliente.nome_mae); 
     preencheCampo("orgao-id",dataCliente.orgao_emissor); 
     preencheCampo("municipio-id",dataCliente.cidade); 
     preencheCampo("data-em-rg-id",dataCliente.data_emissao); 
     preencheCampo("telefone-id",dataCliente.telefone); 
     preencheCampo("email-id",dataCliente.email); 
     preencheCampo("bairro-id",dataCliente.bairro); 
     preencheCampo("estado-id",dataCliente.estado); 
    }else{
        preencheCampo("nome-id",""); 
        preencheCampo("data-em-nascimento-id",""); 
        preencheCampo("rg-id",""); 
        preencheCampo("naturalidade-id",""); 
        preencheCampo("estado_civil-id",""); 
        preencheCampo("cep-id",""); 
        preencheCampo("endereco-id",""); 
        preencheCampo("nome-mae-id",""); 
        preencheCampo("orgao-id",""); 
        preencheCampo("municipio-id",""); 
        preencheCampo("data-em-rg-id",""); 
        preencheCampo("telefone-id",""); 
        preencheCampo("email-id",""); 
        preencheCampo("bairro-id",""); 
        preencheCampo("estado-id",""); 
    }
    }).fail(function(er) {
       console.log(er);
        alert(er);
 });


});

function preencheCampo( id , valor ){

    if(valor != ""){
       
    }else{
        $("#"+id).removeAttr("readonly");
    }
    $("#"+id).val(valor);

}

//================================================
 // Inicio busca Cliente por cpf
//============================================


//================================================
 // Fim  Functions de Validação
//============================================


//================================================
 // Inicio script Anexos Acompanhamento
//============================================


$(".anexo-doc-id").click(function(){
    var tr =   $(this).closest('tr'); 
    var solicitacaoId  = tr.find(".codigo-solicitacao").text();

    $.get("/admin/solicitacao/anexo/"+solicitacaoId,function(){
        
    }).done(function( data ) {

    var tabAnexos = JSON.parse(data);
     $("#prazo-id").text("");
     $("#data-anexos-doc").html("");
     for(var tabe of tabAnexos){
         
         $("#data-anexos-doc").append("<tr><td></td><td>"+tabe.tipo_documento+"</td><td>"+tabe.nome+"</td>"
         +"<td><a href='/"+tabe.arquivo+"' target='_blank' class='btn btn-success' ><span class='fa  fa-download'></span></a></td></tr>");
 
     } 

    }).fail(function(data ){

    });


});

//================================================
 // Fim script Anexos Acompanhamento
//============================================

$(".statu_solicitacao").click(function(){
    var tr =   $(this).closest('tr'); 
    var solicitacaoId  = tr.find(".codigo-solicitacao").text();


    $("#solicitacao_hid_id").val(solicitacaoId);



});



//================================================
 //Acompanhamento - Status
//============================================

//================================================
//====Busca Informações do Cliente
//================================================

$(".busca-info").click(function(){
    var tr =   $(this).closest('tr'); 
var id  = tr.find(".id-client").text();

    $.ajax({
        type: 'GET',
        url: '/admin/cliente/info/'+id,
        success: function(data) {
            var client =  JSON.parse(data);
          
            $("#info-nome").val(client.nome);
            $("#info-mae").val(client.nome_mae);
            $("#info-cpf").val(client.cpf);
            $("#info-rg").val(client.rg);
            $("#info-estado").val(client.estado);
            $("#info-bairro").val(client.bairro);
            $("#info-estado-civil").val(client.estado_civil);
            $("#info-telefone").val(client.telefone);
            var nascimento = new Date(client.data_nascimento);
            $("#info-nascimento").val(formatData(nascimento));
            $("#info-cidade").val(client.cidade);
            $("#info-orgao").val(client.orgao_emissor);
            var dataEmissao = new Date(client.data_emissao);
            $("#info-data-emissao").val(formatData(dataEmissao));
            $("#info-email").val(client.email);
            $("#info-endereco").val(client.endereco);
            
    
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
       //Erro !! Sem mostrar erro  por enquanto 
           
        }
    })



});




//================================================
 //Inicio Verifica ====Solicitação
//============================================


setInterval(VerificaSolicitacao,5000);



function VerificaSolicitacao(){



    $.ajax({
        type: 'GET',
        url: '/admin/solicitacao/notificacao',
        success: function(data) {
            var notificacoes = JSON.parse(data);
            $("#start-notfic-id").text("");
        
              var  size = 0 ;

            for(var notificacao of notificacoes){
             
      
                $("#start-notfic-id").append(" <a href='/admin/solicitacao/"+notificacao.solicitacao_contrato_id+"/view'><i class='fa fa-bullhorn text-aqua'></i>Parceiro:<b>"+notificacao.nome_parceiro+"</b></br>Valor : R$ "+notificacao.valor_emprestimo+"</br>Data : "+notificacao.data_solicitacao+" </a>");
             
                size ++;
            } 
            
            if(size > 0){
                const audio = document.querySelector("audio");
                audio.play();
            }
           
            $(".total-not-cl").text(size);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
       //Erro !! Sem mostrar erro  por enquanto 
           
        }
    })

   

}






//================================================
 //Fim Verifica ====Solicitação
//============================================






//======================Fim Solicitação de Emprestimo
//=================================



  //Mascara Input 

  $("#telefone-id").mask("(99)99999-9999");
  $("#cpf-id").mask("999.999.999-99");
  


  function disableInput(id){
    $("#"+id).attr("readonly","true");
}



  //Fim Mascara Input 


  //==========Formata Data 



  function formatData(data){
    var dia  = data.getDate();
    if (dia< 10) {
        dia  = "0" + dia;
    }
    
    var mes  = data.getMonth() + 1;
    if (mes < 10) {
        mes  = "0" + mes;
    }
    
    var ano  = data.getFullYear();
    dataFormatada = dia + "/" + mes + "/" + ano;

    return dataFormatada;
  }
 


});