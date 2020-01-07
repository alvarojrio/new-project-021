@extends('layouts.administracao.layout')

@inject('permissoes','drclub\models\Permissoes')

@section('titulo_pagina')
CMRJ | Feriados | Alterar
@stop

@section('includes_no_head')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@stop

@section('conteudo')
<div class="page-title">
	<div class="title_left">
		<h3>Alterar Feriado</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<form method="POST" action="<?php echo url('admin/painel/feriados/alterar/'.$feriado->cod_feriado);?>">
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
							<div class="form-group">
								<label class="control-label">Descrição <span class="required-red">*</span></label>
								<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição do Feriado" value="{{ $feriado->descricao }}" required>
							</div>
							<div class="form-group">
								<label class="control-label">Data <span class="required-red">*</span></label>
								<input type="text" class="form-control datepicker" name="data" id="data" placeholder="Data do Feriado" value="{{ date('d/m/Y', strtotime($feriado->data)) }}" required>
							</div>
						</div>
						<div class="col-xs-12">
							<button type="submit" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Alterar</button>
							<a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right">Voltar</a>
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
	$('.datepicker').datepicker({
    	format: 'dd/mm/yyyy',
    	language: 'pt-BR',
    	weekStart: 0,
    	todayHighlight: true
    });
</script>
@stop