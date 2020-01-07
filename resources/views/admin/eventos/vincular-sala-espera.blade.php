@extends('layouts.administracao.layout')

@inject('permissoes','drclub\models\Permissoes')

@section('titulo_pagina')
CMRJ | Sala de espera | Vincular
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
@stop

@section('conteudo')
{!! Breadcrumbs::render('sala-espera-cadastrar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Vincular sala de espera</h3>
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
                                     <label class="control-label">Consultório <span class="required-red">*</span></label>
                                     <input type="text" class="form-control caixa_alta" disabled="disabled" value="<?php echo $sala_espera->nome_sala_espera; ?>">
                                     <input type="hidden" class="cod_sala_espera" name="cod_sala_espera" id="cod_sala_espera" value="<?php echo $sala_espera->cod_sala_espera; ?>">
                                 </div>

                              </div>
                              <!-- FIM DA COLUNA -->

                              <!-- INICIO DA COLUNA -->
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                 <div class="form-group">

                                    <div class="form-group">
                                        <label class="control-label">Unidade<span class="required-red">*</span></label>
                                        <input type="text" class="form-control caixa_alta" disabled="disabled" value="<?php echo $sala_espera->nome_unidade; ?>">
                                        <input type="hidden" class="nome_unidade_oculta caixa_alta" name="nome_unidade_oculta" id="nome_unidade_oculta" value="<?php echo $sala_espera->nome_unidade; ?>">
                                        <input type="hidden" class="cod_unidade_crypt" name="cod_unidade_crypt" id="cod_unidade_crypt" value="<?php echo Crypt::encrypt($sala_espera->cod_unidade); ?>">
                                    </div>

                                 </div>

                             </div>
                             <!-- FIM DA COLUNA -->

                           </div>
                           <!-- FIM DA LINHA -->

                           <!-- INICIO DA LINHA -->
                           <div class="row">

                              <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='caixa_consultorios' style="display: none">

                                 <!-- Consultórios preenchido dinamicamente via javascript -->

                              </div>

                              <!-- Caso Queira carregar caixa as especialidade descomenta essa div 
                              <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='caixa_especialidades' style="display: none">

                                 <!-- Consultórios preenchido dinamicamente via javascript

                              </div>
                              -->
                              
                              
                           </div>
                           <!-- INICIO DA LINHA -->

                        </div>    
                        <!-- FIM DO PANEL-BODY -->

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                           <br/><br/>

                           <button type="submit" class="btn btn-success pull-right" id="btn_vincular_sala_espera"><i class="far fa-save"></i> Salvar</button>

                           <a href="{{ url('admin/painel/salasespera/') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

                        </div>

                     </div>
                     <!-- FIM DO PANEL -->

               </div>    

            </div>
    
         </div>

      </div>

   </div>
   <!-- FIM DA COLUNA -->

</div>
<!-- FIM DA LINHA -->

<!-- *****************
 #
 # INICIO MODAL CADASTRAR CONSULTÓRIO RÁPIDO
 # 
********************** -->
<div class=" modal fade" id="modal-cadastrar-consultorio-rapido" role="dialog"> 
   
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
		
            <!-- INICIO MODAL HEADER -->
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title"><strong>Cadastrar consultório rápido</strong></h2>
                    
            </div>
            <!-- FIM MODAL HEADER -->

            <!-- INICIO MODAL BODY -->
            <div class="modal-body">
              
                <!-- Inicio linha -->
                <div class="row">    

                    <!-- Coluna -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert alert-danger" id="append_erro_1" style="display: none;">
                       
                        </div>
                      
                    </div>
                  
                </div>  
                
                <!-- Inicio linha -->
                <div class="row">    

                  <!-- Coluna -->
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="form-group">

                       <label class="control-label">Nome <span class="required-red">*</span></label>
                       <input type="text" class="form-control" name='nome_consultorio' id='nome_consultorio' minlength="4" maxlength="50" required="required" placeholder="Nome do consultório"/>                        

                    </div>   

                  </div>
                  <!-- Fim da coluna -->
                  
                  <!-- Coluna -->
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="form-group">

                      <label class="control-label">Unidades <span class="required-red">*</span></label>
                      <input type="text" class="form-control" name='nome_unidade' id='nome_unidade' readonly="readonly"  value='NOME_DA_UNIDADE' />                        
                      
                    </div>  

                  </div>

                </div>
                <!-- Fim linha -->
                
                
                <!-- Inicio linha -->
                <div class="row">
                    
                    <!-- Coluna -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="alert alert-danger" id="div_erro_caixa_medico_dinamico" style="display:none">

                           <h4>Alerta</h4>

                       </div>

                    </div>
                    <!-- Fim coluna -->
                    
                </div>
                <!-- Fim linha -->
                
               
                <div id='mc_append_caixa_medico'>

                    <!-- Preenchendo dinamicamente via javascript -->

                </div>
                   
              
                 
              
               
                <!-- Inicio linha -->
                <div class="row">
                   
                    <!-- CASO TENHA QUE VOLTAR A ADICIONAR MÉDICOS EM UM CONSULTÓRIO, DESCOMENTAR ESSE BOTÃO 
                    
                   
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <input type="hidden"  name='cod_unidade' id='cod_unidade' value='COD_DA_UNIDADE' />
                       <button class="btn btn-md btn-info form-control" id="btn_adiconar_medico" value="1">Adicionar Médico</button>

                    </div>
                   
                    -->
                    
                </div>
               <!-- Fim linha-->

            </div>
            <!-- FIM MODAL BODY -->

            <!-- INICIO MODAL FOOTER -->
            <div class="modal-footer">

               <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Fechar</button>
               <button type="button" class="btn btn-md btn-success" id="btn_salvar_consultorio_rapido">Salvar</button>

            </div>
            <!-- FIM MODAL FOOTER -->

        </div> 
        
    </div>
    
</div>
<!-- *****************
 #
 # FIM MODAL CONSULTÓRIO RÁPIDO
 # 
********************** -->

<!-- *****************
 #
 # INICIO MODAL VINCULAR MÉDICO EM UM CONSULTÓRIO
 # 
********************** -->
<div class=" modal fade" id="modal-vincular-medico-consultorio" role="dialog"> 
   
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
		
            <!-- INICIO MODAL HEADER -->
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title"><strong>Víncular médico ao consultório</strong></h2>
                    
            </div>
            <!-- FIM MODAL HEADER -->

            <!-- INICIO MODAL BODY -->
            <div class="modal-body">
              
                <!-- Inicio linha -->
                <div class="row">    

                    <!-- Coluna -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert alert-danger" id="append_erro_1" style="display: none;">
                       
                        </div>
                      
                    </div>
                  
                </div>  
                
                <!-- Inicio linha -->
                <div class="row">    

                  <!-- Coluna -->
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="form-group">

                       <label class="control-label">Nome Consultório<span class="required-red">*</span></label>
                       <input type="text" class="form-control" disabled="disabled" name='nome_consultorio' id='nome_consultorio'/>                        
                       <input type="hidden" class="form-control" disabled="disabled" name='nome_consultorio' id='nome_consultorio'/>                        
                       <input type="hidden" class="form-control" disabled="disabled" name='cod_consultorio_crypt' id='cod_consultorio_crypt'/>                        

                    </div>   

                  </div>
                  <!-- Fim da coluna -->
                  
                  <!-- Coluna -->
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="form-group">

                      <label class="control-label">Unidades <span class="required-red">*</span></label>
                      <input type="text" class="form-control" name='nome_unidade' id='nome_unidade' readonly="readonly"  value='NOME_DA_UNIDADE' />                        
                     
                    </div>  

                  </div>

                </div>
                <!-- Fim linha -->
                
                
                <!-- Inicio linha -->
                <div class="row">
                    
                    <!-- Coluna -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="alert alert-danger" id="div_erro_caixa_medico_dinamico" style="display:none">

                           <h4>Alerta</h4>

                       </div>

                    </div>
                    <!-- Fim coluna -->
                    
                </div>
                <!-- Fim linha -->
                
               
                <div id='mv_append_caixa_medico'>

                    <!-- Preenchendo dinamicamente via javascript -->

                </div>
                   
              
                 
                <!-- Inicio linha -->
                <div class="row">  

                   <!-- Coluna -->
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                       <hr/>

                   </div>
                   <!-- Fim coluna -->
                </div>
                <!-- Fim linha
               
                <!-- Inicio linha -->
                <div class="row">
                   
                    <!-- Coluna -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden"  name='cod_unidade' id='cod_unidade' value='COD_DA_UNIDADE' />
                        <button class="btn btn-md btn-info form-control" id="btn_adiconar_medico" value="2">Adicionar Médico</button>
                    </div>
                    <!-- Fim coluna -->
                    
                </div>
               <!-- Fim linha-->

            </div>
            <!-- FIM MODAL BODY -->

            <!-- INICIO MODAL FOOTER -->
            <div class="modal-footer">

               <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Fechar</button>
               <button type="button" class="btn btn-md btn-success" id="btn_vincular_medico_consultorio">Salvar</button>

            </div>
            <!-- FIM MODAL FOOTER -->

        </div> 
        
    </div>
    
</div>
<!-- *****************
 #
 # FIM MODAL VINCULAR MÉDICO EM UM CONSULTÓRIO
 # 
********************** -->

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
    
/*
 # INICIO
 # função para desenhar as caixa com consultórios
 # 
*/
//function caixaComConsultorios(array_cod_consultorio, array_identificacao_consultorio, total_consultorios, consultorios_vinculados_crypt, total_consultorio_vinculado) {
function caixaComConsultorios(array_consultorios, total_consultorios) {

   // Inicializo as variaveis e garanto que estão vazias
   var caixa_consultorio = "";
   var i= ""; // contador
 
   // Limpo e escondo divs
   $("#caixa_consultorios").html("");
   $("#caixa_consultorios").hide();
  
   // Monto o HTML da caixa com os consultórios
   
   caixa_consultorio = "<hr/>";

   caixa_consultorio += "<div class='panel panel-default'>"; // Inicio da Panel
   
   caixa_consultorio += "<div class='panel-heading'>"; // Inicio do panel header
   caixa_consultorio += "Marque os consultórios da sala de espera";
   caixa_consultorio += "</div>"; // Fim do panel header
   
   caixa_consultorio += "<div class='panel-body'>"; // Inicio do panel body
   
   caixa_consultorio += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='right'>"; // Inicio da coluna
   caixa_consultorio += "<div class='row'>"; // Inicio da linha
   caixa_consultorio += "<button class='btn btn-info btn-md' id='btn_cadastrar_consultorio_rapido'>+ Cadastrar Consultório</button>";
   caixa_consultorio += "<br/><br/>";
   caixa_consultorio += "</div>"; // Fim da linha
   caixa_consultorio += "</div>"; // Fim da coluna
   
   
   caixa_consultorio += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 alert alert-danger' id='div_aviso' style='display:none;'>"; // Inicio da coluna
   caixa_consultorio += "<div class='row' id='msg_aviso' style='padding-left:5px;'>"; // Inicio da linha
   caixa_consultorio += "</div>"; // Fim da linha
   caixa_consultorio += "</div>"; // Fim da coluna

   // Exibo todos os consultórios que pertece a unidade
   if (total_consultorios > 0) {
       
        caixa_consultorio += "<div class='caixa_consultorio_pai'>";
        
        for (i = 0; i < total_consultorios; i++) {
            
            if (array_consultorios[i]['selecionado'] == true) {

                if (array_consultorios[i]['cod_sala_espera'] == $("#cod_sala_espera").val()) {

                    caixa_consultorio += "<div class='col-lg-3 col-md-4 col-sm-12 col-xs-12' style='border:0.1em solid #d9edf7; padding: 10px 5px'>"; // Inicio da coluna
                    
                    caixa_consultorio += "<input type='checkbox' checked='checked' class='consultorio_vincular_a' name='consultorio_vincular_a' id='consultorio_vincular_a' value='" + array_consultorios[i]['dados']['cod_consultorio'] + "'>";
                    caixa_consultorio += "<span>" + array_consultorios[i]['dados']['identificacao'] + "</span>";
                      
                    caixa_consultorio += "</div>"; // Fim da coluna

                } 

            } else {

                caixa_consultorio += "<div class='col-lg-3 col-md-4 col-sm-12 col-xs-12' style='border:0.1em solid #d9edf7; padding: 10px 5px'>"; // Inicio da coluna
                
                caixa_consultorio += "<input type='checkbox' class='consultorio_vincular_a' name='consultorio_vincular_a' id='consultorio_vincular_a' value='" + array_consultorios[i]['dados']['cod_consultorio'] + "'>";
                caixa_consultorio += "<span>" + array_consultorios[i]['dados']['identificacao'] + "</span>";
                  
                caixa_consultorio += "</div>"; // Fim da coluna

            }
        
        }
        
        caixa_consultorio += "</div>";

   } else { // Informo que a unidade não tem nenhum consultório cadastrado
        
        caixa_consultorio += "<div class='caixa_consultorio_pai'>";
       
        caixa_consultorio +=  "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 box_alerta_amarelo'><h5><i class='fas fa-exclamation-triangle'></i> Aviso:  A unidade não tem nenhum consultório cadastrado.</h5></div>";
        caixa_consultorio +=  "</div>"; // Fim da coluna
       
        caixa_consultorio += "</div>";
        
   }
   
   caixa_consultorio += "</div>"; // Fim do panel body
   
   $("#caixa_consultorios").append(caixa_consultorio);
   $("#caixa_consultorios").show();
   
};
/*
 # FIM
 # função para desenhar as caixa com consultórios
 # 
*/



/*
 # INICIO
 # função para gerar as caixa com especialidades
 # 
*/
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
   caixa_especialidade += "<a href='<?php echo url('admin/painel/especialidades'); ?>' class='btn btn-info btn-md' id='btn_vincular_especialidades_rapido'>Vincular Especialidades</a>";
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
function caixaComMedico(cod_unidade_crypt, qual_modal){
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
             $("#mc_append_caixa_medico").html("");

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
            
            $("#mc_append_caixa_medico").append(caixa_medico_vazio);
            $("#mc_append_caixa_medico").show();

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

            
            switch(qual_modal){
            
                case "1": // Append no modal cadastrar 
                   
                    $("#mc_append_caixa_medico").append(caixa_medico);
                    $("#mc_append_caixa_medico").show();
                    
                break; 
                
                case "2": // Append no modal vincular
                    $("#mv_append_caixa_medico").append(caixa_medico);
                    $("#mv_append_caixa_medico").show();
                break;
                
                case "3": // Append no modal desvincular
                    
                break;
            
            }
                
               
                
            

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
 # função para limpar a caixa com consultórios
 # 
*/
function LimparCaixaComConsultorios() {
   
   $("#caixa_consultorios").html("");
   $("#caixa_consultorios").hide();
   
}
/*
 # FIM
 # função para limpar caixa com consultórios
 # 
*/

/*
 # INICIO
 # Chamada para carrega todos os consultorios e especialidade de uma unidade
*/ 

   // Inicializo as variaveis e garanto que estão vazias
   var nome_sala_espera = "";
   var btn_unidade = "";

   nome_sala_espera = $("#nome_sala_espera").val();
   cod_unidade_crypt = $("#cod_unidade_crypt").val();
   cod_sala_espera = $("#cod_sala_espera").val()
 
   if(cod_unidade_crypt == "0"){
      
      // Carrego a função para limpar as caixas de consultorios
      LimparCaixaComConsultorios();
      
      // Carrego a função para limpar as caixas de consultorios
      LimparCaixaComEspecialidades();
      
   } else {
      
        /*
         # Inicio
         # Buscar todos os consultório que pertece a uma unidade e checo quais tem vinculos com unidades
         # 
        */
       
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/consultorios/buscar-consultorios-unidade'); ?>",
            data: { 
                "cod_unidade_crypt": cod_unidade_crypt,
                "cod_sala_espera": cod_sala_espera,
            },
            beforeSend: function() { 
                var array_consultorios = "";
                var total_consultorios = ""; 
            },
            success: function(response) {

                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
               
                // Checo retorno
                if (response.status == 'erro') {
                    
                    array_consultorios = "";
                    total_consultorios = 0;

                    // Mesmo não encontrando nenhum consulório carrego a caixa de cosultório para que   
                    // seja carregado o botão cadastrar consultório rápido
                    //caixaComConsultorios(array_cod_consultorio, array_identificacao_consultorio, total_consultorios, consultorios_vinculados_crypt, total_consultorio_vinculado);
                    caixaComConsultorios(array_consultorios, total_consultorios);

                } else if (response.status == 'sucesso') {

                   array_consultorios = response.array_consultorios;  
                   total_consultorios = response.total_array_consultorios;
                  
                   // Carrego a função para limpar as caixas de consultorios
                   LimparCaixaComConsultorios();
                   // Carrego a função para desenhar as caixas de consultorios
                   //caixaComConsultorios(array_cod_consultorio, array_identificacao_consultorio, total_consultorios, consultorios_vinculados_crypt, total_consultorio_vinculado);
                   caixaComConsultorios(array_consultorios, total_consultorios);

                }

            }

        }); // FECHO AJAX
      
        /*
         # FIM
         # Buscar todos os consultório que pertece a uma unidade e que não tenha sido 
         # vinculado com uma sala de espera
        */
       
        
        /*
         # INICIO
         # Buscar todas as especialidades que estejam vinculadas a uma unidade 
         #
        */
        // Requisição ajax
       /* $.ajax({
            cache: false,
            type: "POST",
            url: "<?php //echo url('admin/painel/especialidades/buscar-especialidades-vinculadas-unidade'); ?>",
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
                   caixaComEspecialidades(array_cod_especialidade, array_nome_especialidade, total_especialidades);

                }

            }

        }); // FECHO AJAX          
        /*
         # FIM
         # Buscar todas as especialidades que estejam vinculadas a uma unidade 
         #
        */
   }

/*
 # FIM
 # Chamada para carrega todos os consultorios e especialidade de uma unidade
 # 
*/


/*
 # INICIO
 # FUNÇÃO PARA CHAMAR O MODAL CADASTRAR CONSULTORIO RAPIDO
 #
*/

$(document).on('click', "#btn_cadastrar_consultorio_rapido", function(){
   
   $(".caixa_medico_dinamico").html("");
   $("#div_erro_caixa_medico_dinamico").html("");
   $("#div_erro_caixa_medico_dinamico").hide();
   
   // Inicializo as variaveis e garanto que estão vazias
   var cod_unidade = "";
   var nome_unidade = "";
   var tipo_consultorio = "";

   // Limpo todos os inputs
   $("#nome_unidade").val("");
   $("#cod_unidade").val("");
   $("#nome_consultorio").val("");
   $("#tipo_consultorio").val(0);
   
   // Escondo o modal cadastrar cosnultorio rapido
   $("#modal-cadastrar-consultorio-rapido").modal('hide');
   
   // Limpo e escondo possiveis msg e div de erros no modal
      
   $('#append_erro_1').html("");
   $('#append_erro_1').hide();
       
   var cod_unidade = $('#cod_unidade_crypt').val(); // pego o codigo da unidadde
   var nome_unidade = $('#nome_unidade_oculta').val(); // pego o nome da unidade

   // Coloco os valores no input do modal cadastrar consultorio rapido
   $("#nome_unidade").val(nome_unidade);
   $("#cod_unidade").val(cod_unidade);

   $("#modal-cadastrar-consultorio-rapido").modal('show');
   
});
/*
 # FIM 
 # FUNÇÃO PARA CHAMAR O MODAL CADASTRAR CONSULTORIO RÁPIDO
 # 
*/

/*
 # INICIO 
 # FUNÇÃO PARA SALVAR CONSULTÓRIO RÁPIDO
 #
*/
$(document).on('click', '#btn_salvar_consultorio_rapido', function(){
 
  
 
    // Inicializo e garanto que as variaveis estão vazias
    var nome_consultorio = "";
    var cod_unidade = "";
  
    var salvar_etapa_2 = false; // Está variavel irá receber true se exitir algum médico com dia e horário de entrada e saida  
    var tem_caixa_medico_dinamico = 0;
    var array_modal_cod_medico = new Array();
    var array_modal_dia_semana = new Array();
    var array_modal_entrada = new Array(); // Hora Entrada
    var array_modal_saida = new Array(); // Hora Saida
    var arry_todos = new Array(); // array para guardar [cod_medico, dia, horario_entrada, horario]
    var obj_filho = {}; // Objeto para guardar [cod_medico, dia, horario_entrada, horario]

    // Msg para controle de validação
    var contem_erro_1 = false;
    var contem_erro_2 = false;
    var msg_erro_1 = "";
    var msg_erro_medico_2 = "";
    var msg_erro_dia_2 = "";
    var msg_erro_emtrada_2 = "";
    var msg_erro_saida_2 = "";
   
      
    // Escondo e limpo as divs / variaveis de validações
    $('.append_erro').html("");
    $('.append_erro').hide();
   

    // Recebo os variveis
    nome_consultorio = $("#nome_consultorio").val();
    cod_unidade_crypt = $("#cod_unidade").val();


    /*
     # Inicio  
     # Validação
     # 
    */

    if(nome_consultorio.length == 0){
       msg_erro_1 = "Informe o nome do consultório";
       contem_erro_1 = true;
   }
    
    if(cod_unidade_crypt.length == 0){
        msg_erro_1 = "Ocorreu um erro na requição, Atualize a página"; 
        contem_erro_1 = true;
    }
    
    if(contem_erro_1 == true){
        $("#append_erro_1").html("");
        $("#append_erro_1").append("<h4>Alerta</h4>");
        $("#append_erro_1").append(msg_erro_1);
        $("#append_erro_1").show();
        return false;
    } else {
        contem_erro_1 = false;
        $("#append_erro_1").html("");
        $("#append_erro_1").hide();
    }
    
    // Verifico se tem class caixa_medico_dinamico dentro do ID append_caixa_medico
    tem_caixa_medico_dinamico = document.getElementById('mc_append_caixa_medico').getElementsByClassName('caixa_medico_dinamico');
    
   
    if(tem_caixa_medico_dinamico.length > 0 ) {
    
        salvar_etapa_2 = true; // Existe algum médico com dia e horário de entrada e saida  
        msg_erro_medico_2 = ""; // limpo variavel
        msg_erro_dia_2 = ""; // limpo variavel
        msg_erro_entrada_2 = ""; // limpo variavel
        msg_erro_saida_2 = ""; // limpo variavel
        
        
        // Loop por todos os medicos
        $('.caixa_medico_dinamico select.modal_cod_medico').each(function(){

            // Verifico se tem medico vazio
            
            if($(this).val() == 0){

               contem_erro_2 = true;
               msg_erro_medico_2 = "<p>Informe o médico</p>";

            }

           array_modal_cod_medico.push($(this).val());
        });

        // Loop por todos os dias da semana
        $('.caixa_medico_dinamico select.modal_dia_semana').each(function(){

            // Verifico se tem dia da semana vazio
            
            if($(this).val() == 0){

               contem_erro_2 = true;
               msg_erro_dia_2 = "<p>Informe o dia</p>";

            }

            array_modal_dia_semana.push($(this).val());
        });

        // Loop por todos os horarios de entrada
        $('.caixa_medico_dinamico input.modal_entrada').each(function(){

            // Verifico se tem horario entrada  vazio
            
            if($(this).val() == "0:00" || $(this).val() == ""){

               contem_erro_2 = true;
               msg_erro_entrada_2 = "<p>Informe o horário de entrada</p>";
            }

            array_modal_entrada.push($(this).val());
        });

        // Loop por todos os horarios de saida
        $('.caixa_medico_dinamico input.modal_saida').each(function(){

            // Verifico se tem horario saida  vazio
           
            if($(this).val() == "0:00" || $(this).val() == ""){

               contem_erro_2 = true;
               msg_erro_saida_2 = "<p>Informe o horário de saída</p>";

            }

            array_modal_saida.push($(this).val());
        });


        if(contem_erro_2){
            
            $('#div_erro_caixa_medico_dinamico').html('');
            
            $('#div_erro_caixa_medico_dinamico').append("<h4>Alerta</h4>");
            $('#div_erro_caixa_medico_dinamico').append(msg_erro_medico_2);
            $('#div_erro_caixa_medico_dinamico').append(msg_erro_dia_2);
            $('#div_erro_caixa_medico_dinamico').append(msg_erro_entrada_2);
            $('#div_erro_caixa_medico_dinamico').append(msg_erro_saida_2);
            $('#div_erro_caixa_medico_dinamico').show();
            
            // Subir a tela e mostrar o erro
            //$('#modal-cadastrar-consultorio-rapido').animate({scrollTop:0}, 'slow');
            
            return false;
            
        }
        
        /*
         # Fim
         # Validação
         # 
        */

    } else {
    
        salvar_etapa_2 = false;
        contem_erro_2 = "";
    }
   
   
    if(contem_erro_1 == false && contem_erro_2 == false){
        
        if(salvar_etapa_2 == true){ // Salvar consultório com o/os respectivo(s) médico(s) (com dia e horário de entrada e saída)
        
          
            // Loop por todas as caixas de medicos dinamico
            $('.caixa_medico_dinamico').each(function(){
                
                obj_filho['cod_medico_crypt'] = $('#modal_cod_medico', this).val();
                obj_filho['dia_semana'] = $('#modal_dia_semana', this).val();
                obj_filho['entrada'] = $('#modal_entrada', this).val();
                obj_filho['saida'] = $('#modal_saida', this).val();
                
                // Coloco obj temporário obj_filho no final do array $arr_todos
                arry_todos.push(obj_filho);
                
                // Limpo o obj_filho
                obj_filho = {};
             
            });
            
           
            // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: "<?php echo url('admin/painel/consultorios/cadastrar-consultorio-unidade-rapido'); ?>",
                data: { 
                 "cod_unidade_crypt": cod_unidade_crypt,
                 "nome_consultorio": nome_consultorio,
                 "array_pai_horario_consultorio":arry_todos,
                 "flag_horario_consultorio": 1 // Cadastrar consultorios e o(s) medico(s) com seus respectivo(s) dia(s) e horario(s)
                },
                beforeSend: function() { 

                

                },
                success: function(response) {

                    // Convertendo resposta para objeto javascript
                    var response = JSON.parse(response);

                    // Checo retorno
                    if (response.status == 'erro') {

                       switch(response.case){
                            
                            case 1:
                                
                                // Mostra mensagem de erro
                                $.toast({
                                    heading: 'Erro!',
                                    text: response.msg,
                                    showHideTransition: 'fade',
                                    icon: 'error',
                                    position: 'top-right',
                                    hideAfter: 1500, // em milisegundos
                                    allowToastClose: true,
                                    afterHidden: function() {

                                      window.location.replace("<?php  echo url("admin/painel/salasespera/cadastrar-sala-espera"); ?>");

                                    }   
                                });
                                
                            break;
                            
                            case 2: // O nome do consultório já está cadastrado para unidade informada 
                               
                                $("#append_erro_1").append("<h4>Alerta</h4>");
                                $("#append_erro_1").append("O consultório já está cadastrado para unidade informada!");
                                $("#append_erro_1").show("");
                                
                                // Subir a tela e mostrar o erro
                                //$('#modal-cadastrar-consultorio-rapido').animate({scrollTop:0}, 'slow');
                              
                            break;
                            
                          
                        }
                       

                    } else if (response.status == 'sucesso') {
                        
                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Sucesso!',
                            text: response.msg,
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: 1500, // em milisegundos
                            allowToastClose: true,
                            afterHidden: function() {

                                // Fecho o modal
                                $("#modal-cadastrar-consultorio-rapido").modal('hide');
                                $(".box_alerta_amarelo").hide();
                                
                                // Limpo div e removo div
                                $("#mc_append_caixa_medico").html(""); 
                                $(".caixa_medico_dinamico").remove();
                             
                            }   
                        });  
                        
                       
                        // Append do consultorio criado rápido na caixa append_caixa_consultorios                                                              
                        consultorio_dinamic = "<div class='col-lg-3 col-md-4 col-sm-12 col-xs-12' style='background:#d9edf7; border:0.1em solid #d9edf7; padding: 10px 5px'><input type='checkbox' class='consultorio_vincular_a' name='consultorio_vincular_a' id='consultorio_vincular_a' value='"+ response.cod_consultorio+ "'> <span>"+ response.nome_consultorio+"</span></div>";
                        $(".caixa_consultorio_pai").append($(consultorio_dinamic).hide().fadeIn(800));
                        $("#caixa_consultorio_pai").focus();

                    }

                }

            }); // FECHO AJAX
        
        } else { //Salvar somente consultório 
          
            // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: "<?php echo url('admin/painel/consultorios/cadastrar-consultorio-unidade-rapido'); ?>",
                data: { 
                 "cod_unidade_crypt": cod_unidade_crypt,
                 "nome_consultorio": nome_consultorio,
                 "flag_horario_consultorio": 0 // Cadastrar somente o consultório
                },
                beforeSend: function() { 

                

                },
                success: function(response) {

                    // Convertendo resposta para objeto javascript
                    var response = JSON.parse(response);

                    // Checo retorno
                    if (response.status == 'erro') {
                        
                        
                        switch(response.case){
                            
                            case 1:
                                
                                // Mostra mensagem de erro
                                $.toast({
                                    heading: 'Erro!',
                                    text: response.msg,
                                    showHideTransition: 'fade',
                                    icon: 'error',
                                    position: 'top-right',
                                    hideAfter: 1500, // em milisegundos
                                    allowToastClose: true,
                                    afterHidden: function() {

                                      window.location.replace("<?php  echo url("admin/painel/salasespera/cadastrar-sala-espera"); ?>");

                                    }   
                                });
                                
                            break;
                            
                            case 2: // O nome do consultório já está cadastrado para unidade informada 
                               
                                $("#append_erro_1").append("<h4>Alerta</h4>");
                                $("#append_erro_1").append("O nome do consultório já está cadastrado para unidade informada!");
                                $("#append_erro_1").show();
                                
                                // Subir a tela e mostrar o erro
                                //$('html, body').animate({scrollTop:0}, 'slow');
                                //$('body,html').animate({scrollTop: 0}, 800);

                                
                            break;
                          
                        }
                        
                       

                    } else if (response.status == 'sucesso') {
                        
                        // Append do consultorio criado rápido na caixa append_caixa_consultorios 
                        consultorio_dinamic = "<div class='col-lg-3 col-md-4 col-sm-12 col-xs-12' style='background:#d9edf7; border:0.1em solid #d9edf7; padding: 10px 5px'><input type='checkbox' class='consultorio_vincular_a' name='consultorio_vincular_a' name='consultorio_vincular_a' id='consultorio_vincular_a' value='"+ response.cod_consultorio+ "'> <span>"+ response.nome_consultorio+"</span></div>";
                        $(".caixa_consultorio_pai").append($(consultorio_dinamic).hide().fadeIn(800));
                        $("#caixa_consultorio_pai").focus();
                        
                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Sucesso!',
                            text: response.msg,
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: 1500, // em milisegundos
                            allowToastClose: true,
                            afterHidden: function() {

                                // Fecho o modal
                                $("#modal-cadastrar-consultorio-rapido").modal('hide');
                                $(".box_alerta_amarelo").hide();
                             
                            }   
                        });  
                     

                    }

                }

            }); // FECHO AJAX
            
            
        
        }
        
    }
   
})

