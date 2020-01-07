@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Sala de espera | Cadastrar
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
@stop

@section('conteudo')

<div class="page-title">
  <div class="title_left">
    <h3>Cadastrar Sala de espera</h3>
  </div>
</div>

<div class="clearfix"></div>

<!-- INICIO DA LINHA -->
<div class="row">
    
   <!-- INICIO DA COLUNA --> 
   <div class="col-xs-12">
    
        
      <div class="x_panel">
      
            
         <div class="x_content">
        
                
            <div class="row">
   
           <form action="<?php echo url('/evento/create'); ?>" method="post">

               @csrf

             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               
                     <!-- INICIO PANEL -->
                     <div class="panel panel-info"> 

                        <!-- INICIO DO PANEL-HEADER -->
                        <div class="panel-heading">
                           
                           <i class="fas fa-weight"></i> Sala de espera
                        </div>
                        <!-- FIM DO PANEL-HEADER -->

                        <!-- INICIO DO PANEL-BODY -->
                        <div class="panel-body">
                           
                           <!-- INICIO DA LINHA -->
                           <div class="row">
                               
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <!-- INICIO DA COLUNA -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert alert-danger" id="append_erro_x" style="display: none">

                                       <!-- Erro preenchido dinamicamento -->

                                   </div>
                                   <!-- FIM DA COLUNA -->
                               </div>   
                               
                               
                              <!-- INICIO DA COLUNA -->
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                 <div class="form-group">
                                     <label class="control-label">Nome <span class="required-red">*</span></label>
                                     <input type="text" class="form-control caixa_alta" name="nome_sala_espera" id="nome_sala_espera" placeholder="Nome da sala de espera"  value="909090"  autofocus="off" autocomplete="off" required="required">
                                 </div>

                              </div>
                              <!-- FIM DA COLUNA -->

                              <!-- INICIO DA COLUNA -->
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                 <div class="form-group">

                                     <label class="control-label">Local do evento <span class="required-red">*</span></label>

                                     <select class="form-control" name="btn_unidade" id="btn_unidade" required="required">

                                        <option value="1">
                                           RIO DE JANEIIRO
                                        </option>

                                       

                                     </select>

                                 </div>

                             </div>
                             <!-- FIM DA COLUNA -->



    <!-- INICIO DA COLUNA -->
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                 <div class="form-group">

                                     <label class="control-label"> Data ínicio <span class="required-red">*</span></label>
                                     
                                    <input type="date" class="form-control" name="data_inicio" id="horario_inicio" 
                                     placeholder="Data Ínicio"  value="1992-10-10"  autofocus="off" autocomplete="off" required="required">


                                 </div>

                             </div>
                             <!-- FIM DA COLUNA -->



    <!-- INICIO DA COLUNA -->
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                 <div class="form-group">

                                     <label class="control-label"> Horário inicio <span class="required-red">*</span></label>

                                     <input type="text" class="form-control tempo" name="horario_inicio" id="horario_inicio" 
                                     placeholder="Horario" value="10:00"  autofocus="off" autocomplete="off" required="required">

                                 </div>

                             </div>
                             <!-- FIM DA COLUNA -->


  <!-- INICIO DA COLUNA -->
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                 <div class="form-group">

                                     <label class="control-label"> Data fim <span class="required-red">*</span></label>
                                     
                                    <input type="date" class="form-control" name="data_fim" id="data_fim" 
                                     placeholder="Data Ínicio" value="1992-10-10"  autofocus="off" autocomplete="off" required="required">


                                 </div>

                             </div>
                             <!-- FIM DA COLUNA -->



    <!-- INICIO DA COLUNA -->
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                 <div class="form-group">

                                     <label class="control-label"> Horário fim <span class="required-red">*</span></label>

                                     <input type="text" class="form-control tempo" name="horario_fim" id="horario_fim" 
                                     placeholder="Horario"  value="10:00" autofocus="off" autocomplete="off" required="required">

                                 </div>

                             </div>
                             <!-- FIM DA COLUNA -->





                           </div>
                           <!-- FIM DA LINHA -->

                           <!-- INICIO DA LINHA -->
                           <div class="row">

                              <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='caixa_especialidades' style="display: none">

                                 <!-- Consultórios preenchido dinamicamente via javascript -->

                              </div>

                           </div>
                           <!-- INICIO DA LINHA -->

                        </div>    
                        <!-- FIM DO PANEL-BODY -->

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                           <br/><br/>

                           <button type="submit" class="btn btn-success pull-right" id="btn_salvar_sala_espera"><i class="far fa-save"></i> Salvar</button>

                           <a href="" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

                        </div>

                     </div>
                     <!-- FIM DO PANEL -->
