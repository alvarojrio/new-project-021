@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Vendedores | Cadastrar
@stop

@section('includes_no_head')
	
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">

@stop

@section('conteudo')

<div class="page-title">
	<div class="title_left">
		<h3>Cadastrar Vendedor</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">

					<div class="form-group">

						<label class="control-label">Tipo de Cadastro</label>

						<select onchange="MostraInfoOuFormulario()" id="selecionar_tipo" class="form-control">

							<option value="0" selected="selected">Selecione..</option> 
							<option value="1"> Cadastrar Novo </option>	
							<option value="2"> Escolher um Funcionário Ativo </option>	

						</select>

					</div>

					<hr>

					<form class="hidden" method="POST" id="form_vendedor" action="<?php echo url('admin/painel/vendedores/cadastrar');?>" enctype="multipart/form-data" onsubmit="return validaCampos()">
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
						<div class="col-md-6 col-xs-12">
							<div class="panel panel-default">
								<div class="panel-heading">Dados Básicos</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<div class="row">
													<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
														<label class="control-label">Foto</label>
														<div class="webcam-grid">
															<a class="btn btn-primary webcam" title="Tire uma foto com a Webcam" data-toggle="modal" data-target="#modal-webcam"><span><i class="fa fa-video-camera" aria-hidden="true"></i></span></a>
															<a class="btn btn-danger clear-foto" title="Limpar Foto"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a>
														</div>

														<!-- Modal da Webcam -->
														<div class="modal fade" id="modal-webcam" data-backdrop="static">
										                  <div class="modal-dialog modal-md">
										                    <div class="modal-content">
										                      <div class="modal-header">
						                        <button onClick="close_snapshot();" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																		<strong><h2 class="modal-title">Tire a foto com a Webcam</h2></strong>
										                      </div>
										                      <div class="modal-body">
										                        <div class="row">
										                          <div class="col-md-12">
																	<div id="my_camera" class="center-block"><!-- Aqui está a Camera --></div>
																	<br />
																	</div>
																</div>
																		<div class="row">
																			<div class="col-md-12">
																				<div align="center">
																					<a href="javascript:void(take_snapshot());" type="button" class="btn btn-sm btn-primary">Tirar Foto</a>
																					<a href="javascript:void(clear_snapshot());" type="button" class="btn btn-sm btn-info">Nova Foto</a>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<a type="button" href="#" onClick="save_snapshot();" data-dismiss="modal" class="btn btn-success">Salvar Foto</a>
																		<a type="button" href="#" onClick="close_snapshot();" data-dismiss="modal" class="btn btn-danger">Cancelar</a>
																	</div>
																</div>
															</div>
														</div>
														<!-- Fim Modal da WebCam -->

														<div id="imagem" class="thumbnail preview-imagem" onclick="document.getElementById('foto').click()">
															<img id="thumb" class="img-responsive"></img>
														</div>
														<input type="file" name="foto" id="foto" class="hidden">
													</div>
													<div class="col-lg-8 col-md-6 col-sm-8 col-xs-12">
														<div class="form-group">
															<label class="control-label">Nome <span class="required-red">*</span></label>
															<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ old('nome') }}" required>
														</div>
														<div class="form-group">
															<label class="control-label">CPF <span class="required-red">*</span></label>
															<input type="text" class="form-control cpf" name="cpf" id="cpf" placeholder="CPF" value="{{ old('cpf') }}" minlength="14" onblur="return validaCampos()" required>
														</div>
														<div class="form-group">
															<label class="control-label">RG</label>
															<input type="text" class="form-control" name="rg" id="rg" placeholder="RG" value="{{ old('rg') }}">
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Telefone</label>
												<input type="tel" class="form-control telefone" name="telefone" id="telefone" placeholder="Telefone" value="{{ old('telefone') }}">
											</div>
											<div class="form-group">
												<label class="control-label">E-mail</label>
												<input type="text" class="form-control" name="email" id="email" placeholder="E-mail" value="{{ old('email') }}">
											</div>
											<div class="form-group">
												<label class="control-label">Usuário <span class="required-red">*</span></label>
												<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário de login" value="{{ old('usuario') }}" required>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="panel panel-default">
								<div class="panel-heading">Endereço</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label">CEP</label>
										<input type="text" class="form-control cep" name="cep" id="cep" placeholder="CEP" onblur="puxaEndereco()" value="{{ old('cep') }}" minlength="9">
									</div>
									<div class="form-group">
										<label class="control-label">Estado</label>
										<select class="form-control" name="cod_estado" id="cod_estado" onchange="buscaCidades()">
											@foreach($estados as $estado)
												<option value="{{ $estado->cod_estado }}" <?php if(old('estado') == $estado->cod_estado){ echo "selected"; }?>>{{ $estado->nome }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">Cidade</label>
										<select class="form-control" name="cod_cidade" id="cod_cidade">
											<option value="0">Selecione um estado primeiro...</option>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">Logradouro</label>
										<input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" value="{{ old('logradouro') }}">
									</div>
									<div class="form-group">
										<label class="control-label">Número</label>
										<input type="text" class="form-control" name="numero" id="numero" placeholder="Número do edifício" value="{{ old('numero') }}">
									</div>
									<div class="form-group">
										<label class="control-label">Complemento</label>
										<input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{ old('complemento') }}">
									</div>
									<div class="form-group">
										<label class="control-label">Bairro</label>
										<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="{{ old('bairro') }}">
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">Sobre as Vendas</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label">Comissão (%)</label>
										<input type="number" class="form-control" name="comissao" id="comissao" placeholder="Comissão" value="{{ old('comissao') }}">
									</div>
									<div class="form-group">
										<label class="control-label">Selecione o Tipo de Venda</label>
										<select class="form-control" name="tipo_venda">
											<option value="" selected="selected"> -- Selecione o Tipo -- </option>
											<option value="1"> Externa </option>
											<option value="2"> Interna </option> 
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-12">
							<button type="button" class="btn btn-success pull-right" onclick="validacao()"><i class="fa fa-plus"></i> Cadastrar</button>
							<a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right">Voltar</a>
						</div>
					</form>

					<div id="selecionar_funcionario" class="form-group hidden">

						<label class="control-label">Selecione um Funcionário Existente</label>

						<select onchange="MostrarDadosFuncionario()" class="form-control" name="funcionario_existente">

							<option value="" selected="selected"> -- Selecione um Funcionário -- </option> 
								
							@foreach($funcionarios as $funcionario)

								<option value="{{ $funcionario->cod_funcionario }}">{{ $funcionario->nome }}</option>	

							@endforeach

						</select>

						<div id="dados_funcionario">
							
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/valida_cpf_cnpj.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/fullcalendar/lib/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/webcamjs/webcam.min.js') }}"></script>