/*
 # FIM
 # FUNÇÃO PARA SALVAR CONSULTÓRIO RÁPIDO
 #
*/


/*
 # INICIO 
 # FUNÇÃO SOMENTE PARA VINCULAR MEDICO AO CONSULTÓRIO JÁ CADASTRADO
 #
*/
$(document).on('click', '#btn_vincular_medico_consultorio', function(){
 
    // Inicializo e garanto que as variaveis estão vazias
    var nome_consultorio = "";
    var cod_unidade = "";
    var cod_consultorio = "";
    var msg_erro = "";
    var contem_erro = false;
     
    var array_modal_cod_medico = new Array();
    var array_modal_dia_semana = new Array();
    var array_modal_entrada = new Array(); // Hora Entrada
    var array_modal_saida = new Array(); // Hora Saida
    var arry_todos = new Array(); // array para guardar [cod_medico, dia, horario_entrada, horario]
    var obj_filho = {}; // Objeto para guardar [cod_medico, dia, horario_entrada, horario]

    // Recebo os variveis
    nome_consultorio = $("#modal-vincular-medico-consultorio #nome_consultorio").val();
    cod_consultorio_crypt = $("#modal-vincular-medico-consultorio #cod_consultorio_crypt").val();
    cod_unidade_crypt = $("#modal-vincular-medico-consultorio #cod_unidade").val();

     // Loop por todas as caixas de medicos dinamico
    $('.caixa_medico_dinamico').each(function(){

        obj_filho['cod_medico_crypt'] = $('#modal_cod_medico', this).val();
        obj_filho['dia_semana'] = $('#modal_dia_semana', this).val();
        obj_filho['entrada'] = $('#modal_entrada', this).val();
        obj_filho['saida'] = $('#modal_saida', this).val();

        // Coloco obj temporário obj_filho no final do array $arr_todos
        arry_todos.push(obj_filho);

        // Limpo o obj_filho
        obj_filho = {};

    });
   
    /*
     # Inicio  
     # Validação
     # 
    */

    if(cod_consultorio_crypt == "" || cod_consultorio_crypt == " " || cod_consultorio_crypt.length == 0){
        
       msg_erro += "Informe o consultório é obrigatório<br/>";
       contem_erro = true;
       
    }
    
    if(nome_consultorio == "" || nome_consultorio == " " || nome_consultorio.length == 0){
        
       msg_erro += "Nome do consultório é obrigatório<br/>";
       contem_erro = true;
       
    }
    
    if(cod_unidade_crypt == "" || cod_unidade_crypt == " " || cod_unidade_crypt.length == 0){
        
       msg_erro += "Informe a unidade<br/>";
       contem_erro = true;
    }
    
    if(arry_todos.length == 0){
        
       msg_erro += "Nenhum médico foi vinculado ao consultório <br/>";
       contem_erro = true;
    }
        
    /*
     # Fim
     # Validação
     # 
    */

    
    if(contem_erro == true) {
        
        alert(msg_erro);
        return false;
        
    }     
   
    // Requisição ajax
    $.ajax({
        cache: false,
        type: "POST",
        url: "<?php echo url('admin/painel/consultorios/vincular-medico-consultorio-unidade'); ?>",
        data: { 
         "cod_unidade_crypt": cod_unidade_crypt,
         "cod_consultorio_crypt": cod_consultorio_crypt,
         "array_pai_horario_consultorio":arry_todos,
        },
        beforeSend: function() { 



        },
        success: function(response) {

            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Checo retorno
            if (response.status == 'erro') {

               


            } else if (response.status == 'sucesso') {

                // Mostra mensagem de sucesso
                $.toast({
                    heading: 'Sucesso!',
                    text: response.msg,
                    showHideTransition: 'fade',
                    icon: 'success',
                    position: 'top-right',
                    hideAfter: 1500, // em milisegundos
                    allowToastClose: true,
                    afterHidden: function() {

                        // Fecho o modal
                        $("#modal-vincular-medico-consultorio").modal('hide');

                        // Limpo div e removo div
                        $("#mv_append_caixa_medico").html(""); 
                        $("#mv_append_caixa_medico .caixa_medico_dinamico").remove();

                    }   
                });  

            }

        }

    }); // FECHO AJAX
    

   
})

