@extends('layouts.administracao.layout')

@inject('permissoes','drclub\models\Permissoes')

@section('titulo_pagina')
CMRJ| Feriados | Cadastrar
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
@stop

@section('conteudo')
{!! Breadcrumbs::render('feriados-cadastrar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Cadastrar Feriado</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
    
    
    <div class="col-xs-12">
    
        
        <div class="x_panel">
      
            
            <div class="x_content">
        
                
                <div class="row">
    
                        <div id="avisoValidacao">
                          @if (count($errors) > 0)
                          <div class="col-xs-12">
                            <div class="alert alert-danger">
                              <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                            </div>
                          </div>
                          @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            
                            <div class="panel panel-success"> 
                 
                                <div class="panel-heading"><i class="fas fa-umbrella-beach"></i> Feriado</div>

                                
                                <div class="panel-body">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                            <div class="form-group">
                                                <label class="control-label">Descrição <span class="required-red">*</span></label>
                                                <input type="text" class="form-control caixa_alta" name="descricao" id="descricao" placeholder="Descrição" <?php if (!empty(old('descricao'))) { ?>value="<?php echo old('descricao'); ?>"<?php } ?> minlength="4" autofocus="off" autocomplete="off" required="required">
                                            </div>

                                        </div>


                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">

                                            <div class="form-group">
                                                <label class="control-label">Data <span class="required-red">*</span></label>
                                                <input type="text" class="form-control" name="data" id="data" <?php if (!empty(old('data'))) { ?>value="<?php echo old('data'); ?>"<?php } ?> minlength="8"  autocomplete="off" required="required">
                                            </div>

                                        </div>  
                                        
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                                            <label class="control-label">Recorrente? </label><br/>
                                            <input type="checkbox" name="recorrente" id="recorrente" value="Sim"  <?php if (old('agendavel') == "Sim") { echo "checked";} ?> > Sim

                                        </div>

                                    </div>     

                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                                            <div class="form-group">

                                                <label class="control-label">Unidades <span class="required-red">*</span></label>


                                                <select class="form-control select2_multiple" name="unidades[]" id="unidades" style="width:100%" multiple required="required">

                                                    @foreach($unidades as $un)
                                                        <option value="{{ $un->cod_unidade }}" <?php if(old('unidades') && in_array($un->cod_unidade, old('unidades'))){ echo "selected"; }?> >{{$un->nome_unidade}}</option>
                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>    

                                      
                                    </div>
                     
                                </div>    
                                
                               
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <br/><br/>

                                    <button type="submit" class="btn btn-success pull-right" id="btn_salvar_feriado"><i class="far fa-save"></i> Salvar</button>

                                    <a href="{{ url('admin/painel/bloqueiosferiados/') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

                                </div>
                                      

                            </div>
                            
                        </div>    

                </div>
          
    </div>
  </div>
</div>
@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>    
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{asset('plugins/toast-kamranahmed/jquery.toast.min.js')}}"></script>

<script type="text/javascript">
    
$(".select2_multiple").select2({
  placeholder: "Selecione as unidades",
  allowClear: true
});
    
// função para controlar data minima e maxima
$(function() {
    
   $("#data").datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    startDate: '-1y',
    //endDate: '0d',
    language: 'pt-BR'   
   });
   
});

$(document).on('click', '#btn_salvar_feriado', function(){
  
  // Inicializo as variaveis e garanto que estão vazias
  var descricao = "";
  var data = "";
  var recorrente = "";
  var unidades = "";
  
  descricao = $("#descricao").val();
  data = $("#data").val();
  recorrente = $("#recorrente").val();
  unidades = $("#unidades").val();
  
   // Requisição ajax
   $.ajax({
      cache: false,
      type: "POST",
      url: "<?php echo url('admin/painel/bloqueiosferiados/cadastrar-feriado'); ?>",
      data: { 
          "descricao": descricao,
          "data": data,
          "recorrente": recorrente,
          "unidades": unidades
      },
      beforeSend: function() { 

          // Executa antes do envio
          $("#btn_salvar_feriado").html('processando...');
          $("#btn_salvar_feriado").prop('disabled', true);


      },
      success: function(response) {

          // Convertendo resposta para objeto javascript
          var response = JSON.parse(response);
          
          //alert(response.status);
          
          // Checo retorno
          if (response.status == 'erro') {

              // Mostra mensagem de erro
              $.toast({
                  heading: 'Erro!',
                  text: response.erro,
                  showHideTransition: 'fade',
                  icon: 'error',
                  position: 'top-right',
                  hideAfter: 1500, // em milisegundos
                  allowToastClose: true,
                  afterHidden: function() {

                    window.location.replace("<?php  echo url("admin/painel/bloqueiosferiados"); ?>");

                  }   
              });  


          } else if (response.status == 'sucesso') {

              // Mostra mensagem de sucesso
              $.toast({
                  heading: 'Sucesso!',
                  text: response.sucesso,
                  showHideTransition: 'fade',
                  icon: 'success',
                  position: 'top-right',
                  hideAfter: 1500, // em milisegundos
                  allowToastClose: true,
                  afterHidden: function() {

                    window.location.replace("<?php  echo url("admin/painel/bloqueiosferiados?aba=f"); ?>");
                  }   
              });  


          }

      },
      complete: function(response) {

          // Executa ao completar envio

      },
      error: function(response, thrownError) {

          // Faz algo se der erro

      }
  }); // FECHO AJAX

});
  

</script>
@stop