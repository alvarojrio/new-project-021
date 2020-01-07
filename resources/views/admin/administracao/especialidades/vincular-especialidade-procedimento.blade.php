@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Especialidades | Vincular Especialidade Unidade
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('especialidades-vincular-procedimento') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Vincular procedimento</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
            <div class="row">
                
                <form action="<?php echo url('admin/painel/especialidades/vincular-especialidade-procedimento'); ?>" method="POST" enctype="multipart/form-data">
                
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
                
                <div class="col-lg-12 col-md-12 col-xs-12">
                   
                    <div class="panel-body">
                        
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-xs-12">
                              
                                <label class="control-label">Especialidade <span class="required-red">*</span></label>
                              
                                <input type="text" class="form-control caixa_alta" name="nome_especialidade" id="id_especialidade" value='<?php echo $especialidades->nome_especialidade; ?>'  readonly = 'readonly' required='required'>
                              
                                <input type="hidden" class="form-control caixa_alta" name="cod_especialidade" id="cod_especialidade" value='<?php echo Crypt::encrypt($especialidades->cod_especialidade); ?>'  readonly = 'readonly' required='required'>
                            
                            </div>
                            
                        </div>
                         
                        <div class="row">
                            
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              
                                <hr/>
                                
                            </div>
                            
                        </div>
                        
                        <div class="row">    

                            <div class="col-lg-6 col-md-12 col-xs-12">
                                
                                <label class="control-label">Tabela <span class="required-red">*</span></label>
                                
                                <select class="form-control" name="tabela" id="tabela" style="width:100%" required='required'>
                                    
                                    <option value=''> Selecione tabela </option>   
                                    
                                    @foreach($tabelas as $tabela)
                                      
                                        <option value="{{ $tabela->cod_tabela }}" <?php if (old('tabela') == $tabela->cod_tabela) { echo "selected"; } ?>>{{ $tabela->nome_tabela }}</option>
                                    
                                    @endforeach
                         
                                </select>
                                
                            </div>
                            
                            <div class="col-lg-6 col-md-12 col-xs-12">
                              
                                <label class="control-label">Procedimento <span class="required-red">*</span></label>
                              
                                <input type="text" name="procedimento" id="procedimento" class="form-control" input-lg autocomplete="of" placeholder="Informe o nome do procedimento" required="required"/>
                                <input type="hidden" name="cod_procedimento" id="cod_procedimento"  />
                              
                            
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                
                                <label class="control-label">&nbsp</label><br/>
                                
                                <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                
                                <a class="btn btn-default pull-right" href="{{ url('admin/painel/especialidades') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                            
                            </div>

                        </div>    
                    </div>
                   
                </div>  
               
            </form>
            </div> <!-- FIM DA ROW -->
      
        </div>
      
        </div>
    
    </div>
  
</div>

@stop

@section('includes_no_body') 

<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/autocomplete/src/jquery.autocomplete.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/typeahead.js') }}"></script>

<script type="text/javascript"> 
    
    $(document).ready(function(){
    
        // Verificando se tem uma tabela selecionada ao digitar o procedimento
        $("#procedimento").on("keyup", function(){

            var cod_tabela = $("#tabela").val();
           
            if(cod_tabela.length < 1){
                $("#procedimento").val("");
                $("#cod_procedimento").val("");
                alert("Selecione a tabela");
                return false;
            }
    
        });
        
        // Limpando o campo procedimento ao selecionar uma tabela
        $("#tabela").on("change", function(){

            $("#procedimento").val("");
            $("#cod_procedimento").val("");
    
        });
   
        // Ativo autocomplete no input #termo
        var autocomplete_paciente = $('#procedimento').devbridgeAutocomplete({
            
            noCache: true,
            minChars: 4, // Quantidade de caracteres para acionar a busca
            triggerSelectOnValidInput: false,
            showNoSuggestionNotice: true,
            noSuggestionNotice: 'Nenhum resultado encontrado',
            type: 'POST',
            serviceUrl: "<?php echo url('admin/painel/especialidades/buscar-procedimento-vinculada-tabela-ajax'); ?>",
            paramName: "procedimento", // Define o nome do parametro que vai guardar a informação digitada. Esse parametro será passado na requisição e poderá ser recuperado pelo controller
            params: { // Passa parametros adicionais, que também estarão presentes na requisição
                filtro_tabela: function() {
                    return $('#tabela').val();
                },
            },
            transformResult: function(response) {
                
                return {
                    suggestions: $.map($.parseJSON(response), function(item) {
                        return {
                            value: item.nome,
                            data: item.codigo
                        };
                    })
                };

            },
            focus: function (event, ui) {
                event.preventDefault();
            },
            onSelect: function (suggestion) {
                // Soon
                /*var test = JSON.stringify(suggestion, '\t', 4);
                console.log(test);*/
                var cod_procedimento  = suggestion.data;
                $("#cod_procedimento").val(cod_procedimento);
            }
            
        });
        
    });  // Fecho document  
 
</script>

@stop