/*
 # FIM
 # FUNÇÃO SOMENTE PARA VINCULAR MEDICO AO CONSULTÓRIO JÁ CADASTRADO
 #
*/


/* ESSA FUNÇÃO FOI COMENTADA PQ A OPÇÃO DE ADCIONAR MEDICO NO CONSULTORIO PASSOU PARA AGENDA DO MÉDICO
* CASO QUEIRA VOLTAR TER ESSA OPÇÃO DESCOMENTA ESSA FUNÇÃO E O BOTÃO btn_adiconar_medico QUE ESTÁ NO html
 # INICIO
 # FUNÇÃO PARA CHAMAR O MODAL ADICIONAR MEDICO CONSULTORIO
 # Essa função é caso o usuario queira adiconar medicos em um consultório já cadastrado
*/

/*
$(document).on('click', "#consultorio_vincular_a", function(){
    
    var consultorio_vincular_a = $(this).val();
    var nome_consultorio = $(this).closest('div').find('span').text();
   
    if( $(this).is(":checked") == true ){ // Abro modal para adicionar médicos
       
        $(".caixa_medico_dinamico").html("");
        $("#div_erro_caixa_medico_dinamico").html("");
        $("#div_erro_caixa_medico_dinamico").hide();

        // Inicializo as variaveis e garanto que estão vazias
        var cod_unidade = "";
        var nome_unidade = "";
        var cod_consultorio = "";
        //var tipo_consultorio = "";

        // Limpo todos os inputs
        $("#nome_unidade").val("");
        $("#cod_unidade").val("");
        $("#nome_consultorio").val("");
        $("#cod_consultorio").val("");
        //$("#tipo_consultorio").val(0);

        // Escondo o modal cadastrar cosnultorio rapido
        $("#modal-vincular-medico-consultorio").modal('hide');

        // Limpo e escondo possiveis msg e div de erros no modal

        $('#append_erro_1').html("");
        $('#append_erro_1').hide();

        cod_unidade = $('#cod_unidade_crypt').val(); // pego o codigo da unidadde
        nome_unidade = $('#nome_unidade_oculta').val(); // pego o nome da unidade
        

        // Coloco os valores no input do modal cadastrar consultorio rapido
        $("#modal-vincular-medico-consultorio #nome_unidade").val(nome_unidade);
        $("#modal-vincular-medico-consultorio #cod_unidade").val(cod_unidade);
        $("#modal-vincular-medico-consultorio #nome_consultorio").val(nome_consultorio);
        $("#modal-vincular-medico-consultorio #cod_consultorio_crypt").val(consultorio_vincular_a);

        $("#modal-vincular-medico-consultorio").modal('show');
       
    } else { // Abro modal para desvincular médico ou inativar consultório
        
        alert("modal para desvincular médico ou inativar");
        
    }
 
   
   
});
/*
 # FIM 
 # FUNÇÃO DO MODAL ADICONAR CONSULTORIO RÁPIDO
 # 
*/


