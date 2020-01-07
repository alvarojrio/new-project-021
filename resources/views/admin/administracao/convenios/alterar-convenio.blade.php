@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Convênios | Alterar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
 
@stop

@section('conteudo')

{!! Breadcrumbs::render('convenios-alterar') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Alterar Convênio</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<form method="POST" action="<?php echo url('admin/painel/convenios/alterar-convenio/');?>" enctype="multipart/form-data">
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
								<input type="text" class="form-control" name="razao_social" id="razao_social" placeholder="Razão Social" value="{{ $convenio->razao_social }}" maxlength="80">
							</div>
							<div class="form-group">
								<label class="control-label">Nome <span class="required-red">*</span></label>
								<input type="text" class="form-control" name="nome_convenio" id="nome_convenio" placeholder="Nome" value="{{ $convenio->nome_convenio }}" maxlength="80">
							</div>
							<div class="form-group">
								<label class="control-label">CNPJ <span class="required-red">*</span></label>
                                                                <input type="text" class="form-control cnpj" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00" value="{{ $convenio->cnpj }}" minlength="18" onblur="return validaCampos()">
							</div>
							<div class="form-group">
								<label class="control-label">Código ANS</label>
								<input type="text" class="form-control" name="codigo_ans" id="codigo_ans" placeholder="Código ANS" value="{{ $convenio->codigo_ans }}" maxlength="10">
							</div>
							<div class="form-group">
								<label class="control-label">Inscrição Estadual <span class="required-red">*</span></label>
								<input type="text" class="form-control" name="inscricao_estadual" id="inscricao_estadual" placeholder="Inscrição Estadual" value="{{ $convenio->inscricao_estadual }}">
							</div>
							<div class="form-group">
								<label class="control-label">Código na Operadora <span class="required-red">*</span></label>
								<input type="text" class="form-control" name="codigo_operadora" id="codigo_operadora" placeholder="Código na Operadora" value="{{ $convenio->codigo_operadora }}">
							</div>
							<div class="form-group">
								<label class="control-label">Contratado <span class="required-red">*</span></label>
								<input type="text" class="form-control" name="contratado" id="contratado" placeholder="Contratado" value="{{ $convenio->contratado }}" maxlength="50">
							</div>
                                                        <div class="form-group">
								<label class="control-label">Telefone <span class="required-red"></span></label>
								<input type="tel" class="form-control telefone" name="telefone" id="telefone" placeholder="(00) 0000-0000" value="{{ $convenio->telefone }}">
							</div>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div class="form-group">
								<label class="control-label">Setor <span class="required-red"></span></label>
								<input type="text" class="form-control" name="setor" id="setor" placeholder="Informar o setor" value="{{ $convenio->setor }}" maxlength="200">
							</div>
                                                        <div class="form-group">
								<label class="control-label">CNES</label>
								<input type="text" class="form-control" name="cnes" id="cnes" placeholder="CNES" value="{{ $convenio->cnes }}" maxlength="10">
							</div>
							<div class="form-group">
								<label class="control-label">Tipo de Identificação <span class="required-red">*</span></label>
								<select class="form-control" name="tipo_identificacao" id="tipo_identificacao">
									<option value="1" <?php if($convenio->tipo_identificacao === 1){ echo "selected"; }?>>Código na Operadora</option>
									<option value="2" <?php if($convenio->tipo_identificacao === 2){ echo "selected"; }?>>CNPJ</option>
									<option value="3" <?php if($convenio->tipo_identificacao === 3){ echo "selected"; }?>>CPF</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Código Solicitante na Operadora <span class="required-red">*</span></label>
								<select class="form-control" name="codigo_solicitante_operadora" id="codigo_solicitante_operadora">
									<option value="1" <?php if($convenio->codigo_solicitante_operadora === 1){ echo "selected"; }?>>CRM Solicitante</option>
									<option value="2" <?php if($convenio->codigo_solicitante_operadora === 2){ echo "selected"; }?>>Cód/CNPJ Solicitante</option>
									<option value="3" <?php if($convenio->codigo_solicitante_operadora === 3){ echo "selected"; }?>>Código Operadora Prestador</option>
									<option value="4" <?php if($convenio->codigo_solicitante_operadora === 4){ echo "selected"; }?>>CNPJ Prestador</option>
								</select>
							</div>							
							<div class="form-group">
								<label class="control-label">Máscara das Carteirinhas</label>
								<input type="number" class="form-control" name="mascara_carteirinha" id="mascara_carteirinha" placeholder="Quantos dígitos a máscara da carteirinha possui?" value="{{ $convenio->mascara_carteirinha }}">
							</div>
							<div class="form-group">
								<label class="control-label">Logotipo</label> --
                                                                <a id="file_logotipo_1" href="#" data-toggle="modal" data-target="#modal_logotipo"><?php if($convenio->logotipo != null){ ?>  <img src="{{ asset('uploads/convenios/logotipos/'.$convenio->logotipo) }}" style="width:100px">  <?php } echo "<br/>Visualizar "; ?> </a> 
                                                                
                                                                <a onclick="return removerConteudo()">
                                                                    <?php if(!empty($convenio->logotipo == true)){ ?> 
                                                                        <font color="red">Remover</font> 
                                                                    <?php } ?>
                                                                </a>
                                                                
                                                                <!--<a href="#" onclick="return removerConteudo()"> <font color="red">Remover 2</font></a>--> 
                                                                
                                                                <input id="file_logotipo_2" type="file" class="form-control" name="logotipo" id="logotipo" value="{{$convenio->logotipo}}">
                                                                
							</div>
                                                        <div class="form-group">
								<label class="control-label">Aviso</label>
								<input type="text" class="form-control" name="aviso" id="aviso" placeholder="Aviso" value="{{ $convenio->aviso }}">
							</div>
                                                        <div class="form-group">
								<label class="control-label">CEP</label>
								<input type="text" class="form-control cep" name="cep" id="cep" placeholder="CEP" onblur="puxaEndereco()" value="{{ $convenio->cep }}">
							</div>
                                                        
						</div>
						<div class="col-sm-4 col-xs-12">
							
							<div class="form-group">
								<label class="control-label">Estado<span class="required-red">*</span></label>
								<select class="form-control" name="cod_estado" id="cod_estado" onchange="buscarCidades()">
									@foreach($estados as $estado)
                                                                        <option value="{{ $estado->cod_estado }}" <?php if($convenio->cod_estado == $estado->cod_estado){ echo "selected"; }?>>{{ $estado->nome_estado }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Cidade<span class="required-red">*</span></label>
								<select class="form-control" name="cod_cidade" id="cod_cidade">
									<option value="">...</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Bairro</label>
								<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="{{ $convenio->bairro }}">
							</div>
							<div class="form-group">
								<label class="control-label">Logradouro</label>
								<input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" value="{{ $convenio->logradouro }}">
							</div>
							<div class="form-group">
								<label class="control-label">Número</label>
								<input type="text" class="form-control" name="numero" id="numero" placeholder="Número do edifício" value="{{ $convenio->numero }}">
							</div>
							<div class="form-group">
								<label class="control-label">Complemento</label>
								<input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{ $convenio->complemento }}">
							</div>
                                                        <div class="form-group">
                                                            <label class="control-label">Auto Gestão <span class="required-red">*</span></label>
                                                            <br/>
                                                            <input type="radio" name="auto_gestao" id="auto_gestao_sim" value="1" <?php if($convenio->auto_gestao == 1){?> checked <?php } ?>>
                                                            <label class="control-label">Sim</label>
                                                        
                                                            <input type="radio" name="auto_gestao" id="auto_gestao_nao" value="0" <?php if($convenio->auto_gestao == 0){?> checked <?php } ?>>
                                                            <label class="control-label">Não</label>
                                                        </div>
                                                        <div class="form-group" id="div_suspender">
								<label class="control-label">Suspender</label>
								<input type="text" class="form-control" name="suspender" id="suspender" placeholder="Quantidade de dias" value="{{ $convenio->suspender }}">
							</div>
                                                        
						</div>
						<div class="col-xs-12">
                                                    <input type="hidden" id="cod_convenio" name="cod_convenio" value="<?php echo $codigo_convenio; ?>" />
                                                    <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                                    <a class="btn btn-default pull-right" href="{{ url('admin/painel/convenios/') }}"> <i class="fas fa-arrow-circle-left"></i> Voltar</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_logotipo" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Logotipo do Convênio</h4>
            </div>
            <div class="modal-body">
            	<div class="text-center">
                    
                    @if (file_exists(public_path('uploads/convenios/logotipos/'.$convenio->logotipo)))
                        <img src="{{ asset('uploads/convenios/logotipos/'.$convenio->logotipo) }}" style="max-width:100%">
                    @else
                        Não existe imagem!
                    @endif
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/valida_cpf_cnpj.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.form.js') }}"></script>
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

        <?php if($convenio->auto_gestao == 1) { ?> 

            // Chamo a função ..
            $('#div_suspender').show('fast');

        <?php } ?>

});

