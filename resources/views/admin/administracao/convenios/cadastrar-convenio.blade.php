@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Convênios | Cadastrar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/admin/administracao/convenios/convenios-cadastrar.css') }}">

@stop

@section('conteudo')

{!! Breadcrumbs::render('convenios-cadastrar') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Cadastrar Convênio</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<form method="POST" action="<?php echo url('admin/painel/convenios/cadastrar-convenio');?>" enctype="multipart/form-data" id="form_convenio">
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
						<div class="col-sm-4 col-xs-12">
							<div class="form-group">
								<label class="control-label">Razão Social <span class="required-red">*</span></label>
								<input type="text" class="form-control" name="razao_social" id="razao_social" placeholder="Razão Social" <?php if (!empty(old('razao_social'))) { ?>value="<?php echo old('razao_social'); ?>"<?php } ?>>
							</div>
							<div class="form-group">
								<label class="control-label">Nome Fantasia<span class="required-red">*</span></label>
								<input type="text" class="form-control" name="nome_convenio" id="nome_convenio" placeholder="Nome" <?php if (!empty(old('nome_convenio'))) { ?>value="<?php echo old('nome_convenio'); ?>"<?php } ?>>
							</div>
							<div class="form-group">
								<label class="control-label">CNPJ <span class="required-red">*</span></label>
                                                                <input type="text" class="form-control cnpj" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00" <?php if (!empty(old('cnpj'))) { ?>value="<?php echo old('cnpj'); ?>"<?php } ?> minlength="18" onblur="return validaCampos()">							</div>
							<div class="form-group">
								<label class="control-label">Código ANS</label>
								<input type="text" class="form-control" name="codigo_ans" id="codigo_ans" placeholder="Código ANS" <?php if (!empty(old('codigo_ans'))) { ?>value="<?php echo old('codigo_ans'); ?>"<?php } ?>>
							</div>
							<div class="form-group">
								<label class="control-label">Inscrição Estadual <span class="required-red">*</span></label>
								<input type="text" class="form-control" name="inscricao_estadual" id="inscricao_estadual" placeholder="Inscrição Estadual" <?php if (!empty(old('inscricao_estadual'))) { ?>value="<?php echo old('inscricao_estadual'); ?>"<?php } ?>>
							</div>
							<div class="form-group">
								<label class="control-label">Código na Operadora <span class="required-red">*</span></label>
								<input type="text" class="form-control" name="codigo_operadora" id="codigo_operadora" placeholder="Código na Operadora" <?php if (!empty(old('codigo_operadora'))) { ?>value="<?php echo old('codigo_operadora'); ?>"<?php } ?>>
							</div>
							<div class="form-group">
								<label class="control-label">Contratado <span class="required-red">*</span></label>
								<input type="text" class="form-control" name="contratado" id="contratado" placeholder="Contratado" <?php if (!empty(old('contratado'))) { ?>value="<?php echo old('contratado'); ?>"<?php } ?>>
							</div>
                                                        <div class="form-group">
								<label class="control-label">Telefone <span class="required-red"></span></label>
                                                                <input type="tel" class="form-control telefone" name="telefone" id="telefone" placeholder="(00) 0000-0000" <?php if (!empty(old('telefone'))) { ?>value="<?php echo old('telefone'); ?>"<?php } ?>>
							</div>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div class="form-group">
								<label class="control-label">Setor <span class="required-red"></span></label>
								<input type="text" class="form-control" name="setor" id="setor" placeholder="Informar o setor" <?php if (!empty(old('setor'))) { ?>value="<?php echo old('setor'); ?>"<?php } ?>>
							</div>
                                                        <div class="form-group">
								<label class="control-label">CNES</label>
								<input type="text" class="form-control" name="cnes" id="cnes" placeholder="CNES" <?php if (!empty(old('cnes'))) { ?>value="<?php echo old('cnes'); ?>"<?php } ?>>
							</div>
							<div class="form-group">
								<label class="control-label">Tipo de Identificação <span class="required-red">*</span></label>
								<select class="form-control" name="tipo_identificacao" id="tipo_identificacao">  
                                                                    <option value="">Selecione a opção</option>
                                                                    <option value="1" <?php if(old('tipo_identificacao') == 1){ echo "selected"; }?>>Código na Operadora</option>
                                                                    <option value="2" <?php if(old('tipo_identificacao') == 2){ echo "selected"; }?>>CNPJ</option>
                                                                    <option value="3" <?php if(old('tipo_identificacao') == 3){ echo "selected"; }?>>CPF</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Código Solicitante na Operadora <span class="required-red">*</span></label>
								<select class="form-control" name="codigo_solicitante_operadora" id="codigo_solicitante_operadora">                                                                    
                                                                    <option value="">Selecione a opção</option>
                                                                    <option value="1" <?php if(old('codigo_solicitante_operadora') == 1){ echo "selected"; }?>>CRM Solicitante</option>
                                                                    <option value="2" <?php if(old('codigo_solicitante_operadora') == 2){ echo "selected"; }?>>Cód/CNPJ Solicitante</option>
                                                                    <option value="3" <?php if(old('codigo_solicitante_operadora') == 3){ echo "selected"; }?>>Código Operadora Prestador</option>
                                                                    <option value="4" <?php if(old('codigo_solicitante_operadora') == 4){ echo "selected"; }?>>CNPJ Prestador</option>
                                                                </select>
							</div>
							
							<div class="form-group">
								<label class="control-label">Máscara das Carteirinhas</label>
								<input type="number" class="form-control" name="mascara_carteirinha" id="mascara_carteirinha" placeholder="Quantos dígitos a máscara da carteirinha possui?" <?php if (!empty(old('mascara_carteirinha'))) { ?>value="<?php echo old('mascara_carteirinha'); ?>"<?php } ?>>
							</div>
							
                                                        <!--
                                                        <div class="form-group">
								<label class="control-label">Logotipo</label>
								<input type="file" class="form-control" name="logotipo" id="logotipo">
							</div>
                                                        -->                                                        
                                                    
                                                        <div class="form-group">
								<label class="control-label">Aviso</label>
								<input type="text" class="form-control" name="aviso" id="aviso" placeholder="Aviso" <?php if (!empty(old('aviso'))) { ?>value="<?php echo old('aviso'); ?>"<?php } ?>>
							</div>
                                                        <div class="form-group">
								<label class="control-label">CEP</label>
								<input type="text" class="form-control cep" name="cep" id="cep" placeholder="00000-000" onblur="puxaEndereco()" <?php if (!empty(old('cep'))) { ?>value="<?php echo old('cep'); ?>"<?php } ?>>
							</div>                                                        
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label">Logotipo</label>
                                                            <div class="row">    
                                                                <div class="col-md-12">  
                                                                  <!-- image-preview-filename input [CUT FROM HERE]-->
                                                                  <div class="input-group image-preview">
                                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                                    <span class="input-group-btn">
                                                                      <!-- image-preview-clear button -->
                                                                      <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                                        <span class="glyphicon glyphicon-remove"></span> Remover
                                                                      </button>
                                                                      <!-- image-preview-input -->
                                                                      <div class="btn btn-default image-preview-input">
                                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                                        <span class="image-preview-input-title">Procurar</span>
                                                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="logotipo"/> <!-- rename it -->
                                                                      </div>
                                                                    </span>
                                                                  </div><!-- /input-group image-preview [TO HERE]--> 
                                                                </div>
                                                              </div>
							</div>
                                                        
						</div>
						<div class="col-sm-4 col-xs-12">
							
							<div class="form-group">
								<label class="control-label">Estado <span class="required-red">*</span></label>
                                                                <select class="form-control" name="cod_estado" id="cod_estado" onchange="buscarCidades()">
									<option value="">Selecione..</option>
									@foreach($estados as $estado)
										<option value="{{ $estado->cod_estado }}" <?php if(old('cod_estado') == $estado->cod_estado){ echo "selected"; }?>>{{ $estado->nome_estado }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Cidade <span class="required-red">*</span></label>
                                                                <select class="form-control" name="cod_cidade" id="cod_cidade">
									<option value="">...</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Bairro</label>
								<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" <?php if (!empty(old('bairro'))) { ?>value="<?php echo old('bairro'); ?>"<?php } ?>>
							</div>
							<div class="form-group">
								<label class="control-label">Logradouro</label>
								<input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" <?php if (!empty(old('logradouro'))) { ?>value="<?php echo old('logradouro'); ?>"<?php } ?>>
							</div>
							<div class="form-group">
								<label class="control-label">Número</label>
								<input type="text" class="form-control" name="numero" id="numero" placeholder="Número do edifício" <?php if (!empty(old('numero'))) { ?>value="<?php echo old('numero'); ?>"<?php } ?>>
							</div>
							<div class="form-group">
								<label class="control-label">Complemento</label>
								<input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" <?php if (!empty(old('complemento'))) { ?>value="<?php echo old('complemento'); ?>"<?php } ?>>
							</div> 
                                                        <div class="form-group">
                                                            <label class="control-label">Auto Gestão <span class="required-red">*</span></label>
                                                            <br/>
                                                            <input type="radio" name="auto_gestao" id="auto_gestao_sim" value="1" <?php if(old('auto_gestao') == "1" ){ ?> checked="checked" <?php } ?> >
                                                            <label class="control-label">Sim</label>
                                                        
                                                            <input type="radio" name="auto_gestao" id="auto_gestao_nao" value="0" <?php if(old('auto_gestao') == "0"){ ?> checked="checked" <?php } ?>>
                                                            <label class="control-label">Não</label>
                                                        </div>
                                                        <div class="form-group" id="div_suspender">
								<label class="control-label">Suspender</label>
								<input type="text" class="form-control" name="suspender" id="suspender" placeholder="Quantidade de dias" <?php if (!empty(old('suspender'))) { ?>value="<?php echo old('suspender'); ?>"<?php } ?>>
							</div>
                                                        
                                                                                                               
						</div>
						<div class="col-xs-12">
							<button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>							                                                        
                                                        <a class="btn btn-default pull-right" href="{{ url('admin/painel/convenios/') }}"> <i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                                        
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/valida_cpf_cnpj.js') }}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    
/*::: FUNÇÃO PARA ESCONDER :::*/
	function esconder() {

		$('#div_suspender').hide();

	}
	
	/*::: Inicializa função :::*/
	esconder();
	
	/*::: ANIMAÇÃO DE EXIBIR/OCULTAR campo SUSPENDER (ATIVADAS ATRAVÉS DE RADIOBUTTONS) :::*/
	$('#auto_gestao_nao').click(function() {
		$('#div_suspender').hide('fast');
	});
	$('#auto_gestao_sim').click(function() {
		$('#div_suspender').show('fast');
	});

        <?php if(old('auto_gestao') == 1) { ?> 

            // Chamo a função ..
            $('#div_suspender').show('fast');

        <?php } ?>

});

