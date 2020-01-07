@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Categorias | Alterar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('categorias-alterar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Alterar Categoria</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <form method="POST" action="<?php echo url('admin/painel/categorias/alterar-categoria/');?>">                        
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
                        
                        <div class="container">
                            
                        <div class="row">
                          <div class="col-sm-6">
                            
                              <div class="form-group">
                                <label class="control-label">Descrição <span class="required-red">*</span></label>
                                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="{{ $categorias->descricao}}" required>
                              </div>
                              
                              <div class="form-group">
                                  <label class="control-label">Data Criação <span class="required-red">*</span></label>
                                  <input type="text" class="form-control datepicker" name="data_criacao" id="data_criacao" placeholder="Data Criação" value="{{ date('d/m/Y',strtotime($categorias->data_criacao))}}">                 
                              </div>
                              
                          </div>
                          
                        </div>
                      </div>
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="hidden" id="cod_categoria" name="cod_categoria" value="<?php echo $codigo_categoria; ?>" />
                                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Alterar</button>
                                <a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right">Voltar</a>
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
<script type="text/javascript" src="{{ asset('plugins/timepicker/bootstrap-timepicker.js') }}"></script>

<script type="text/javascript">
$('.timepicker').timepicker({
        minuteStep: 1,
        template: 'dropdown',
        appendWidgetTo: 'body',
        showSeconds: false,
        showMeridian: false,
        defaultTime: false
});
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
            language: 'pt-BR',
            weekStart: 0,
            startDate: '-117y',
            todayHighlight: true
});

</script>
@stop