</form>
               </div>    

            </div>
    
         </div>

      </div>

   </div>
   <!-- FIM DA COLUNA -->

</div>
<!-- FIM DA LINHA -->

@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>    
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{asset('plugins/toast-kamranahmed/jquery.toast.min.js')}}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.js') }}"></script>

<script type="text/javascript">
    
/*
 #  INICIO
 #  Definição de mascaras
 #  
*/
    
// Campo Tempo Médio
$('.tempo').timepicker({
    timeFormat: 'HH',
    interval: 60,
    minTime: '10',
    maxTime: '0pm',
    defaultTime: '0',
    startTime: '00:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true,
    showSeconds: false,
    showMeridian: false,
    minuteStep: 1
});   
    
/*
 # FIM
 # Definição de mascaras 
 # 
*/    
    

/* Está função foi comentada, pois a ideia de ter um totem na entrada foi descontinuada, caso queira reutiliza-lá é só descomentar
 # INICIO 
 # função para gerar as caixa com especialidades
 # 
*//*
function caixaComEspecialidades(array_cod_especialidade, array_nome_especialidade, total_especialidade) {
   
   // Inicializo as variaveis e garanto que estão vazias
   var caixa_especialidade = "";
   var i= ""; // contador
 
   // Limpo e escondo divs
   $("#caixa_especialidade").html("");
   $("#caixa_especialidade").hide();
  
   // Monto o HTML da caixa com as especialidades
   
   caixa_especialidade = "<hr/>";

   caixa_especialidade += "<div class='panel panel-default'>"; // Inicio da Panel
   
   caixa_especialidade += "<div class='panel-heading'>"; // Inicio do panel header
   caixa_especialidade += "Marque as especialidades";
   caixa_especialidade += "</div>"; // Fim do panel header
   
   caixa_especialidade += "<div class='panel-body'>"; // Inicio do panel body

   caixa_especialidade += "<div class='row'>"; // Inicio da linha
   caixa_especialidade += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='right'>"; // Inicio da coluna
   caixa_especialidade += "<a href='<?php //echo url('admin/painel/especialidades'); ?>' class='btn btn-info btn-md' id='btn_vincular_especialidades_rapido'>Vincular Especialidades</a>";
   caixa_especialidade += "<br/><br/>";
   caixa_especialidade += "</div>"; // Fim da coluna
   caixa_especialidade += "</div>"; // Fim da linha
   
   // Exibo as caixas de especialidades
   if(total_especialidade > 0){
       
        caixa_especialidade += "<div class='box_alerta_amarelo'>";
        caixa_especialidade += "<h5><i class='far fa-lightbulb'></i> Dica: Selecione a(s) especialidade(s) que pertece a sala espera.</h5>";
        caixa_especialidade += "</div>"

        caixa_especialidade += "<br/>";
       
        caixa_especialidade += "<div class='caixa_especialidade_pai'>";
        for(i = 0; i < total_especialidade; i++){
        caixa_especialidade +=  "<div class='col-lg-3 col-md-4 col-sm-12 col-xs-12' style='border:0.1em solid #d9edf7; padding: 10px 5px'>"; // Inicio da coluna
        caixa_especialidade +=  "<input type='checkbox' class='especialidade_vincular_a' name='especialidade_vincular_a' id='especialidade_vincular_a' value='"+ array_cod_especialidade[i] +"'> "+ array_nome_especialidade[i];
        caixa_especialidade +=  "</div>"; // Fim da coluna
        }
        caixa_especialidade += "</div>";
       
   } else { // Informo que a unidade não tem vículo com unidade
   
        caixa_especialidade += "<div class='box_alerta_amarelo'>";
        caixa_especialidade += "<h5><i class='fas fa-exclamation-triangle'></i> Aviso: A unidade não tem nenhum vínculo com especialidade.</h5>";
        caixa_especialidade += "</div>"

        caixa_especialidade += "<br/>"; 
       
   }
 
   caixa_especialidade += "</div>"; // Fim do panel body

   $("#caixa_especialidades").append(caixa_especialidade);
   $("#caixa_especialidades").show();
}
/*
 # FIM
 # função para gerar as caixa com especialidades
 # 
*/

