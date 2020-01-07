@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Renomear
@stop

@section('includes_no_head')

<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

@stop

@section('conteudo')
<div class="page-title">
	<div class="title_left">
		<h3>Insira o nome da sua tabela</h3>
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
						<form method="POST" action="<?php echo url('admin/painel/tabelas/escolher-precificacao');?>">
							<div class="row">
								<div class="col-xs-12">
                                                                    <h3>Atribuir Nome:</h3>
								</div>
								<div class="col-sm-6 col-xs-12">									
                                                                    <div class="form-group">
                                                                        <label class="control-label">Nome <span class="required-red">*</span></label>
									<input type="text" class="form-control" name="nome_tabela" id="nome_tabela" placeholder="Nome" value="TABELA1_RENAME.." <?php if (!empty(old('nome_tabela'))) { ?>value="<?php echo old('nome_tabela'); ?>"<?php } ?>>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Data inicio <span class="required-red">*</span></label>
									<input type="text" class="form-control" name="date" id="nome_tabela" placeholder="00/00/0000" <?php if (!empty(old('nome_tabela'))) { ?>value="<?php echo old('nome_tabela'); ?>"<?php } ?>>
                                                                    </div>
									
                                                                </div>
                                                               
							</div>
							<div class="row">
								<div class="clearfix"></div>
								<hr>
								<div class="col-xs-12">
									<button type="submit" class="btn btn-success pull-right">Avançar <i class="fas fa-arrow-circle-right"></i></button>
									<a href="{{ url('admin/painel/tabelas') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
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
@stop