/*
 # INICIO
 # FUNÇÃO PARA ADICIONAR MEDICO CONSULTÓRIO
 #
*/

$(document).on('click', '#btn_adiconar_medico', function(){
  
  
   var cod_unidade_crypt = $(this).closest("div").find("input#cod_unidade").val();
   var qual_modal = $(this).val() // Variavel para saber qual modal está solicitando add de médico {1: Modal cadastrar; 2: Modal vincular; 3: Modal esvicular}

    
   // Chama a função para desenhar a caixa de médico
   caixaComMedico(cod_unidade_crypt, qual_modal);
   
});

/*
 # FIM
 # FUNÇÃO PARA ADICIONAR MEDICO NO MODAL CADASTAR CONSULTÓRIO RÁPIDO
 #
*/

/*
 # INICIO
 # FUNÇÃO PARA REMOVER MEDICO NO MODAL CADASTAR CONSULTÓRIO RÁPIDO
 #
*/

$(document).on('click', '.btn_remover_medico', function(){
   
   $(this).closest('div.caixa_medico_dinamico').remove();
   
});

/*
 # FIM
 # FUNÇÃO PARA REMOVER MEDICO NO MODAL CADASTAR CONSULTÓRIO RÁPIDO
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
    var array_cod_consultorio_crypt = new Array();
    var tem_caixa_medico_dinamico = 0;
    var array_cod_especialidade_crypt = new Array();
    var tem_caixa_especialidade = 0;
    var contem_erro = false;
    var msg_erro = "";

    
    // limpo e Escondo a div de erro
    $("#append_erro_x").html(""); 
    
    // Armazeno valores nas variaveis
    nome_sala_espera = $("#nome_sala_espera").val();
    cod_unidade_crypt = $("#btn_unidade").val();
    
   
    // Verifico se tem class caixa_medico_dinamico dentro do ID mc_append_caixa_medico
    tem_caixa_medico_dinamico = document.getElementById('caixa_consultorios').getElementsByClassName('consultorio_vincular_a');
    
    // Verifico se tem class caixa_medico_dinamico dentro do ID mc_append_caixa_medico
    tem_caixa_especialidade = document.getElementById('caixa_especialidades').getElementsByClassName('especialidade_vincular_a');
    
    if(tem_caixa_medico_dinamico.length > 0 ) {

        // Loop por todos os consultórios
        $('.caixa_consultorio_pai input.consultorio_vincular_a').each(function(){

           // Verifico se o checkbox está setado 
           if($(this).is(":checked") == true){

               // Armazeno o codigo dos consultórios setado
               array_cod_consultorio_crypt.push($(this).val());
           }


        });

    }
    
   
    
    if(tem_caixa_especialidade.length > 0 ) {

        // Loop por todos os consultórios
        $('.caixa_especialidade_pai input.especialidade_vincular_a').each(function(){

           // Verifico se o checkbox está setado 
           if($(this).is(":checked") == true){

               // Armazeno o codigo dos consultórios setado
               array_cod_especialidade_crypt.push($(this).val());
           }

        });
   
    }
  
  
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
    
    if(array_cod_consultorio_crypt.length == 0){array_cod_consultorio_crypt = 0};
    if(array_cod_especialidade_crypt.length == 0){array_cod_especialidade_crypt = 0};

    

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
            'array_cod_consultorio_crypt': array_cod_consultorio_crypt,
            'array_cod_especialidade_crypt': array_cod_especialidade_crypt
        },
        beforeSend: function() { 

        },
        success: function(response) {

            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            
            // Checo retorno
            if (response.status == 'erro') {
                
                // Mostra mensagem de sucesso
                $.toast({
                    heading: 'error',
                    text: 'Erro, ocorreu um problema, tente novamente!',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: 1500, // em milisegundos
                    allowToastClose: true,
                    afterHidden: function() {
                        window.location.href = '{{url("adminpainel/salasespera")}}';
                    }
                });
            

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
 # FUNÇÃO PARA CHAMAR O MODAL CADASTRAR CONSULTORIO RÁPIDO
 # 
*/

