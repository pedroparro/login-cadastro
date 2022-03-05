//div form
//trocando DIV display 
$("button.change").on("click", function() {
    $("div#formulario").toggleClass("cadastro");

    $("form#formularioLogin").toggle();
    $("form#formularioCadastro").toggle();

    $("div#textoCadastro").toggle();
    $("div#textoLogin").toggle();
    $("form#formularioEsqueciSenha").hide();
});

//div form esqueciSenha
$("a#esqueciSenha").on("click", function(){
   
    $("form#formularioEsqueciSenha").toggle();
    $("form#formularioLogin").hide();

    $("div#textoLogin").show();
    $("div#textoCadastro").hide();
});
//div form textoLogin
$("div#textoLogin").on("click", function(){
 
    $("div#textoLogin").hide();
    $("form#formularioEsqueciSenha").hide();
    $("form#formularioCadastro").hide();
 });

//crie sua conta
$('#btnCadastrar').on("click", function(event){
    event.preventDefault();
   //variaveis id form
   var insertNome = $('form#formularioCadastro #nome').val();
   var insertEmail = $('form#formularioCadastro #email').val();
   var insertSenha = $('form#formularioCadastro #senha').val();
   var insertRole = $('form#formularioCadastro #roles').val();
   var insertToken = $('form#formularioCadastro #tokenn').val();
   var insertStatus = $('form#formularioCadastro #statuss').val();
   //empty - trim
   if(insertNome.trim() == "" || insertEmail.trim() == "" || insertSenha.trim() == "" || insertRole.trim() == ""){
       $("div#mensagem").show().addClass("red").html("Preencha todos os campos");
   }
   //ajax insert dados
   $.ajax({
       url: "./controllers/ControllerInsertDB.php",
       type: "POST",
       data: {
           nome:insertNome,
           email:insertEmail,
           senha:insertSenha,
           roles:insertRole,
           tokenn:insertToken,
           statuss:insertStatus
       },
      
   }).done (function (data){
       //data = JSON.parse(data);
       console.log(data);
       $('form').trigger('reset');
   });
});