<script type="text/javascript">

	function MostraInfoOuFormulario() {

		var opcao = $('#selecionar_tipo option:selected').val();

		if(opcao == 1){

			$('#form_vendedor').removeClass('hidden');
			$('#selecionar_funcionario').addClass('hidden');

		} else if(opcao == 2) {

			$('#selecionar_funcionario').removeClass('hidden');
			$('#form_vendedor').addClass('hidden');

		} else {

			$('#selecionar_funcionario').addClass('hidden');
			$('#form_vendedor').addClass('hidden');
		}

	}

	function MostrarDadosFuncionario() {

		var x = $('#selecionar_funcionario option:selected').val();

		if(x != null){

			var html_funcionario = "";

			html_funcionario += '<br />';
			html_funcionario += '<div class="col-lg-8 col-md-6 col-sm-8 col-xs-12">';
			html_funcionario += '<div class="form-group">';
			html_funcionario += '<label id="nome_func" class="control-label">Nome: </label>';
			html_funcionario += '</div>';
			html_funcionario += '<div class="form-group">';
			html_funcionario += '<label id="cpf_func" class="control-label">CPF: </label>';
			html_funcionario += '</div>';
			html_funcionario += '<div class="form-group">';
			html_funcionario += '<label id="rg_func" class="control-label">RG: </label>';
			html_funcionario += '</div>';
			html_funcionario += '</div>';
			html_funcionario += '<br />';
			html_funcionario += '<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 text-right">'
			html_funcionario += '<button type="button" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Salvar Vendedor</button>';
			html_funcionario += '</div>'

			$.ajax({

				url: "<?php echo url('admin/painel/vendedores/buscaFuncionario/'); ?>",
	    	    data: {'cod_funcionario' : x},
	    	    type: 'POST',
	    	    dataType: 'json',
	    	    async: false,
	    	    success: function(response){

	    	    	document.getElementById("dados_funcionario").innerHTML = (html_funcionario);
	    	    	document.getElementById('nome_func').innerHTML += response.nome;
	    	    	document.getElementById('cpf_func').innerHTML += response.cpf;
	    	    	document.getElementById('rg_func').innerHTML += response.rg;

	    	        
	    	    }

			});

		}

	}

	$(".select2_multiple").select2({
        placeholder: "Selecione as unidades",
        allowClear: true
    });

    $('.datepicker').datepicker({
    	format: 'dd/mm/yyyy',
    	language: 'pt-BR',
    	weekStart: 0,
    	startDate: '-117y',
    	todayHighlight: true
    });

    $(".timepicker").timepicker({
        showMeridian: false,
        showSeconds: true,
        defaultTime: '',
        template: false
    }).on('hide.timepicker', function(e) {
    	if(e.time.hours == 0){
	    	e.currentTarget.value = "";
		}
	});

    function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#thumb').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }else{
	    	$('#thumb').attr('src', '');
	    }
	}

	$("#foto").change(function(){
	    readURL(this);
	});

    verificaPermissao();

    function verificaPermissao(){
    	var permissao = $("#permissao option:selected").val();

    	if (permissao == 1) {
    		$("#div_caixa").removeClass('hidden');

    		$("#desconto_maximo").attr('required', 'required');
    		$("#conta").attr('required', 'required');
    	}else{
    		$("#div_caixa").addClass('hidden');

    		$("#desconto_maximo").removeAttr('required');
    		$("#conta").removeAttr('required');

    		$("#desconto_maximo").val('');
    		$("#conta").val('');
    	};

    	if (permissao == 5) {
    		$("#div_cobrador").removeClass('hidden');

    		$('#comissao').attr('required', 'required');
    	}else{
    		$("#div_cobrador").addClass('hidden');

    		$("#comissao").removeAttr('required');
    		$("#comissao").val('');
    	};
    }

	function puxaEndereco(){
		var cep = $("#cep").val();
	    var cep = cep.replace(/\D/g, '');

	    if (cep != "") {
	        var validacep = /^[0-9]{8}$/;

	        if(validacep.test(cep)) {

	            $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
	                if (!("erro" in dados)) {
	                	$.ajax( {
	                	    url: "{{ url('admin/painel/funcionarios/buscaEstadoCep') }}",
	                	    data: {'uf' : dados.uf},
	                	    type: 'POST',
	                	    dataType: 'json',
	                	    async: false,
	                	    success: function(response){
	                	        $("#cod_estado option[value='"+response.cod_estado+"']").prop('selected', true);
	                	        buscaCidades();
	                	    }
	                	});

	                    $("#numero").focus();

	                	if (dados.logradouro != "") {
	                    	$("#logradouro").val(dados.logradouro);
	                    }else{
	                    	$("#logradouro").focus();
	                    };
	                    if (dados.complemento != "") {
	                    	$("#complemento").val(dados.complemento);
	                    };
	                    if (dados.bairro != "") {
	                    	$("#bairro").val(dados.bairro);
	                    };

                    	$.ajax( {
	                	    url: "{{ url('admin/painel/funcionarios/buscaCidadeCep') }}",
	                	    data: {'nome' : dados.localidade},
	                	    type: 'POST',
	                	    dataType: 'json',
	                	    success: function(response){
	                	        $("#cod_cidade option[value='"+response.cod_cidade+"']").prop('selected', true);
	                	    }
	                	});
	                }else {
	                    alert('CEP não encontrado!');
	                }
	            });
	        }
	        else {
	            alert('Formato de CEP inválido!');
	        }
	    }
	}

	buscaCidades();

	function buscaCidades(idEstado){
		var cod_estado = $("#cod_estado option:selected").val();

		if("{{ old('cidade') }}" != ""){
			var old_cidade = "{{ old('cidade') }}";
		}

		$.ajax( {
		    url: "{{ url('admin/painel/funcionarios/buscaCidades') }}",
		    data: {'cod_estado' : cod_estado},
		    type: 'POST',
		    dataType: 'json',
		    success: function(response){
		    	$("#cod_cidade").html('');
		        $(response).each(function(index, value) {
		        	if (old_cidade) {
		        		$("#cod_cidade").append("<option value='"+value.cod_cidade+"'>"+value.nome+"</option>");
		        		if (old_cidade == value.cod_cidade) {
		        			$("#cod_cidade option[value='"+old_cidade+"']").prop('selected', true);
		        		};
		        	}else{
		        		$("#cod_cidade").append("<option value='"+value.cod_cidade+"'>"+value.nome+"</option>");
		        	};
		        });
		    },
		    error: function(response){
		        alert('Tente novamente mais tarde!');
		    }
		} );
	}

	function validaCampos(){
        var cpf_cnpj = $("#cpf").val();

        $("#alert-validacao").remove();

        if (cpf_cnpj != "") {
	        if (valida_cpf_cnpj(cpf_cnpj)) {
	        	$.ajax( {
	        	    url: "{{ url('admin/painel/funcionarios/check_cpf') }}",
	        	    data: {'cpf' : cpf_cnpj},
	        	    type: 'POST',
	        	    dataType: 'json',
	        	    success: function(response){
	        	        if(response != false){
	        	        	$('html,body').scrollTop(0);
	        	        	$("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>O funcionário de ID "+response.cod_funcionario+" já está cadastrado com esse CPF. <a class='btn btn-xs btn-info' href='{{ url('admin/painel/funcionarios/visualizar/') }}"+'/'+response.cod_funcionario+"'>Visualizar</a></li></ul></div></div>");
	        	        	return false;
	        	        }else{
	        	        	return true;
	        	        }
	        	    }
	        	} );
	        } else {
	        	$('html,body').scrollTop(0);
	        	$("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>CPF inválido.</li></ul></div></div>");
	            return false;
	        }
    	};
	}

	
	// Parâmetros e Funções para Capturar foto da WebCam
	// Inicializar Webcam
	$('.webcam').click('click', function(){
			Webcam.attach('#my_camera');

			// Em caso de Erro
			Webcam.on('error', function(){
				alert('Ocorreu um Erro! A Webcam não foi encontrada.');
				$('.modal').modal('hide');
			});
	});

	//Limpar Campo de Foto
	$('.clear-foto').click('click', function(){
			$('#thumb').removeAttr('src');
			$('#foto-webcam').remove();
			$('.clear-foto').hide();
	});

	// Predefinições da Webcam na Tela
	Webcam.set({
			width: 326,
			height: 246,
			dest_width: 320,
			dest_height: 240,
			image_format: 'jpeg',
			jpeg_quality: 100,
			force_flash: false,
			flip_horiz: true,
			fps: 45
	});

	// Pausar Câmera para caprtura
	function take_snapshot(){
		Webcam.freeze();
	}

	// Despausar Câmera para nova foto
	function clear_snapshot(){
		Webcam.unfreeze();
	}

	// Desligar Câmera
	function close_snapshot(){
		Webcam.reset();
	}

	// Realizar o salvamento da imagem via ajax e retorna a mesma na tela
	function save_snapshot(){
		Webcam.snap( function(data_uri) {

			$.ajax({
					url:"{{ url('admin/painel/funcionarios/imagem_webcam') }}",
					data: {'data_uri': data_uri},
					type: "POST",
					dataType: 'json',
					success: function(imagem){
						if (imagem != false){
							$('#thumb').attr('src', '<?php echo URL::asset('images/funcionarios') . "/"; ?>'+ imagem.name_file);
							document.getElementById('imagem').innerHTML += "<input id='foto-webcam' type='hidden' value='"+ imagem.name_file +"' name='foto_webcam' />";
							$('.clear-foto').show();
						}
					},
					error: function(){
						alert("OPS! Ocorreu um erro.\n\nA foto não pode ser processada. Tente novamente!");
					}
			});
		});

		close_snapshot();
	}
	// Fim dos Parâmetros e Funções para Capturar foto da WebCam

</script>
@stop
