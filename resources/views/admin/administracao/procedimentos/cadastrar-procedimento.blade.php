@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Procedimentos | Cadastrar
@stop

@section('includes_no_head')

<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-cadastrar-procedimento', $tabela) !!}

<div class="page-title">
    <div class="title_left">
	<h3>Cadastrar Procedimento</h3>
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


		<form method="POST" action="<?php echo url('admin/painel/procedimentos/cadastrar-procedimento/'); ?>">

		    <!-- INICIO LINHA -->
		    <div class="row">

			<!-- INICIO COL-XS-12 (COLUNA 1) -->
			<div class="col-xs-12 col-sm-4">

			    <div class="form-group">
				<label class="control-label">Tabela <span class="required-red">*</span></label>
				<input type="text"class="form-control"  readonly="readonly" value="{{ $tabela->nome_tabela }}">
				<input type="hidden"class="form-control" name="cod_tabela" id="cod_tabela" readonly="readonly" value="{{ $tabela->cod_tabela }}">                                            			
			    </div>

			    <div class="form-group">
				<label class="control-label">Categoria</label>
				<select class="form-control" name="cod_categoria" id="cod_categoria">
				    <option value="">Selecione uma opção</option>
				    @foreach($categorias as $categoria)
				    <option value="{{ $categoria->cod_categoria }}" <?php if (old('cod_categoria') == $categoria->cod_categoria) { echo "selected"; } ?>>{{ $categoria->descricao }}</option>
				    @endforeach
				</select>
			    </div>

			    <div class="form-group">
				<label class="control-label">Sinônimo</label>
				<input type="text" class="form-control" name="sinonimo" id="sinonimo" placeholder="Sinônimo" <?php if (!empty(old('sinonimo'))) { ?>value="<?php echo old('sinonimo'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">Sub-Grupo</label>
				<input type="text" class="form-control" name="subgrupo" id="subgrupo" placeholder="Sub-Grupo" <?php if (!empty(old('subgrupo'))) { ?>value="<?php echo old('subgrupo'); ?>"<?php } ?>>
			    </div>  

			    <div class="form-group">
				<label class="control-label">Auxiliares</label>
				<input type="number" class="form-control" name="auxiliares" id="auxiliares" placeholder="Auxiliares" <?php if (!empty(old('auxiliares'))) { ?>value="<?php echo old('auxiliares'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">Porte Anastésico</label>
				<input type="text" class="form-control decimal" name="porte_anastesico" id="porte_anastesico" placeholder="Porte Anastésico" <?php if (!empty(old('porte_anastesico'))) { ?>value="<?php echo old('porte_anastesico'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">CRR</label>
				<input type="text" class="form-control decimal" name="crr" id="crr" placeholder="CRR" <?php if (!empty(old('crr'))) { ?>value="<?php echo old('crr'); ?>"<?php } ?>>
			    </div>

			</div>
			<!-- FIM COL-XS-12 -->



			<!-- INICIO COL-XS-12 (COLUNA 2) -->
			<div class="col-xs-12 col-sm-4">

			    <div class="form-group">
				<label class="control-label">Sexo</label>
				<select class="form-control" name="sexo" id="sexo">
				    <option value="">Selecione uma opção</option>
				    <option value="3" <?php if (old('sexo') == 3) { echo "selected"; } ?>>Ambos</option>
				    <option value="2" <?php if (old('sexo') == 2) { echo "selected";} ?>>Feminino</option>
				    <option value="1" <?php if (old('sexo') == 1) { echo "selected";} ?>>Masculino</option>
				</select>
			    </div>

			    <div class="form-group">
				<label class="control-label">Código</label>
				<input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" <?php if (!empty(old('codigo'))) { ?>value="<?php echo old('codigo'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">Código Interno</label>
				<input type="text" class="form-control" name="codigo_interno" id="codigo_interno" placeholder="Código Interno" <?php if (!empty(old('codigo_interno'))) { ?>value="<?php echo old('codigo_interno'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">Deflator</label>
				<input type="text" class="form-control decimal" name="deflator" id="deflator" placeholder="Deflator" <?php if (!empty(old('deflator'))) { ?>value="<?php echo old('deflator'); ?>"<?php } ?>>
			    </div>  

			    <div class="form-group">
				<label class="control-label">Incidência</label>
				<input type="number" class="form-control" name="incidencia" id="incidencia" placeholder="Incidência" <?php if (!empty(old('incidencia'))) { ?>value="<?php echo old('incidencia'); ?>"<?php } ?>>
			    </div> 

			    <div class="form-group">
				<label class="control-label">Custo Operacional</label>
				<input type="text" class="form-control decimal" name="custo_operacional" id="custo_operacional" placeholder="Custo Operacional" <?php if (!empty(old('custo_operacional'))) { ?>value="<?php echo old('custo_operacional'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">CH</label>
				<input type="number" class="form-control" name="ch" id="ch" placeholder="CH" <?php if (!empty(old('ch'))) { ?>value="<?php echo old('ch'); ?>"<?php } ?>>
			    </div>

			</div>
			<!-- FIM COL-XS-12 -->


			<!-- INICIO COL-XS-12 (COLUNA 3) -->
			<div class="col-xs-12 col-sm-4">

			    <div class="form-group">
				<label class="control-label">Descrição</label>
				<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" <?php if (!empty(old('descricao'))) { ?>value="<?php echo old('descricao'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">Capítulo</label>
				<input type="text" class="form-control" name="capitulo" id="capitulo" placeholder="Capítulo" <?php if (!empty(old('capitulo'))) { ?>value="<?php echo old('capitulo'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">Grupo</label>
				<input type="text" class="form-control" name="grupo" id="grupo" placeholder="Grupo" <?php if (!empty(old('grupo'))) { ?>value="<?php echo old('grupo'); ?>"<?php } ?>>
			    </div> 

			    <div class="form-group">
				<label class="control-label">Honorários</label>
				<input type="text" class="form-control decimal" name="honorarios" id="honorarios" placeholder="Honorários" <?php if (!empty(old('honorarios'))) { ?>value="<?php echo old('honorarios'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">CH Total</label>
				<input type="number" class="form-control" name="ch_total" id="ch_total" placeholder="CH Total" <?php if (!empty(old('ch_total'))) { ?>value="<?php echo old('ch_total'); ?>"<?php } ?>>
			    </div>

			    <!-- O Filme M2 está sendo valida pela função que permite caracteres no regex -->
			    <div class="form-group">
				<label class="control-label">Filme M2</label>
				<input type="text" class="form-control" name="filme_m2" id="filme_m2" placeholder="Filme M2" <?php if (!empty(old('filme_m2'))) { ?>value="<?php echo old('filme_m2'); ?>"<?php } ?>>
			    </div>

			    <div class="form-group">
				<label class="control-label">Sigla <span class="required-red">*</span></label></label>
				<input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" <?php if (!empty(old('sigla'))) { ?>value="<?php echo old('sigla'); ?>"<?php } ?>>
			    </div>

			</div>
			<!-- FIM COL-XS-12 -->

		    </div>
		    <!-- FIM LINHA -->	



		    <br /><br />				



		    <!-- INICIO LINHA -->
		    <div class="row">

			<div class="col-xs-12">

			    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Cadastrar</button>
			    <a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

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

<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="<?php echo asset('plugins/Inputmask-4.x/dist/jquery.inputmask.bundle.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/Inputmask-4.x/dist/inputmask/jquery.inputmask.js'); ?>"></script>

<script type="text/javascript">

// função para permitir apenas caracter informado no regex (Filme M2)
$("#filme_m2").on("input", function () {
    var regexp = /[^0-9.]/g; // -> Somente letras: /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ ]/g
    if (this.value.match(regexp)) {
	$(this).val(this.value.replace(regexp, ''));
    }
});

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR',
    weekStart: 0,
    endDate: '+5y',
    startDate: '0d',
    todayHighlight: true
});
</script>

@stop