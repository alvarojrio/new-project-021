@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Unidades | Cadastrar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/admin/administracao/unidades/unidades-cadastrar.css') }}">

@stop

@section('conteudo')

{!! Breadcrumbs::render('unidades-cadastrar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Cadastrar Unidade</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <form method="POST" action="<?php echo url('admin/painel/unidades/cadastrar-unidade'); ?>" enctype="multipart/form-data" onsubmit="return validaCampos()">
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
            <div class="col-sm-6 col-xs-12">
                
                <div class="row">
                    <div class="form-group col-xs-12 col-xs-12 col-xs-12">
                        <label class="control-label">Nome da Unidade<span class="required-red">*</span></label>
                        <input type="text" autocomplete="off" class="form-control caixa_alta" name="nome_unidade" id="nome_unidade" placeholder="Nome" <?php if (!empty(old('nome_unidade'))) { ?>value="<?php echo old('nome_unidade'); ?>"<?php } ?> minlength="3" autofocus="off" autocomplete="off" required="required">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">CNPJ <span class="required-red">*</span></label>
                      <input type="text" class="form-control cnpj" name="cnpj" id="cnpj" placeholder="CNPJ da Unidade" <?php if (!empty(old('cnpj'))) { ?>value="<?php echo old('cnpj'); ?>"<?php } ?> minlength="18" onblur="validaCampos()" autocomplete="off" required="required">
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">Telefone <span class="required-red">*</span></label>
                      <input type="tel" autocomplete="off" class="form-control telefone" name="telefone" id="telefone" placeholder="(00) 0000-0000" <?php if (!empty(old('telefone'))) { ?>value="<?php echo old('telefone'); ?>"<?php } ?> minlength="8" autocomplete="off" required="required">
                    </div>
                </div>
                
                <div class="row">
                    
                  <div class="form-group col-lg-6 col-md-12 col-xs-12">
                    <label class="control-label">E-mail <span class="required-red">*</span></label>
                    <input type="text" autocomplete="off" class="form-control caixa_baixa" name="email" id="email" placeholder="E-mail" <?php if (!empty(old('email'))) { ?>value="<?php echo old('email'); ?>"<?php } ?> required>
                  </div>
                    
                  <div class="form-group col-lg-6 col-md-12 col-xs-12">
                    <label class="control-label">Resp. pela Unidade</label>
                    <input type="text" autocomplete="off" class="form-control caixa_alta" name="responsavel" id="responsavel" placeholder="Responsável pela Unidade" <?php if (!empty(old('responsavel'))) { ?>value="<?php echo old('responsavel'); ?>"<?php } ?>>
                  </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-xs-12">
                      <label class="control-label">Planos <span class="required-red">*</span></label>
                      <select class="form-control" name="planos[]" id="planos" multiple required>
                        @foreach($planos as $plano)
                        <option value="{{ $plano->cod_plano }}" <?php if (old('planos') != null && in_array($plano->cod_plano, old('planos'))) { echo "selected";} ?>>{{ $plano->nome_convenio.' - '.$plano->nome_plano }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>    
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="row">
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">CEP</label>
                      <input type="text" autocomplete="off" class="form-control cep" name="cep" id="cep" placeholder="CEP" onblur="puxaEndereco()" <?php if (!empty(old('cep'))) { ?>value="<?php echo old('cep'); ?>"<?php } ?> minlength="9">
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">Estado</label>
                      <select class="form-control" name="cod_estado" id="cod_estado" onchange="buscarCidades()">
                        <option value="">Selecione..</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->cod_estado }}" <?php if (old('cod_estado') == $estado->cod_estado) { echo "selected"; } ?>>{{ $estado->nome_estado }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">Cidade</label>
                      <select class="form-control" name="cod_cidade" id="cod_cidade">
                        <option value="0">Selecione um estado primeiro...</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Bairro</label>
                        <input type="text" autocomplete="off" class="form-control" name="bairro" id="bairro" placeholder="Bairro" <?php if (!empty(old('bairro'))) { ?>value="<?php echo old('bairro'); ?>"<?php } ?>>
                    </div>
                    
                </div>
                
                <div class="row">	
                  <div class="form-group col-lg-12 col-md-12 col-xs-12">
                    <label class="control-label">Logradouro</label>
                    <input type="text" autocomplete="off" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" <?php if (!empty(old('logradouro'))) { ?>value="<?php echo old('logradouro'); ?>"<?php } ?>>
                  </div>
                </div>
                
                <div class="row">	
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">Complemento</label>
                      <input type="text" autocomplete="off" class="form-control" name="complemento" id="complemento" placeholder="Complemento" <?php if (!empty(old('complemento'))) { ?>value="<?php echo old('complemento'); ?>"<?php } ?>>
                    </div>
                
             
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">Número</label>
                      <input type="text" autocomplete="off" class="form-control" name="numero" id="numero" placeholder="Número do edifício" <?php if (!empty(old('numero'))) { ?>value="<?php echo old('numero'); ?>"<?php } ?>>
                    </div>
                </div>
          
              
                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-xs-12">
                        <label class="control-label">Logotipo</label>    
                        <!--<input type="file" value="imagem"> -->
                        <div class="container_procurar_imagem">
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
                                    <span class="image-preview-input-title">Procurar Logotipo</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="logomarca"/> <!-- rename it -->
                                  </div>
                                </span>
                              </div><!-- /input-group image-preview [TO HERE]--> 
                            </div>
                          </div>
                        </div>
                    </div>   
                </div>        
            </div>

            <div class="col-xs-12">
              <br/><br/>
              <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
              <a href="{{ url('admin/painel/unidades/') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
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
                ;
                if (dados.complemento != "") {
                  $("#complemento").val(dados.complemento);
                }
                ;
                if (dados.bairro != "") {
                  $("#bairro").val(dados.bairro);
                }
                ;

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

  if ("{{ old('cidade') }}" != "") {
    var old_cidade = "{{ old('cidade') }}";
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
          $("#cod_cidade").append("<option value='" + value.cod_cidade + "'>" + value.nome_cidade + "</option>");
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
    
    
$("#planos").select2({
    placeholder: "Planos",
    allowClear: true
  });



  function validaCampos() {

    var cpf_cnpj = $("#cnpj").val();

    $("#alert-validacao").remove();

    if (cpf_cnpj != "") {
      if (valida_cpf_cnpj(cpf_cnpj)) {
        $.ajax({
          url: "{{ url('admin/painel/unidades/check_cnpj') }}",
          data: {'cnpj': cpf_cnpj},
          type: 'POST',
          dataType: 'json',
          success: function (response) {
            if (response != false) {
              $('html,body').scrollTop(0);
              $("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>A unidade de ID " + response.cod_unidade + " já está cadastrada com esse CNPJ. <a class='btn btn-xs btn-info' href='{{ url('admin/painel/unidades/visualizar/') }}" + '/' + response.cod_unidade + "'>Visualizar</a></li></ul></div></div>");
              return false;
            } else {
              return true;
            }
          }
        });
      } else {
        $('html,body').scrollTop(0);
        $("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>CNPJ inválido.</li></ul></div></div>");
        return false;
      }
    }
    ;
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
        width: 250,
        height: 200
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
  
// Mascaras     
$(".cep").mask('00000-000');
$(".horario").mask('00:00:00');
$(".celular").mask('(00) 00000-0000');
$(".telefone").mask('(00) 0000-00000');
$(".cnpj").mask('00.000.000/0000-00');
$(".cpf").mask('000.000.000-00');

// função para permitir apenas caracter informado no regex
$("#responsavel").on("input", function(){
  var regexp = /[^a-zA-Zá-úÁ-Úâ-ûÂ-ÛçÇãõÃÕ ]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

// função para permitir apenas caracter informado no regex
$("#nome_unidade").on("input", function(){
  var regexp = /[^a-zA-Zá-ú-Úâ-ûÂ-ÛçÇãõÃÕ0-9_ ]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

// função para permitir apenas caracter informado no regex
$("#email").on("input", function(){
  var regexp = /[^a-zA-Z0-9-_.@]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

</script>
@stop