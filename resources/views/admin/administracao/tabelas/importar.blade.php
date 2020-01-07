@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Importar Tabela
@stop

@section('conteudo')

<div class="page-title">
	<div class="title_left">
		<h3>Importar Tabela</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<div class="col-xs-12">
						<div class="alert alert-info">
							A utilização do campo "Consulta?" serve para identificar quais procedimentos são consultas. Para importar uma tabela com tais dados, informe 1 para informar que um procedimento é uma consulta e 0 para não identificá-lo como consulta.
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<form method="POST" action="{{ url('admin/painel/tabelas/importar') }}" enctype="multipart/form-data" id="form_upload">
							<div class="form-group">
								<h4><b>Upload da Tabela:</b></h4>
								<input type="file" class="form-control" name="tabela" id="file_tabela">
							</div>
							<div class="form-group" id="botoes_importacao">
								<button type="submit" class="btn btn-primary pull-right" id="botao_importar"><i class="fa fa-cloud-upload"></i> Importar</button>
							</div>
						</form>
					</div>
					<div class="col-sm-6 col-xs-12">
						<h4><b>Instruções:</b></h4>
						<p>* Clique para importar uma tabela em qualquer formato excel.</p>
						<p>* A primeira linha de cabeçalhos será ignorada, portanto você não pode deixar nenhum valor que queira importar na primeira linha, apenas o cabeçalho.</p>
						<p>* Em seguida selecione na tabela prévia qual coluna corresponde a cada campo.</p>
						<p>* Clique em concluir importação para enviar os procedimentos ao sistema.</p>
					</div>
					<div class="col-xs-12">
						<div id="div_botao_confirmar_importacao" class="text-center">

						</div>
						<table class="table table-striped table-bordered tabela">
							<thead>
								<tr id="head_tabela">

								</tr>
							</thead>
							<tbody id="body_tabela">

							</tbody>
						</table>
					</div>
					<div class="clearfix"></div>
					<hr>
					<div class="col-xs-12">
						<a href="{{ url(Request::segment(1).'/visualizar/'.Request::segment(3)) }}" class="btn btn-default pull-right">Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<select class="form-control selects_campos hidden" name="linha_1" id="select_modelo" onchange="verificaSelect(this)">
	<option value="0">Não atribuído</option>
	
	@if(in_array('codigo', $tabela->toArray()))
		<option value="codigo">Cód.</option>
	@endif
	@if(in_array('codigo_interno', $tabela->toArray()))
		<option value="codigo_interno">Cód. Interno</option>
	@endif
	@if(in_array('descricao', $tabela->toArray()))
		<option value="descricao">Descrição</option>
	@endif
	@if(in_array('capitulo', $tabela->toArray()))
		<option value="capitulo">Capítulo</option>
	@endif
	@if(in_array('grupo', $tabela->toArray()))
		<option value="grupo">Grupo</option>
	@endif
	@if(in_array('sub_grupo', $tabela->toArray()))
		<option value="sub_grupo">Sub-Grupo</option>
	@endif
	@if(in_array('ch', $tabela->toArray()))
		<option value="ch">Qtd. CH</option>
	@endif
	@if(in_array('metro_filme', $tabela->toArray()))
		<option value="metro_filme">m² Filme</option>
	@endif
	@if(in_array('porte', $tabela->toArray()))
		<option value="porte">Porte</option>
	@endif
	@if(in_array('valor_porte', $tabela->toArray()))
		<option value="valor_porte">Valor Porte</option>
	@endif
	@if(in_array('honorarios', $tabela->toArray()))
		<option value="honorarios">Honorários</option>
	@endif
	@if(in_array('auxiliares', $tabela->toArray()))
		<option value="auxiliares">Auxiliares</option>
	@endif
	@if(in_array('incidencia', $tabela->toArray()))
		<option value="incidencia">Incidência</option>
	@endif
	@if(in_array('valor_uco', $tabela->toArray()))
		<option value="valor_uco">Valor UCO</option>
	@endif
	@if(in_array('valor_rs', $tabela->toArray()))
		<option value="valor_rs">Valor de Custo</option>
	@endif
	@if(in_array('valor_venda', $tabela->toArray()))
		<option value="valor_venda">Valor de Venda</option>
	@endif
	@if($tabela->campos_adicionais && $tabela->campos_adicionais->count())
		@foreach($tabela->campos_tabela as $campo_adicional)
			<option value="adicional_{{ $campo_adicional->cod_campo }}">{{ $campo_adicional->nome }}</option>
		@endforeach
	@endif
</select>

<input type="hidden" id="cod_tabela" value="{{ $tabela->cod_tabela }}">

@stop

@section('includes_no_body')