// Mascaras     
$(".cnpj").mask('00.000.000/0000-00');
$(".telefone").mask('(00) 0000-00000');
$(".cep").mask('00000-000');

// Verificando se havia um cep antes.. 
<?php if(!empty(old('cep'))) { ?> 
    // Chamo a função ..
    puxaEndereco();
    
<?php }elseif(empty(old('cep'))){ ?> 
    
    // Chamo a função caso tenha um id de estado  
    <?php if(!empty(old('cod_estado')) > 0){ ?>

          buscarCidades("{{ old('cod_estado') }}","{{ old('cod_cidade') }}");

    <?php } ?>
        
<?php } ?> 
    

/*
# FUNÇÃO PARA PUXAR ENDEREÇO VIA CEP - ESTADO, CIDADE ETC..
*/ 
function puxaEndereco() {
        var cep = "";
        var cod_estado = "";
        var cep = $("#cep").val();
        var cep = cep.replace(/\D/g, '');

        if (cep != "") {
          var validacep = /^[0-9]{8}$/;

          if (validacep.test(cep)) {

            $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
              if (!("erro" in dados)) {
                $.ajax({
                  url: "{{ url('admin/painel/buscar-estado-por-cep') }}",
                  data: {'uf': dados.uf},
                  type: 'POST',
                  dataType: 'json',
                  async: false,
                  success: function (response) {
                    $("#cod_estado option[value='" + response.cod_estado + "']").prop('selected', true);
                    cod_estado = response.cod_estado;
                    /*
                     * CÓDIGO PARA IMPRIMIR (DEPURAÇÃO) DO ARRAY
                     * document.getElementById('whereToPrint').innerHTML = JSON.stringify(dados ,null, 4);
                     */
                  }
                });

                $("#numero").focus();

                if (dados.logradouro != "") {
                  $("#logradouro").val(dados.logradouro);
                } else {
                  $("#logradouro").focus();
                }
                /*if (dados.complemento != "") {
                  $("#complemento").val(dados.complemento);
                }*/
                if (dados.bairro != "") {
                  $("#bairro").val(dados.bairro);
                }

                $.ajax({
                  url: "{{ url('admin/painel/buscar-cidade-por-cep') }}",
                  data: {'cod_estado': cod_estado,'nome': dados.localidade},
                  type: 'POST',
                  dataType: 'json',
                  success: function (cidade) {
                    // Chamo a função de busca
                     buscarCidades(cod_estado, cidade.cod_cidade);
                     
                     /*
                     * CÓDIGO PARA IMPRIMIR (DEPURAÇÃO) DO ARRAY
                     * document.getElementById('whereToPrint').innerHTML = JSON.stringify(dados ,null, 4);
		     */
                  }
                });
              } else {
                alert('CEP não encontrado!');
              }
            });
          } else {
            alert('Formato de CEP inválido!');
          }
        }
    }
        