function removerConteudo() {
    var elemento1=document.getElementById("file_logotipo_1");
    var elemento2=document.getElementById("file_logotipo_2");
    elemento1.remove();
    elemento2.remove();
}


// Mascaras     
$(".cnpj").mask('00.000.000/0000-00');
$(".telefone").mask('(00) 0000-00000');
$(".cep").mask('00000-000');

// Verificando se havia um cep antes.. 
<?php if(!empty($convenio->cep)) { ?> 
    // Chamo a função ..
    puxaEndereco();
    
<?php }elseif(empty($convenio->cep)){ ?> 
    
    // Chamo a função caso tenha um id de estado  
    <?php if($convenio->cod_estado > 0){ ?>

          buscarCidades("{{ $convenio->cod_estado }}","{{ $convenio->cod_cidade }}");

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
  
  $.ajax({
    url: "{{ url('admin/painel/buscar-cidades') }}",
    data: {'cod_estado': cod_estado},
    type: 'POST',
    dataType: 'json',
    success: function (response) {
      $("#cod_cidade").html('');
      $(response).each(function (index, value) {
        if (cod_cidade_search > 0 ) {
            // 1º Populando cidades ... 
            $("#cod_cidade").append("<option value='" + value.cod_cidade + "'>" + value.nome_cidade + "</option>");          
          
          // Verificando id para por selected    
          if (cod_cidade_search == value.cod_cidade) {
              
            $("#cod_cidade option[value='" + cod_cidade_search + "']").prop('selected', true);
          }
          
        }else{
           // If different: popula normalmente .. 
          $("#cod_cidade").append("<option value='" + value.cod_cidade + "'>" + value.nome_cidade + "</option>");
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
</script>
@stop