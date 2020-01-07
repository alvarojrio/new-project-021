@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Cadastrar
@stop

@section('includes_no_head')

<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('convenios-cadastrar-plano', $convenio) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Plano ANS</h3>
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
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#dadoscadastrais" id="tab_dadoscadastrais">Dados cadastrais</a></li>
                        </ul>
        
                        <div class="clearfix" style="margin-bottom:20px"></div>
                        
                        <form method="POST" action="<?php echo url('admin/painel/planos/cadastrar-plano-ans-sequencial'); ?>" enctype="multipart/form-data">
                            
                            <div class="tab-content">
                                
                                <div id="dadoscadastrais" class="tab-pane fade in active">
                                    
                                    <div class="row">
                                        <h2><i class="fas fa-briefcase-medical"></i> Dados cadastrais:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Convênio <span class="required-red">*</span></label>
                                                    <input type="text" class="form-control" value="{{ $convenio->nome_convenio }}" name="nome_convenio" readonly="readonly" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Tabela <span class="required-red">*</span></label>
                                                    <select class="form-control" name="cod_tabela" id="cod_tabela">
                                                        <option value="">Selecione ..</option>
                                                        @foreach($tabelas as $tabela)
                                                            <option value="{{ Crypt::encrypt($tabela->cod_tabela) }}" <?php if(old('cod_tabela') == $tabela->cod_tabela){ echo "selected"; }?>>{{ $tabela->nome_tabela }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Faturado ? <span class="required-red">*</span></label>
                                                    <select class="form-control" name="faturado" id="faturado">
                                                        <option value="1" <?php if (old('faturado') === 1 || old('faturado') == NULL){ echo "selected"; } ?>>Sim</option>
                                                        <option value="0" <?php if (old('faturado') === 0){ echo "selected";} ?>>Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nome do plano <span class="required-red">*</span></label>
                                                    <input type="text" class="form-control" name="nome_plano" id="nome_plano" placeholder="Nome do plano" value="{{ old('nome_plano') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Código</label>
                                                    <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" value="{{ old('codigo') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Data Inicio <span class="required-red">*</span></label></label>
                                                    <input type="text" class="form-control datepicker" name="data_inicio" id="data_inicio" placeholder="Data Inicial da vigência Plano" value="{{ old('data_inicio') }}">
                                                </div>
                                            </div>
                                        </div>
                                           
                                    </div>
                                    
                                </div>
                                <div class="clearfix"></div>
                                    <input type="hidden" id="cod_convenio" name="cod_convenio" value="<?php echo $codigo_convenio; ?>" />
                                    <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                    <a class="btn btn-default pull-right" href="{{ url('admin/painel/convenios/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('includes_no_body')


<script type="text/javascript">
/*********************
# ->  MUDANÇA DE ABA *
*********************/ 
function clickTabDadosCadastrais() {
    $("#tab_dadoscadastrais").click();
}

/*
  # FUNÇÕES DATA
*/ 
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-117y',
        todayHighlight: true
    });


</script>
@stop