/*
 # FUNÇÃO PARA BUSCA CIDADES 
 */  

function buscarCidades(cod_estado, codCidadeSearch = null) {
    
  var cod_estado = $("#cod_estado option:selected").val();
  var cod_cidade_search = codCidadeSearch;

  if ("{{ old('cod_cidade') }}" != "") {
    var old_cidade = "{{ old('cod_cidade') }}";
  }

  $.ajax({
    url: "{{ url('admin/painel/buscar-cidades') }}",
    data: {'cod_estado': cod_estado},
    type: 'POST',
    dataType: 'json',
    success: function (response) {
      $("#cod_cidade").html('');
      $(response).each(function (index, value) {
        if (old_cidade) {
          $("#cod_cidade").append("<option value='" + value.cod_cidade + "'>" + value.nome + "</option>");
          if (old_cidade == value.cod_cidade) {
            $("#cod_cidade option[value='" + old_cidade + "']").prop('selected', true);
          }
        }else {
            if(cod_cidade_search === value.cod_cidade){
                
                $("#cod_cidade").append("<option value='" + value.cod_cidade + "' selected='selected'>" + value.nome_cidade + "</option>");
            }else{
                
                $("#cod_cidade").append("<option value='" + value.cod_cidade + "'>" + value.nome_cidade + "</option>");
            }
        }
      });
    },
    error: function (response) {
      // Alerta de erro
       alert('Falha! Atualize a página e tente novamente.');
    }
  });
}

