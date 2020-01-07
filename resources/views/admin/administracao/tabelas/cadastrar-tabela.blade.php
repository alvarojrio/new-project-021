@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Cadastrar
@stop

@section('includes_no_head')

<link type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

<style type="text/css">
/* Correção da barra de rolagem vertical para datatable responsiva */
.table-responsive {
    overflow-x: inherit;
}
</style>

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Tabela</h3>
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
                    
                    
                    
                <form method="POST" action="<?php echo url('admin/painel/tabelas/cadastrar-tabela'); ?>">



                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">

                        <h2>Template</h2>

                    </div>

                </div>
                <!-- FIM LINHA -->
                


                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-sm-6 col-xs-12">

                        <label class="control-label">Tabela Modelo (Template)<span class="required-red">*</span></label>
                        <select class="form-control" id="cod_tabela_template" name="cod_tabela_template">
                            <option value="">Selecionar Tabela Modelo...</option>
                                @foreach($tabelas_templates as $tabela_template)                                            
                                    <option value="{{ $tabela_template->cod_tabela_template }}" <?php if($cod_tabela_template == $tabela_template->cod_tabela_template){ echo "selected"; }?>>{{ $tabela_template->descricao }}</option>
                                @endforeach
                        </select>

                        <br />
                        
                        <a class="btn btn-primary btn-sm" href="{{ url('admin/painel/tabelastemplates/cadastrar-tabela-template') }}">
                            <i class="fa fa-plus"></i> Importar Tabela Modelo
                        </a>

                    </div>

                </div>
                <!-- FIM LINHA -->  



                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">

                        <h2>Dados Gerais</h2>

                    </div>

                </div>
                <!-- FIM LINHA -->
                    
                

                <!-- INICIO LINHA -->
                <div class="row">  
                                    
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="control-label">Nome <span class="required-red">*</span></label>
                        <input type="text" class="form-control" name="nome_tabela" id="nome_tabela" placeholder="Nome" autocomplete="off" <?php if (!empty(old('nome_tabela'))) { ?>value="<?php echo old('nome_tabela'); ?>"<?php } ?>>
                    </div>
                    
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="control-label">Tipo <span class="required-red">*</span></label>
                        <select class="form-control" id="tipo_tabela" name="tipo_tabela">
                            <option value="">Selecione um tipo...</option>
                            <option value="1">Convênio</option>
                            <option value="2">Particular</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="control-label">Data Inicial <span class="required-red">*</span></label>
                        <input type="text" class="form-control datepicker" name="data_inicial" id="data_inicial" placeholder="Data Inicial" autocomplete="off" <?php if (!empty(old('data_inicial'))) { ?>value="<?php echo old('data_inicial'); ?>"<?php } ?>>
                    </div>                                                                      
                                                                                                                                            
                </div> 
                <!-- FIM LINHA --> 
                                                                
                                
                                <div class="col-xs-12">                      
                                    
                                    <div class="row">
                                        <div class="clearfix"></div>
                                        <hr />
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                            <a href="{{ url('admin/painel/tabelas') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                                                            
                </form>
 
                    </div>

                </div>
            </div>
        </div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>

<script type="text/javascript">
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