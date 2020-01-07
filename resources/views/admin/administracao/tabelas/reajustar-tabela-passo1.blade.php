@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Reajustar
@stop

@section('includes_no_head')

<link type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-reajustar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Reajustar Tabela - Passo 1</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <!-- INICIO DIV DE ERROS DE VALIDAÇÃO -->
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
                    <!-- FIM DIV DE ERROS DE VALIDAÇÃO -->  
                    
                </div>
                <!-- FIM LINHA -->
                
 
                        
                <form method="POST" action="<?php echo url('admin/painel/tabelas/reajustar-tabela-passo1'); ?>">
                            


                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <div class="box_alerta_amarelo">

                            <h4 style="margin-top: 0px;">Instruções</h4>
                            
                            - Este formulário irá fazer o reajuste geral de todos os preços de procedimentos ativos no momento. <br />
                            - Caso você utilize uma futura data inicial de vigência de um preço para uma data previamente já utilizada, o valor anterior será descartado.

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->




                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-sm-6 col-xs-12" style="margin-top: 9px; margin-bottom: 9px;">
                        
                        <h4>Reajustando valores da tabela: <b><?php echo $tabela->nome_tabela; ?></b></h4>

                    </div>

                </div>
                <!-- FIM LINHA -->

                

                            
                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="form-group col-sm-6 col-xs-12">   
                        <label class="control-label">Data Inicial <span class="required-red">*</span></label>
                        <input type="text" class="form-control datepicker" name="data_inicio" id="data_inicio" placeholder="Data Inicio" autocomplete="off" readonly="" <?php if (!empty(old('data_inicio'))) { ?>value="<?php echo old('data_inicio'); ?>"<?php } ?>>
                    </div>
                                        
                    <div class="form-group col-sm-6 col-xs-12" id="div_configuracao_categoria">
                        <label class="control-label">Categoria<span class="required-red"></span></label>
                        <select class="form-control" name="cod_categoria" id="cod_categoria"> 
                            <option value="">Selecione uma opção</option>                                                          
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->cod_categoria }}" <?php if(old('cod_categoria') == $categoria->cod_categoria){ echo 'selected="selected"'; }?>>{{ $categoria->descricao }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <!-- FIM LINHA -->



                
                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="form-group col-sm-6 col-xs-12">

                        <label class="control-label">Tipo de Cobrança <span class="required-red"></span></label>
                        <select class="form-control" name="tipo_cobranca" id="tipo_cobranca" onchange="habilitarDesabilitarCampoConfiguracaoBoleto()">
                            <option value="">Selecione uma opção</option>
                            <option value="unidade" 
                                <?php
                                if (old('tipo_cobranca') == "unidade" && old('tipo_cobranca') != null) {
                                    echo "selected";
                                }
                                ?>>Digitar Valor R$
                            </option>
                            <option value="boleto" 
                                <?php
                                if (old('tipo_cobranca') == "boleto") {
                                    echo "selected";
                                }
                                ?>>Por CH/ Filme
                            </option>
                        </select>

                    </div>

                </div>
                <!-- FIM LINHA -->




                <!-- INICIO LINHA -->
                <div class="row">
                                       
                    <div id="div_configuracao_boleto">
                        
                        <div class="form-group col-sm-6 col-xs-12">
                            <label class="control-label">Valor CH <span class="required-red">*</span></label>
                            <input type="text" class="form-control" name="valor_ch" id="valor_ch" placeholder="0,00" <?php if (!empty(old('valor_ch'))) { ?>value="<?php echo old('valor_ch'); ?>"<?php } ?>>
                        </div>
                              
                        <div class="form-group col-sm-6 col-xs-12">
                            <label class="control-label">Valor Filme <span class="required-red"></span></label>
                            <input type="text" class="form-control" name="valor_filme" id="valor_filme" placeholder="R$ 00,00" <?php if (!empty(old('valor_filme'))) { ?>value="<?php echo old('valor_filme'); ?>"<?php } ?>>
                        </div>     
                                                                                
                    </div>
                    
                    <div class="form-group col-sm-6 col-xs-12" id="div_configuracao_procedimentos">

                        <label class="control-label">Percentual (%) <span class="required-red">*</span></label>
                        <input type="text" class="form-control" name="percentual" id="percentual" placeholder="%" <?php if (!empty(old('percentual'))) { ?>value="<?php echo old('percentual'); ?>"<?php } ?> style="width: 100px">
                        
                    </div>   
                                                    
                </div>  
                <!-- FIM LINHA -->




                <!-- INICIO LINHA -->
                <div class="row">
                                
                    <div class="col-md-12 col-xs-12"> 

                        <div class="clearfix"></div>

                        <hr />

                        <div class="col-xs-12">

                            <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                            <a href="{{ url('admin/painel/tabelas') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                            
                            <input type="hidden" id="codigo_tabela_criptografado" name="codigo_tabela_criptografado" value="<?php echo $codigo_tabela_criptografado; ?>" />

                        </div>
                        
                    </div>

                </div>
                <!-- FIM LINHA -->


                                                            
                </form>



            </div> 
        </div>
    </div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

/*
 # FUNÇÃO PARA HABILITAR/DESABILITAR CAMPO
 */
// Ao carregar Inicializo a função 
habilitarDesabilitarCampoConfiguracaoBoleto();

function habilitarDesabilitarCampoConfiguracaoBoleto() {

    var tipo_cobranca = $("#tipo_cobranca option:selected").val();

    if (tipo_cobranca === "unidade") {
        $("#div_configuracao_procedimentos").removeClass('hidden');
        $("#div_configuracao_boleto").addClass('hidden');
    } else if (tipo_cobranca === "boleto") {
        $("#div_configuracao_boleto").removeClass('hidden');
        $('#configuracao_boleto').prop("disabled", false);
        $("#div_configuracao_procedimentos").addClass('hidden');
    } else {
        $("#div_configuracao_boleto").addClass('hidden');
        $("#div_configuracao_procedimentos").addClass('hidden');
        $('#configuracao_boleto').prop("disabled", true);
        $('configuracao_boleto').val('');
    }

}
        

// Ativa máscara de dinheiro em campos
$('#valor_ch').maskMoney();
$('#valor_filme').maskMoney();

// Ativação de plugin datepicker em campos
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR',
    weekStart: 0,
    endDate: '+5y',
    startDate: '0d',
    todayHighlight: true,
    autoclose: true
});                  
</script>

@stop