/*
 # FUNÇÃO PARA VERIFICAR
 # SE O CNPJ É VÁLIDO
 */ 
    function validaCampos() {
        var cpf_cnpj = $("#cnpj").val();

       $("#alert-validacao").remove();

        if (cpf_cnpj != "") {
          if (!valida_cpf_cnpj(cpf_cnpj)){
            $('html,body').scrollTop(0);
            $("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>CNPJ inválido.</li></ul></div></div>");
            return false;
          }
        };
    }
        
                    /*
                    # FUNÇÃO PARA VIZUALIZAR PREVIEW DA IMAGEM (UPLOAD) 
                    */ 
                    $(document).on('click', '#close-preview', function () {
                      $('.image-preview').popover('hide');
                      // Hover befor close the preview
                      $('.image-preview').hover(
                              function () {
                                $('.image-preview').popover('show');
                              },
                              function () {
                                $('.image-preview').popover('hide');
                              }
                      );
                    });

                    $(function () {
                      // Create the close button
                      var closebtn = $('<button/>', {
                        type: "button",
                        text: 'x',
                        id: 'close-preview',
                        style: 'font-size: initial;',
                      });
                      closebtn.attr("class", "close pull-right");
                      // Set the popover default content
                      $('.image-preview').popover({
                        trigger: 'manual',
                        html: true,
                        title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
                        content: "Não há imagem",
                        placement: 'bottom'
                      });
                      // Clear event
                      $('.image-preview-clear').click(function () {
                        $('.image-preview').attr("data-content", "").popover('hide');
                        $('.image-preview-filename').val("");
                        $('.image-preview-clear').hide();
                        $('.image-preview-input input:file').val("");
                        $(".image-preview-input-title").text("Procurar");
                      });
                      // Create the preview image
                      $(".image-preview-input input:file").change(function () {
                        var img = $('<img/>', {
                          id: 'dynamic',
                          width: 150,
                          height: 150
                        });
                        var file = this.files[0];
                        var reader = new FileReader();
                        // Set preview image into the popover data-content
                        reader.onload = function (e) {
                          $(".image-preview-input-title").text("Alterar");
                          $(".image-preview-clear").show();
                          $(".image-preview-filename").val(file.name);
                          img.attr('src', e.target.result);
                          $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                        }
                        reader.readAsDataURL(file);
                      });
                    });

</script>
@stop