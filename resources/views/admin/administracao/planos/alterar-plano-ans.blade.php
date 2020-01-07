@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Alterar
@stop

@section('includes_no_head')

<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('convenios-alterar-plano-ans', $plano) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Alterar Plano ANS</h3>
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
                        
                        <form method="POST" action="<?php echo url('admin/painel/planos/alterar-plano-ans'); ?>" enctype="multipart/form-data">
                            
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
                                                    <select class="form-control" name="cod_convenio" id="cod_convenio">
                                                        @foreach($convenios as $convenio)
                                                                <option value="{{ Crypt::encrypt($convenio->cod_convenio) }}" <?php if($plano->cod_convenio == $convenio->cod_convenio){ echo "selected"; }?>>{{ $convenio->nome_convenio }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Tabela <span class="required-red">*</span></label>
                                                    <select class="form-control" name="cod_tabela" id="cod_tabela">
                                                        @foreach($tabelas as $tabela)
                                                                <option value="{{ Crypt::encrypt($tabela->cod_tabela) }}" <?php if($plano->cod_tabela == $tabela->cod_tabela){ echo "selected"; }?>>{{ $tabela->nome_tabela }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Faturado ? <span class="required-red">*</span></label>
                                                    <select class="form-control" name="faturado" id="faturado">
                                                            <option value="1" <?php if($plano->faturado === 1){ echo "selected"; }?>>Sim</option>
                                                            <option value="0" <?php if($plano->faturado === 0){ echo "selected"; }?>>Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nome do plano <span class="required-red">*</span></label>
                                                    <input type="text" class="form-control" name="nome_plano" id="nome_plano"  value="{{ $plano->nome_plano }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                 <div class="form-group">
                                                    <label class="control-label">Código</label>
                                                    <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $plano->codigo }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Data Inicio <span class="required-red">*</span></label></label>
                                                    <input type="text" class="form-control datepicker" name="data_inicio" id="data_inicio" placeholder="Data Inicial da vigência Plano" value="{{ ($plano->data_inicio != null) ? date('d/m/Y', strtotime($plano->data_inicio)) : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                           
                                    </div>
                                    
                                </div>
                                <div class="clearfix"></div>
                                <input type="hidden" id="cod_plano" name="cod_plano" value="<?php echo $codigo_plano; ?>">
                                    <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                    <a class="btn btn-default pull-right" href="<?php echo URL::previous(); ?>"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
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