<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
	var cod_tabela = $("#cod_tabela").val();
	var campos_tabela = "";
	var array_campos_select = [];
	var array_campos_selecionados = [];

	$("#select_modelo option").each(function(index, value) {
		if ($(value).val() != 0) {
			array_campos_select.push($(value).val());
		};
	});

	function verificaSelect(select){
		array_campos_selecionados = [];

		$(".selects_campos").each(function(index, value) {
			if (array_campos_selecionados.indexOf($(value).val()) === -1) {
				if ($(value).val() != 0) {
					array_campos_selecionados.push($(value).val());
				};
			}else{
				$(value).val(0);
				alert("Este campo já foi selecionado!");
			}
				
		});
	}

	$.ajax( {
	    url: "{{ url('admin/painel/tabelas/json_campos') }}",
	    data: {'cod_tabela' : cod_tabela},
	    type: 'POST',
	    dataType: 'json',
	    async: false,
	    success: function(response){
	        campos_tabela = response;            
	    }
	});

	var count = 0;
	var count2 = 0;

	var options = {
		beforeSend: function(){
			$("#body_tabela").html('');
	    	$("#head_tabela").html('');

			$("#botao_importar").html('<i class="fa fa-spin fa-refresh"></i>');
			$("#botao_importar").attr('disabled', 'disabled');
		},
	    success: function(response) {
	        $(response).each(function(index, value) {
	        	$("#body_tabela").append("<tr id='linha_"+count+"'></td>");
	        	$.each(value, function(key, value) {
	        		if (count == 0) {
						$("#head_tabela").append("<td id='coluna_"+key+"' style='min-width:100px'></td>");
						$("#coluna_"+key).append($("#select_modelo").clone().removeClass('hidden'));
						count2++;
					};
					$("#linha_"+count).append('<td>'+value+'</td>');
				});
				
				count++;
	        });

	        count = 0;
	        count2 = 0;

	        $("#file_tabela").val('');
	        $("#botao_importar").html('<i class="fa fa-cloud-upload"></i> Importar outro Arquivo');
	        $("#botao_importar").removeAttr('disabled');

	        if($("#botao_confirmar_importacao").length){
	        	$("#botao_confirmar_importacao").remove();
	        }

	        $("#div_botao_confirmar_importacao").append('<button type="button" onclick="importar_banco()" class="btn btn-success btn-lg" id="botao_confirmar_importacao"><i class="fa fa-plus"></i> Concluir Importação</button>');
	    },
	    error: function(response){
	    	toastr.error("Ocorreu algum erro no upload desta tabela, tente novamente!","Erro!");

	    	console.log(response);

	    	$("#file_tabela").val('');
	    	$("#botao_importar").html('<i class="fa fa-cloud-upload"></i> Importar');
	    	$("#botao_importar").removeAttr('disabled');
	    }
	}; 

	$('#form_upload').ajaxForm(options);

	function importar_banco(){
		var array_keys_head = [];
		var array_values_body = [];
		var array_final = [];
		var array_temp = [];
		var temp;

		$.each($("#head_tabela td"), function(index, value) {
			$(value).children().each(function(index, value) {
				array_keys_head.push($(value).val());
			});
		});

		$.each($("#body_tabela tr"), function(index, value){
			count1 = 0;
			count2 = 0;
			var array_valores = [];
			$(value).children().each(function(index, value){
				array_valores.push($(value).html());
				count++;
			});

			array_values_body.push(array_valores);

			count2++;
		});

		/*$.each(array_values_body, function(index, value) {
			$.each(array_keys_head, function(index1, value1) {
				if (value1 != 0) {
					array_temp[value1] = value[index1];
				};
				array_temp['cod_tabela'] = $("#cod_tabela").val();
			});

			
			console.log(array_temp);

			array_final.push(array_temp);
			array_temp = [];
		});*/

		for(var y = 0; y < array_values_body.length; y++){
		   temp = {};
		   for(var i = 0; i < array_keys_head.length; i++){
		       temp[array_keys_head[i]] = array_values_body[y][i];
		   }

		   temp['cod_tabela'] = $("#cod_tabela").val();

		   delete temp[0];

		   array_final.push(temp);
		}

		var total_linhas = array_final.length;
		var contador_linhas = 0;

		$("#botao_confirmar_importacao").attr('disabled', 'disabled');
		$("#botao_confirmar_importacao").html("<span id='contador_linhas'>"+contador_linhas+"</span> de "+total_linhas+" arquivos enviados.");

		while (array_final.length > 0) {
			array_atual = array_final.splice(0,25);

			jQuery.ajax( {
				url: "{{ url('admin/painel/tabelas/importar_tabela') }}",
				data: {'procedimentos' : array_atual },
				type: 'POST',
				dataType: 'json',
				success: function(response){
					if (response.responseText == "Sucesso") {
						contador_linhas = contador_linhas + 25;
						if (contador_linhas > total_linhas) {
							$("#botao_confirmar_importacao").html('Importação concluída com sucesso!');

							window.setTimeout(function(){ 
								$("#botao_confirmar_importacao").remove(); 
								$("#body_tabela").html('');
	    						$("#head_tabela").html('');
							}, 3000);
						}else{
							$("#contador_linhas").text(contador_linhas);
						};
					}else{
						console.log(response);
					};
				},
				error: function(response){
					if (response.responseText == "Sucesso") {
						contador_linhas = contador_linhas + 25;
						if (contador_linhas > total_linhas) {
							$("#botao_confirmar_importacao").html('Importação concluída com sucesso!');

							window.setTimeout(function(){ 
								$("#botao_confirmar_importacao").remove(); 
								$("#body_tabela").html('');
	    						$("#head_tabela").html('');
							}, 3000);
						}else{
							$("#contador_linhas").text(contador_linhas);
						};
					}else{
						console.log(response);
					};
				}
			});
		}
	}
</script>
@stop