/*
 # INICIO 
 # Função para desenhar caixa de médico dentro do modal cadastrar consultório rápido
 # 
*/
function caixaComMedico(cod_unidade_crypt){

   
   /*
    # Inicio 
    # Ajax para buscar todos os médicos vinculados a uma unidade
    #
   */
   $.ajax({
      cache: false,
      type: "POST",
      url: "<?php echo url('admin/painel/medicos/buscar-medicos-vinculados-unidade'); ?>",
      data: { 
          "cod_unidade_crypt": cod_unidade_crypt
      },
      beforeSend: function() { 

          

      },
      success: function(response) {

         // Convertendo resposta para objeto javascript
         var response = JSON.parse(response);

         //alert(response.status);

         // Checo retorno
         if (response.status == 'erro') {

            // Inicializo as variaveis e garanto que estão vazias
            var caixa_medico_vazio = "";
           
            // Limpo a div
             $("#append_caixa_medico").html("");

            caixa_medico_vazio =  "<div class='caixa_medico_dinamico'>";  
            caixa_medico_vazio += "<div class='row'>"; // Inicio da linha   
            caixa_medico_vazio += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>"; // Inicio da coluna
            caixa_medico_vazio += "<hr/>";
            caixa_medico_vazio += "</div>"; // Fim da coluna
            caixa_medico_vazio += "</div>"; // Inicio da linha
            
            caixa_medico_vazio += "<div class='row'>"; // Inicio da linha   
            caixa_medico_vazio += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>"; // Inicio da coluna
            caixa_medico_vazio += "<div class='alert alert-danger'>";
            caixa_medico_vazio += "<p>Está unidade não tem nenhum médico vinculado</p>";
            caixa_medico_vazio += "</div>";
            caixa_medico_vazio += "</div>"; // Fim da coluna
            caixa_medico_vazio += "</div>"; // Inicio da linha
            
            $("#append_caixa_medico").append(caixa_medico_vazio);
            $("#append_caixa_medico").show();

         } else if (response.status == 'sucesso') {

           
            // Inicializo as variaveis e garanto que estão vazias
            var caixa_medico = "";
           

            caixa_medico =  "<div class='caixa_medico_dinamico'>";  
            caixa_medico += "<div class='row'>"; // Inicio da linha   
            caixa_medico += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>"; // Inicio da coluna
            caixa_medico += "<hr/>";
            caixa_medico += "</div>"; // Fim da coluna
            caixa_medico += "</div>"; // Inicio da linha
            
            caixa_medico += "<div class='panel panel-default'>";
            caixa_medico += "<div class='panel-heading'><i class='fas fa-user-md'></i></div>";
            caixa_medico += "<div class='panel-body'>";
            caixa_medico += "<div class='row'>"; // Inicio da linha
            caixa_medico += "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>"; // Inicio coluna
            caixa_medico += "<div class='form-group'>";
            caixa_medico += "<label class='control-label'>Medico <span class='required-red'>*</span></label>";    
            caixa_medico += "<select class='form-control modal_cod_medico' name='modal_cod_medico' id='modal_cod_medico'>";
            caixa_medico += "<option value='0'>Selecione o médico</option>";        
            caixa_medico += response.options;        
            caixa_medico += "</select>";        
            caixa_medico += "</div>";            
            caixa_medico += "</div>"; // Fim da coluna           

            caixa_medico += "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>"; // Inicio coluna
            caixa_medico += "<div class='form-group'>";
            caixa_medico += "<label class='control-label'>Dia  <span class='required-red'>*</span></label>";     
            caixa_medico += "<select class='form-control modal_dia_semana' name='modal_dia_semana' id='modal_dia_semana' >";
            caixa_medico += "<option value='0'>Selecione</option>";
            caixa_medico += "<option value='1'>Domingo</option>";
            caixa_medico += "<option value='2'>Segunda</option>";
            caixa_medico += "<option value='3'>Terça</option>";
            caixa_medico += "<option value='4'>Quarta</option>";
            caixa_medico += "<option value='5'>Quinta</option>";
            caixa_medico += "<option value='6'>Sexta</option>";
            caixa_medico += "<option value='7'>Sábado</option>";
            caixa_medico += "</select>";
            caixa_medico += "</div>";
            caixa_medico += "</div>";

            caixa_medico += "</div>";

            caixa_medico += "<div class='row'> ";
            caixa_medico += "<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>";
            caixa_medico += "<div class='form-group'>";
            caixa_medico += "<label class='control-label'>Entrada <span class='required-red'>*</span></label>";
            caixa_medico += "<input type='text' class='form-control modal_entrada tempo' name='modal_entrada' id='modal_entrada' />";
            caixa_medico += "</div>";
            caixa_medico += "</div>";

            caixa_medico += "<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>";
            caixa_medico += "<div class='form-group'>";
            caixa_medico += "<label class='control-label'>Saída <span class='required-red'>*</span></label>";
            caixa_medico += "<input type='text' class='form-control modal_saida tempo' name='modal_saida' id='modal_saida' />";
            caixa_medico += "</div>";
            caixa_medico += "</div>";

            caixa_medico += "<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>";
            caixa_medico += "<div class='form-group'>";
            caixa_medico += "<label class='control-label'>&nbsp;</label>";
            caixa_medico += "<button class='btn btn-md btn-danger form-control btn_remover_medico'>Remover</button";
            caixa_medico += "</div>";
            caixa_medico += "</div>";
            caixa_medico += "</div>"; // Fecha div class='panel'
            caixa_medico += "</div>"; // Fecha div class='caixa_medico_dinamico'

            $("#append_caixa_medico").append(caixa_medico);
            $("#append_caixa_medico").show();


            /*
             # INICIO
             # Definição de mascaras 
             # 
            */  
            // Campo Tempo Médio
            $('.tempo').timepicker({
                timeFormat: 'HH',
                interval: 60,
                minTime: '10',
                maxTime: '0pm',
                defaultTime: '0',
                startTime: '00:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true,
                showSeconds: false,
                showMeridian: false,
                minuteStep: 1
            });   

            /*
             # FIM
             # Definição de mascaras 
             # 
            */  
           

         } // FIM DO SUCESSO

      }
      
   }); // FECHO AJAX  
   
   /*
    # FIM
    # Ajax para buscar todos os médicos vinculados a uma unidade
    # 
   */

   

}
/*
 # FIM 
 # Função para desenhar caixa de médico dentro do modal cadastrar consultório rápido
 # 
*/

