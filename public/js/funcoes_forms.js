
/*                    *
 * CONFIGURA DE TOKEN *
 *                    */  
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/*                    *
 * CONFIGURA DE TOKEN *
 *                    */  

//exibe o ingresso no modal
function ExcluirIngresso(id_ingr){


 $.ajax({
      cache: false,
      type: "POST",
      url:  URL_INGRESSO_DELETE,
      data: { 
          "id_ticket": id_ingr
      },
      beforeSend: function() {
      },
      success: function(response) {

         //var resultado = JSON.parse(response);
            //var resultado = JSON.parse(response);
              if(response == "1"){
                alert("excluido com sucesso");
               location.reload();
              }
          } 
    });

 //console.log("editar.show");
  return false;
}

//exibe o ingresso no modal
function ExibirShowModal(id_ingr){

 $.ajax({
      cache: false,
      type: "POST",
      url:  URL_INGRESSO_SHOW,
      data: { 
          "cod_ingresso": id_ingr
      },
      beforeSend: function() {

      },
      success: function(response) {

         //var resultado = JSON.parse(response);
            var resultado = JSON.parse(response);

        if(resultado.status_requisicao == "sucesso"){
           
            $('#meuModal').modal('show');
              console.log(resultado.dados);
            var nome = $("#nome").val(resultado.dados[0].nome);
            var valor = $("#valor").val(resultado.dados[0].preco);
            var quantidade = $("#quantidade").val(resultado.dados[0].quantidade);
            //fim 
            var data_fim = $("#data_fim").val(resultado.dados[0].data_fim);
            var horario_fim = $("#horario_fim").val(resultado.dados[0].hora_fim);
           
            ///inicio troca selected
            var troca = resultado.dados[0].regra_inicio;

            //var iniciar_quando = $("#trocar_html option:selected").val(resultado.dados[0].regra_inicio);

                 console.log(troca);  
           if(troca == 'data'){

            $(".inicio-produto-html").css("display","none");
            $(".inicio-html").css("display","block");

             var data_inicio    = $("#data_inicio").val(resultado.dados[0].data_inicio);
             var horario_inicio = $("#horario_inicio").val(resultado.dados[0].hora_inicio);

            }else{

             htmlLoppingIngressos();
             $(".inicio-produto-html").css("display","block");
             $(".inicio-html").css("display","none");

            } 

            $(".bnt-controller").append('<button type="button" class="btn btn-primary" onclick="editarticket('+resultado.dados[0].cod_ingresso+')">Salvar Mudança</button>');
            $(".bnt_salvar_ticket").css("display","none");


          }else{

             alert("qmerda")

          }

       }

    });


 //onsole.log("editar.show");
  return false;
}


//editar o ingresso
function editarticket(id_ticket){

//////////////////
var nome = $("#nome").val();
var valor = $("#valor").val();
var quantidade = $("#quantidade").val();
//inicio 
var data_inicio = $("#data_inicio").val();
var horario_inicio = $("#horario_inicio").val();
//fim
var data_fim = $("#data_fim").val();
var horario_fim = $("#horario_fim").val();

var iniciar_quando = $("#trocar_html option:selected").val();

/////( --  -- )//////
console.log(horario_inicio.length);
console.log(data_inicio.length);
if(   nome.length < 0 || valor.length < 0 || quantidade.length < 0 ||  data_fim.length < 0  || horario_fim.length < 0  ){
      alert("Digite todas as informação necessária para criação do ingresso.")
      return false;
} 

if(iniciar_quando == 1){

 if(data_inicio.length < 0    || horario_inicio.length < 0 ){
   alert("Digite todas as informação necessária para criação do ingresso.")
     return false;
}

}



$.ajax({
        cache: false,
        type: "POST",
        url:  URL_INGRESSO_UPDATE,
        data: { 
            "nome": nome,
            "valor": valor,
            "quantidade": quantidade,
            "iniciar_quando": iniciar_quando,
            "data_inicio": data_inicio,
            "horario_inicio": horario_inicio,
            "data_fim": data_fim,
            "horario_fim": horario_fim,
            "cod_evento": ID_INGRESSO,
            "id_ticket": id_ticket,

        },
        beforeSend: function() {

        },
        success: function(response) {

          // var resultado = JSON.parse(response);
              if(response == true){
                   
                  alert("Ingresso cadastro com sucesso !");
                  $('#meuModal').modal('hide');
                  location.reload();


                }else{
                    
                     alert("Ops, Houve alguma problema ao cadastro o ingresso, por favor entre em contato com o suporte. !");


              }
         }

      });


  return false;
}


