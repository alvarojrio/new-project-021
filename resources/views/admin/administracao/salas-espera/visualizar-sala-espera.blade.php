@extends('layouts.administracao.layout')

@inject('permissoes','drclub\models\Permissoes')

@section('titulo_pagina')
CMRJ | Sala de espera | Vizualizar
@stop

@section('includes_no_head')
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">

@stop

@section('conteudo')
{!! Breadcrumbs::render('sala-espera-visualizar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Visualizar Sala de espera</h3>
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
                             
                              <!-- INICIO DA COLUNA -->
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                 <div class="form-group">
                                     <label class="control-label">Nome </label>
                                     <input type="text" class="form-control caixa_alta" disabled="disabled" value="<?php echo $sala_espera->nome_sala_espera; ?>" minlength="4" autofocus="off" autocomplete="off" required="required">
                                 </div>

                              </div>
                              <!-- FIM DA COLUNA -->

                               <!-- INICIO DA COLUNA -->
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                 <div class="form-group">
                                     <label class="control-label">Unidade </label>
                                     <input type="text" class="form-control caixa_alta" disabled="disabled" value="<?php echo $sala_espera->nome_unidade; ?>" minlength="4" autofocus="off" autocomplete="off" required="required">
                                 </div>

                              </div>
                              <!-- FIM DA COLUNA -->

                           </div>
                           <!-- FIM DA LINHA -->

                          
                           
                           <div class="panel panel-default">
                               
                               <div class="panel-heading">
                                   
                                   Consultórios vínculados
                                   
                               </div>
                               
                               
                               <div class="panel-body">
                                  
                                    
                                   
                                    <?php foreach($consultorio_sala_espera as $c): ?>

                                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='border:0.1em solid #d9edf7; padding: 10px 5px'>
                                        
                                        <div class='col-lg-11 col-md-11 col-sm-11 col-xs-11'>

                                           <input type='hidden' class='cod_consultorio_vizualizar' name='cod_consultorio_vizualizar' id='cod_consultorio_vizualizar' value='<?php echo Crypt::encrypt($c->cod_consultorio); ?>' />
                                           <?php echo $c->identificacao; ?>

                                        </div>

                                        <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right'>

                                            <button class='btn btn-sm btn-default' id='btn_visuazilizar_consultorio' value='<?php echo Crypt::encrypt($c->cod_consultorio); ?>'>
                                                <i class="fas fa-search"></i>
                                            </button>

                                        </div>

                                    </div>    

                                    <?php endforeach; ?>
                                        
                                       
                                   
                               </div>
                               
                               
                           </div>
                           
                           
                        </div>    
                        <!-- FIM DO PANEL-BODY -->

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                           <br/><br/>

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
 # INICIO MODAL VISUALIZAR MEDICOS DO CONSULTÓRIO
 # 
********************** -->
<div class="modal  fade" id="modal-visualizar-medico-consultorio" role="dialog"> 
   
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
			
            
            <!-- INICIO MODAL HEADER -->
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title">
                    <strong>
                        <span id='nome_consultorio'></span>
                    </strong>
                </h2>
                    
            </div>
            <!-- FIM MODAL HEADER -->

            <!-- INICIO MODAL BODY -->
            <div class="modal-body" id="medico_dinamico_modal_visualizar">
                
                <!-- Preenchido dinamicamente via javascript -->
 
            </div>
            <!-- FIM MODAL BODY -->

            <!-- INICIO MODAL FOOTER -->
            <div class="modal-footer">

               <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Fechar</button>
              

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


@stop

@section('includes_no_body')
<script src="{{asset('plugins/toast-kamranahmed/jquery.toast.min.js')}}"></script>


<script type="text/javascript">
   
   $(document).on('click', '#btn_visuazilizar_consultorio', function(){
   
       var cod_consultorio_crypt = $(this).val();
       $("#nome_consultorio").html("");
      
       /*
        # Inicio 
        # Ajax para buscar todos os médicos que estão vículados ao consultório
        #
       */
        $.ajax({
          cache: false,
          type: "POST",
          url: "<?php echo url('admin/painel/consultorios/buscar-medicos-vinculados-consultorio'); ?>",
          data: { 
              "cod_consultorio_crypt": cod_consultorio_crypt
          },
          beforeSend: function() { 

          

          },
          success: function(response) {

            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Checo retorno
            if (response.status == 'erro') {



            } else if (response.status == 'sucesso') {
               
                // Defino a variaveis
                var total_medico_modal_visualizar = "";
                var medico_modal_visualizar = "";
                var dia_modal_visualizar = "";
                var horario_entrada_modal_visualizar = "";
                var horario_saida_modal_visualizar = "";
                var identificacao_modal_visualizar = "";
                var caixa_medico_combo_visualizar_modal = "";
                var caixa_medico_visualizar_modal = "";
                
                // Limpo div usada para o append
                $("#nome_consultorio").html("");
                $("#medico_dinamico_modal_visualizar").html("");
                
                // recebo as variaveis
                total_medico_modal_visualizar = response.i; // contador
                identificacao_modal_visualizar = response.identificacao; // identificacao (nome do consultório)
                medico_modal_visualizar = response.medico; // nome do medico
                dia_modal_visualizar = response.dia; // Dia
                horario_entrada_modal_visualizar = response.horario_entrada; // horario_entrada
                horario_saida_modal_visualizar = response.horario_saida; // horarios_saida
                
                
                if(response.i > 0){
                
                   
                    caixa_medico_combo_visualizar_modal = identificacao_modal_visualizar;
                   
                    
                    caixa_medico_visualizar_modal += "<div class='table-responsive'> ";
                    
                    caixa_medico_visualizar_modal += "<table class='table table-striped table-hover table-bordered'>";
                    
                    caixa_medico_visualizar_modal += "<thead>";
                    caixa_medico_visualizar_modal += "<tr>";

                    caixa_medico_visualizar_modal += "<td class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>";
                    caixa_medico_visualizar_modal += "Médico";
                    caixa_medico_visualizar_modal += "</td>";

                    caixa_medico_visualizar_modal += "<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>";
                    caixa_medico_visualizar_modal += "Dia";
                    caixa_medico_visualizar_modal += "</td>";

                    caixa_medico_visualizar_modal += "<td class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>";
                    caixa_medico_visualizar_modal += "Horário entrada";
                    caixa_medico_visualizar_modal += "</td>";

                    caixa_medico_visualizar_modal += "<td class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>";
                    caixa_medico_visualizar_modal += "Horário saída";
                    caixa_medico_visualizar_modal += "</td>";

                    caixa_medico_visualizar_modal += "</tr>";
                    caixa_medico_visualizar_modal += "</thead>";


                    for(i = 0; i < total_medico_modal_visualizar ; i++ ){

                        caixa_medico_visualizar_modal += "<tbody>";
                        
                        caixa_medico_visualizar_modal += "<tr>";

                        caixa_medico_visualizar_modal += "<td class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>";
                        caixa_medico_visualizar_modal += medico_modal_visualizar[i];
                        caixa_medico_visualizar_modal += "</td>";

                        caixa_medico_visualizar_modal += "<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>";

                        switch(dia_modal_visualizar[i]){

                            case 1: dia_modal_visualizar[i] = "Domingo"; break;

                            case 2: dia_modal_visualizar[i] = "Segunda"; break;

                            case 3: dia_modal_visualizar[i] = "Terça"; break;

                            case 4: dia_modal_visualizar[i] = "Quarta"; break;

                            case 5: dia_modal_visualizar[i] = "Quinta"; break;

                            case 6: dia_modal_visualizar[i] = "Sexta"; break;

                            case 7: dia_modal_visualizar[i] = "Sábado"; break;


                        }                                    

                        caixa_medico_visualizar_modal += dia_modal_visualizar[i];
                        caixa_medico_visualizar_modal += "</td>";

                        caixa_medico_visualizar_modal += "<td class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>";
                        caixa_medico_visualizar_modal += horario_entrada_modal_visualizar[i];
                        caixa_medico_visualizar_modal += "</td>";

                        caixa_medico_visualizar_modal += "<td class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>";
                        caixa_medico_visualizar_modal += horario_saida_modal_visualizar[i];
                        caixa_medico_visualizar_modal += "</td>";

                        caixa_medico_visualizar_modal += "</td>";
                        
                        caixa_medico_visualizar_modal += "</tr>";
                        
                        caixa_medico_visualizar_modal += "</tbody>";

                        
                       
                    }
                    
                    caixa_medico_visualizar_modal += "</table>";
                        
                    caixa_medico_visualizar_modal += "</div>";
                    
                    $("#nome_consultorio").append(caixa_medico_combo_visualizar_modal);
                    $("#modal-visualizar-medico-consultorio").modal("show");
                    $("#medico_dinamico_modal_visualizar").append(caixa_medico_visualizar_modal);
                
                } else {
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'warning!',
                        text: response.msg,
                        showHideTransition: 'fade',
                        icon: 'warning',
                        position: 'top-right',
                        hideAfter: 2000, // em milisegundos
                        allowToastClose: true
                        
                    });
                    
                }
                
                
                
                
                

            } // FIM DO SUCESSO

          }

        }); // FECHO AJAX  
        /*
         # FIM
         # Ajax para buscar todos os médicos que estão vículados ao consultório
         # 
        */
         
   });
   
</script>
@stop