/*
 # INICIO
 # função para limpar  caixa com especialidades
 # 
*/
function LimparCaixaComEspecialidades() {
   
   $("#caixa_especialidades").html("");
   $("#caixa_especialidades").hide();
   
}
/*
 # FIM
 # função para limpar caixa com especialidades
 # 
*/



/*
 # INICIO
 # Função chamada ao selecionar a unidade
 # Carrega todos os consultorios e especialidade de uma unidade
*/ 
$(document).on('change', '#btn_unidade', function(){
  
   // Inicializo as variaveis e garanto que estão vazias
   var nome_sala_espera = "";
   var btn_unidade = "";

   nome_sala_espera = $("#nome_sala_espera").val();
   cod_unidade_crypt = $("#btn_unidade").val();
   //alert(cod_unidade_crypt);
   
  
   if(cod_unidade_crypt == "0"){
    
      // Carrego a função para limpar as caixas de consultorios
      LimparCaixaComEspecialidades();
      
   } else {
      
        /*
         # INICIO
         # Buscar todas as especialidades que estejam vinculadas a uma unidade 
         #
        */
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/especialidades/buscar-especialidades-vinculadas-unidade'); ?>",
            data: { 
             "cod_unidade_crypt": cod_unidade_crypt,
            },
            beforeSend: function() { 

            var array_cod_especialidade= "";
            var array_nome_especialidade = "";
            var total_especialidades = ""; 

            },
            success: function(response) {

                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Limpa a caixa de especialidades
                    LimparCaixaComEspecialidades();
                    

                } else if (response.status == 'sucesso') {

                   array_cod_especialidade = response.array_cod_especialidade; 
                   array_nome_especialidade = response.array_nome_especialidade;  
                   total_especialidades = response.total_especialidades;  
                   
                   // Limpa a caixa de especialidades
                   LimparCaixaComEspecialidades();
                   
                   // carrego a funcao para desenha as caixas de especialidades
                   //caixaComEspecialidades(array_cod_especialidade, array_nome_especialidade, total_especialidades);

                }

            }

        }); // FECHO AJAX          
        /*
         # FIM
         # Buscar todas as especialidades que estejam vinculadas a uma unidade 
         #
        */
   }

  
   

});
/*
 # FIM
 # Função chamada ao selecionar a unidade
 # 
*/