//cadastra o ingresso
function salvarTicket(){

//////////////////
var nome = $("#nome").val();
var valor = $("#valor").val();
var quantidade = $("#quantidade").val();
//inicio 
var data_inicio = $("#data_inicio").val();
var horario_inicio = $("#horario_inicio").val();
//fim
var data_fim = $("#data_fim").val();
var horario_fim = $("#horario_fim").val();

var iniciar_quando = $("#trocar_html option:selected").val();

////////////////

console.log(horario_inicio.length);
console.log(data_inicio.length);
if(   nome.length < 0 || valor.length < 0 || quantidade.length < 0 ||  data_fim.length < 0  || horario_fim.length < 0  ){
      alert("Digite todas as informação necessária para criação do ingresso.")
return false;
} 

if(iniciar_quando == 1){

 if(data_inicio.length < 0    || horario_inicio.length < 0 ){
   alert("Digite todas as informação necessária para criação do ingresso.")
     return false;
}

}
  
  $.ajax({
        cache: false,
        type: "POST",
        url:  URL_INGRESSO_CREATE,
        data: { 
            "nome": nome,
            "valor": valor,
            "quantidade": quantidade,
            "iniciar_quando": iniciar_quando,
            "data_inicio": data_inicio,
            "horario_inicio": horario_inicio,
            "data_fim": data_fim,
            "horario_fim": horario_fim,
            "cod_evento": ID_INGRESSO,

        },
        beforeSend: function() {

        },
        success: function(response) {

          // var resultado = JSON.parse(response);
              if(response == true){
                   
                     alert("Ingresso cadastro com sucesso !");
               
                }else{
                    
                     alert("Ops, Houve alguma problema ao cadastro o ingresso, por favor entre em contato com o suporte. !");


              }
         }

      });


return false;


}


function trocarhtml(){


 
 var troca = $("#trocar_html option:selected").val();

 
  if(troca == 1){
     
     $(".inicio-produto-html").css("display","none");
     $(".inicio-html").css("display","block");

  }else{
 
      htmlLoppingIngressos();
     $(".inicio-produto-html").css("display","block");
     $(".inicio-html").css("display","none");

  }

}

function htmlLoppingIngressos(){


$.ajax({
      cache: false,
      type: "POST",
      url:  URL_INGRESSO,
      data: { 
          "cod_ingresso": ID_INGRESSO
      },
      beforeSend: function() {

      },
      success: function(response) {
           $('#produtos_inicio').html("");

         var resultado = JSON.parse(response);
        if(resultado.status_requisicao == "sucesso"){
          $.each( resultado.dados, function( key, val ) {
            console.log(val.nome);
           $('#produtos_inicio').append('<option value="'+val.nome+'">'+val.nome+'<option>');
        });
        }
               
       }

    });

}



/** FORMULÁRIO  DE DETALHES **/



function salvar_detalhe(){


//////////////////
var titulo     = $("#nome").val();
var arquivo    = $("#valor").val();
var descricao  = $("#quantidade").val();

if(   titulo.length < 0 ){
      alert("Digite todas as informação necessária para criação do ingresso.")
      return false;
} 

  
  $.ajax({
        cache: false,
        type: "POST",
        url:  URL_INGRESSO_CREATE,
        data: { 
            "titulo": titulo,
            "arquivo": arquivo,
            "descricao": descricao,
            "cod_evento": ID_INGRESSO,

        },
        beforeSend: function() {

        },
        success: function(response) {

          // var resultado = JSON.parse(response);
              if(response == true){
                   
                     alert("Ingresso cadastro com sucesso !");
               
                }else{
                    
                     alert("Ops, Houve alguma problema ao cadastro o ingresso, por favor entre em contato com o suporte. !");


              }
         }

      });


  
  return false;
}


