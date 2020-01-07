@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Clonar
@stop

@section('includes_no_head')

<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-clonar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Clonar Tabela</h3>
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
                    
                    <div class="col-xs-12">    
                        
                        <form method="POST" action="<?php echo url('admin/painel/tabelas/clonar-tabela'); ?>">
                            
                            <div class="row">

                                <div class="col-sm-6 col-xs-12">
                                    
                                    <h4>Clonando dados da tabela: <b><?php echo $tabela->nome_tabela; ?></b></h4>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6 col-xs-12">
                                    
                                    <br />
                                    <h4 class="text-primary">Dados da Nova Tabela</h4>

                                </div>

                            </div>

                            <div class="row"> 
                                       
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label class="control-label">Nome <span class="required-red">*</span></label>
                                    <input type="text" class="form-control" name="nome_tabela" id="nome_tabela" placeholder="Nome" autocomplete="off" <?php if (!empty(old('nome_tabela'))) { ?>value="<?php echo old('nome_tabela'); ?>"<?php } ?>>
                                </div>
                                
                                <div class="form-group col-sm-6 col-xs-12">
                                    <label class="control-label">Data Inicial <span class="required-red">*</span></label>
                                    <input type="text" class="form-control datepicker" name="data_inicial" id="data_inicial" placeholder="Data Inicial" autocomplete="off" <?php if (!empty(old('data_inicial'))) { ?>value="<?php echo old('data_inicial'); ?>"<?php } ?>>
                                </div>   

                            </div>

                            <div class="row"> 
                                                                
                                
                                <div class="col-xs-12"> 
                                     
                                    <div class="row">
                                        <div class="clearfix"></div>
                                        <hr />
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                            <a href="{{ url('admin/painel/tabelas') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                            <input type="hidden" id="codigo_tabela_criptografado" name="codigo_tabela_criptografado" value="<?php echo $codigo_tabela_criptografado; ?>" />
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
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Ativação do datepicker em campo
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        endDate: '+5y',
        startDate: '0d',
        todayHighlight: true,
        autoclose: true
    });

});                  
</script>

@stop