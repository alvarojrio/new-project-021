@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Especialidades | Ordem
@stop

@section('includes_no_head')
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

<style type='text/css'>
  
    .dragHelper{
      
        display: block;
        padding: 30px;
        margin-top: 10px;
        background: #fff;
        border: 2px dashed #c2cdda;
        border-radius:  3px;
        text-align: center;
        -webkit-transition: background-color 0.2s ease;
        transition: background-color 0.2s ease;
        
    }
    
    .item {
      margin-top: 10px;
      min-height: 40px;  
      padding:10px;
    }
    
</style>

@stop

@section('conteudo')

{!! Breadcrumbs::render('especialidades-ordem') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Ordem de preferência</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
         
            <div id="div_erro" style="display:none">
             
              <div class="col-xs-12">
                <div class="alert alert-danger">
                    <h2>Alerta</h2>
                    <p>Falha na requisição, atualize a página e tente novamente.</p>
                </div>
              </div>
             
            </div>
            <div class="col-xs-12">
                
                
                <div class="row">
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-6">
                        <label class="control-label">Nome da Especialidade <span class="required-red">*</span></label>
                        <input type="text" class="form-control caixa_alta" name="nome_especialidade" id="nome_especialidade" value="<?php echo $especialidade->nome_especialidade; ?>" disabled="disabled">
                        <input type="hidden" class="form-control" name="cod_especialidade" id="cod_especialidade" value="<?php echo Crypt::encrypt($especialidade->cod_especialidade); ?>" disabled="disabled" required="required">
                    </div>
              
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-6">
                        <label class="control-label">Unidades <span class="required-red">*</span></label>
                        <select class="form-control" name="unidade" id="unidade" style="width:100%"  required="required">
                             
                            <option value="">Selecione uma unidade</option>
                            
                            @foreach($unidades as $un)
                                <option value="<?php echo Crypt::encrypt($un->cod_unidade) ?>"><?php echo $un->nome_unidade ?></option>
                            @endforeach

                        </select>
                    </div>
     
                </div>
          
                <!-- INICIO LINHA -->
                <div class="row">

                    <!-- INICIO COLUNA -->
                    <div class="col-xs-12">


                      <!-- ###### INICIO ############################# -->
                      <div id="aba_ordem_atual" style="display:none">

                          <!-- INICIO RESULTADO DA ORDEM DE PREFERÊNCIA -->
                          <div class="panel panel-primary">

                              <div class="panel-heading">Ordene a lista de preferência</div>

                              <div class="panel-body sortable" id='lista_medico'>

                                <!-- Dados gerado dinamicamente via javascript -->

                              </div>

                              <div class="col-xs-12" id='opcoes_extras'>

                               <!-- Dados gerado dinamicamente via javascript -->

                              </div>

                          </div>
                          <!-- FIM RESULTADO DA BUSCA -->									

                      </div>
                      <!-- ###### FIM  ############################# -->


                    </div>
                    <!-- FIM COLUNA -->

                </div>
                <!-- FIM LINHA -->
                
      
            </div>
       
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{asset('plugins/toast-kamranahmed/jquery.toast.min.js')}}"></script>


<script type="text/javascript">
    
$(document).ready(function() {
  
  $("#unidade").on("change", function(){
    
    // Inicializo a variavel e garanto que está vazia
    var cod_especialidade = "";
    var cod_unidade = "";
    
    // Armazeno o valor
    cod_especialidade = $("#cod_especialidade").val();
    cod_unidade = $("#unidade").val();
    
    // Faço uma busca ajax de todos os médicos que atendem a [x] na unidade [x] 
    // Requisição ajax
    $.ajax({
        cache: false,
        type: "POST",
        url: "<?php echo url('admin/painel/especialidades/buscar-ordem-unidade-especialidade'); ?>",
        data: { 
            "cod_especialidade": cod_especialidade,
            "cod_unidade": cod_unidade
        },
        beforeSend: function() { 

            // Executa antes do envio

        },
        success: function(response) {

            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Checo retorno
            if (response.status == 'erro') {

                // Faz algo                

            } else if (response.status == 'sucesso') {
              
               // Limpo as divs
             $("#lista_medico").html("");
             $("#opcoes_extras").html("");
             
             // Inicializo a variavel e garanto que estão vazias
             var opcoes_extras = ""; // para armazenar as opcoes extras ()
             opcoes_extras += "<div class='row'>";
             opcoes_extras +=   "<div class='col-xs-12'>";
             opcoes_extras +=     "<hr/>";
             opcoes_extras +=   "</div>";
             opcoes_extras += "</div>";
             
             opcoes_extras += "<div class='row'>";
             opcoes_extras +=   "<div class='col-xs-12 text-right'>";
             opcoes_extras +=     "<a href='{{ url('admin/painel/especialidades/') }}' class='btn btn-default'><i class='fas fa-arrow-circle-left'></i> Voltar</a>";
             opcoes_extras +=     "<button class='btn btn-md btn-success' id='btn_salvar'>Salvar</button>";
             opcoes_extras +=   "</div>";
             opcoes_extras += "</div>";
            
             $("#lista_medico").append(response.dados);
             $("#opcoes_extras").append(opcoes_extras);
             
             $("#aba_ordem_atual").show();

              
            }

        },
        complete: function(response) {

            // Executa ao completar envio

        },
        error: function(response, thrownError) {

            // Faz algo se der erro

        }
    });
    
    
  });
  
  $(document).on("click", "#btn_salvar", function(){
 
    var cod_especialidade = $("#cod_especialidade").val();
    var cod_unidade = $("#unidade").val();
    
    var ordem_preferencia_pai = new Array; // Crio um array
    var ordem_preferencia_filho = {}; // Crio um objeto

    $('#lista_medico').children('.lista_medico_filho').each(function(i,v) {
             
        ordem_preferencia_filho['posicao'] = i+1;
        ordem_preferencia_filho['cod_medico_crypt'] = $(v).attr('id');

        // Coloco o Objeto filho dentro do Array pai
        ordem_preferencia_pai.push(ordem_preferencia_filho);

        // Limpo variaveis para futuras utilizações
        ordem_preferencia_filho = {};

    }); // Fecho loop

    // Requisição ajax
    $.ajax({
      cache: false,
      url: "<?php echo url('admin/painel/especialidades/cadastrar-medico-ordem-unidade-especialidade'); ?>",
      type: 'POST',
      data:{
        ordem_preferencia_pai:ordem_preferencia_pai,
        cod_especialidade:cod_especialidade,
        cod_unidade:cod_unidade
      },
      success: function(response){

        // Convertendo resposta para objeto javascript
        var response = JSON.parse(response);

        // Checo retorno
        if (response.status == 'erro') {

          $("#div_erro").show();
          $("#aba_ordem_atual").hide();          

        } else if (response.status == 'sucesso') {

          // Mostra mensagem de sucesso
          $.toast({
              heading: 'Sucesso!',
              text: 'Ordem de preferência salva com sucesso!', // response.sucesso
              showHideTransition: 'fade',
              icon: 'success',
              position: 'top-right',
              hideAfter: 1500, // em milisegundos
              allowToastClose: true, 
          }); 
        }
      }
    });
    
  });
  
  $(function(){
    $(".sortable").sortable({
      connectWith: ".sortable",
      placeholder: "dragHelper",
      scroll: true,
      revert: true,
      cursor: "move",
      /*update: function(event, ui){
        // Para atualizar linha por linha fazer uma requisição ajax
      },
      start: function(event, ui){
        // Disapara ao iniciar o evento
      },
      stop:function(event, ui){
        
      }*/
    });
  
  });
  
})

    
</script>
@stop