$(document).on("click", "#btn_vincular_sala_espera", function(){

    // Inicio as variveis e garanto que estão vazias
    var cod_sala_espera =  "";
    var cod_unidade_crypt =  "";
    var array_cods_consultorios_check = new Array(); // Armazenar os checkbox setado
    var array_cods_consultorios_n_check = new Array(); // Armazenar os checkbox não setado


    // Recebo o valores
    cod_sala_espera =  $("#cod_sala_espera").val();
    cod_unidade_crypt =  $("#cod_unidade_crypt").val();
    
    

    // Loop por todos os consultorios
    $('.caixa_consultorio_pai #consultorio_vincular_a').each(function(){
        
        // Verifico se o checkbox estão setado 
        if($(this).is(":checked") == true){
           
            // Armazeno o codigo dos consultórios setado
            array_cods_consultorios_check.push($(this).val());
            
        }else { // Armazeno os checkbox que não estão setado
            
            // Armazeno o codigo dos consultórios setado
            array_cods_consultorios_n_check.push($(this).val());
            
        }    

    });

  
    
    // Requisição ajax
    $.ajax({
        cache: false,
        type: "POST",
        url: "<?php echo url('admin/painel/salasespera/vincular-consultorio-sala-espera'); ?>",
        data: { 
            'cod_sala_espera': cod_sala_espera,
            'cod_unidade_crypt': cod_unidade_crypt,
            'array_cods_consultorios_check': array_cods_consultorios_check,
            'array_cods_consultorios_n_check': array_cods_consultorios_n_check
        },
        beforeSend: function() { 

        },
        success: function(response) {

            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);
            
            // Limpo e/ou escondo div e msg de aviso
             $("#msg_aviso").html("");
             $("#div_aviso").hide();
            
            // Checo retorno
            if (response.status == 'erro') {
                
                // Mostra mensagem de sucesso
                $.toast({
                    heading: 'error',
                    text: 'Erro, ocorreu um problema, tente novamente!',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: 1500, // em milisegundos
                    allowToastClose: true,
                    afterHidden: function() {
                        window.location.href = '{{url("adminpainel/salasespera")}}';
                    }
                });
            

            } else if (response.status == 'sucesso') {
                
                
                if(response.contem_aviso == 'sim'){
                    
                    // Checo os consultórios que não podem ser desvinculados
                    //alert(response.cod_para_manter_checado)
                    //alert(response.total_aviso)
                    i = 0;
                    
                    $(".caixa_consultorio_pai .consultorio_vincular_a").each(function(){
                        
                        for(i = 0; i <= response.total_aviso; i++){
                            
                            if(response.cod_para_manter_checado[i] == $(this).val()){
                                
                                $(this).prop('checked', true);
                                
                            }
            
                        }
                        
                    })
                    
                    //$('.consultorio_vincular_a').val("151").checked = true;
                    
                    $("#msg_aviso").append(response.msg);
                    $("#div_aviso").show();
                    
                } else if(response.contem_aviso == 'nao'){
                 
                   // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Consultório(s) vinculado(s) / desvinculado(s) com sucesso!',
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

        }

    }); // FECHO AJAX 

});

</script>
@stop