/*
 # INICIO
 # FUNÇÃO PARA SALVAR SALA DE ESPERA
 #
*/
$(document).on('click', "#btn_salvar_sala_espera", function(){
  
    // Inicializo e garanto que as variaveis estão vazias
    var nome_sala_espera = "";
    var cod_unidade_crypt = "";
    var contem_erro = false;
    var msg_erro = "";

    
    // limpo e Escondo a div de erro
    $("#append_erro_x").html(""); 
    
    // Armazeno valores nas variaveis
    nome_sala_espera = $("#nome_sala_espera").val();
    cod_unidade_crypt = $("#btn_unidade").val();
   
    /*
      Inicio das validações 
    */
  
    if(nome_sala_espera == "" || nome_sala_espera == " "){
        msg_erro = "<b>Informe o nome da sala de espera</b><br/>";
        contem_erro = true;
    }

    if(cod_unidade_crypt == 0){
        msg_erro += "<b>Informe a unidade</b>";
        contem_erro = true;
    }

    if(contem_erro == true){
        
        // Exibo div de erro com msg de erro
        $("#append_erro_x").append("<h3>Alerta</h4>");
        $("#append_erro_x").append(msg_erro);
        $("#append_erro_x").show();
       
        // Subir a tela e mostrar o erro
        $('html, body').animate({scrollTop:0}, 'slow');
        
        return false;
        
    }else {
        
        // limpo variveis de error
        msg_erro = "";
        contem_erro = false;
        
        // Escondo variveis de erro
        $("#append_erro_x").html("");
        $("#append_erro_x").hide();
    }
    

    /*
     Fim das validações 
    */    
  
    
    // Requisição ajax
    $.ajax({
        cache: false,
        type: "POST",
        url: "<?php echo url('admin/painel/salasespera/cadastrar-sala-espera-ajax'); ?>",
        data: { 
            'nome_sala_espera': nome_sala_espera,
            'cod_unidade_crypt': cod_unidade_crypt,
            
        },
        beforeSend: function() { 

        },
        success: function(response) {

            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            
            // Checo retorno
            if (response.status == 'erro') {
                
                switch(response.msg){
                    
                    case 1:
                    
                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Error',
                            text: 'Ocorreu um falha na requisição, tente novamente!',
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            hideAfter: 2000, // em milisegundos
                            allowToastClose: true,
                            afterHidden: function() {
                                window.location.href = '{{url("admin/painel/salasespera")}}';
                            }
                        });
                        
                    break;
                    
                    case 2:
                        
                        // Exibo div de erro com msg de erro
                        $("#append_erro_x").append("<h3>Alerta</h4>");
                        $("#append_erro_x").append("O nome informado já possui cadastro!");
                        $("#append_erro_x").show();

                        // Subir a tela e mostrar o erro
                        $('html, body').animate({scrollTop:0}, 'slow');

                        return false;
                    
                    break;
                    
                }
                
                
            

            } else if (response.status == 'sucesso') {

                // Mostra mensagem de sucesso
                $.toast({
                    heading: 'Sucesso',
                    text: 'Sala de espera cadastrada com sucesso',
                    showHideTransition: 'fade',
                    icon: 'success',
                    position: 'top-right',
                    hideAfter: 1500, // em milisegundos
                    allowToastClose: true,
                    afterHidden: function() {
                        window.location.href = '{{url("admin/painel/salasespera")}}';
                    }
                });    
             
            }

        }

    }); // FECHO AJAX          

   
});
/*
 # FIM 
 # FUNÇÃO PARA SALVAR SALA DE ESPERA
 # 
*/

</script>
@stop
