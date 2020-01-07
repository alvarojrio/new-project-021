@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Unidades | Alterar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/admin/administracao/unidades/unidades-cadastrar.css') }}">

@stop

@section('conteudo')

{!! Breadcrumbs::render('unidades-alterar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Alterar Unidade</h3>
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
          <!--<ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#unidade">Unidade</a></li>
            <li><a data-toggle="tab" href="#arquivos">Arquivos</a></li>
          </ul>-->
          <div class="clearfix" style="margin-bottom:20px"></div>
          <div class="tab-content">
            <div id="unidade" class="tab-pane fade in active">
                <form method="POST" action="<?php echo url('admin/painel/unidades/alterar-unidade'); ?>" onsubmit="return validaCampos({{ $unidade->cod_unidade }})" enctype="multipart/form-data">
                  <div class="col-lg-6 col-sm-6 col-xs-12">

                      <div class="row">
                          <div class="form-group col-lg-12 col-md-12 col-xs-12">
                            <label class="control-label">Nome da Unidade <span class="required-red">*</span></label>
                            <input type="text" class="form-control caixa_alta" name="nome_unidade" id="nome_unidade" placeholder="Nome" value="{{ $unidade->nome_unidade }}" minlength="8" autofocus="off" autocomplete="off" required="required">
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-lg-6 col-md-12 col-xs-12">
                            <label class="control-label">CNPJ <span class="required-red">*</span></label>
                            <input type="text" class="form-control cnpj" name="cnpj" id="cnpj" placeholder="CNPJ da Unidade" value="{{ $unidade->cnpj }}" minlength="18" onblur="validaCampos({{ $unidade->cod_unidade }})" required="required">
                          </div>

                          <div class="form-group col-lg-6 col-md-12 col-xs-12">
                            <label class="control-label">Telefone <span class="required-red">*</span></label>
                            <input type="tel" class="form-control telefone" name="telefone" id="telefone" placeholder="Telefone" value="{{ $unidade->telefone }}" minlength="8" autocomplete="off">
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-lg-6 col-md-12 col-xs-12">
                            <label class="control-label">E-mail <span class="required-red">*</span></label>
                            <input type="text" class="form-control caixa_baixa" name="email" id="email" placeholder="E-mail" value="{{ $unidade->email }}" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-12 col-xs-12">
                            <label class="control-label">Responsável pela Unidade</label>
                            <input type="text" class="form-control caixa_alta" name="responsavel" id="responsavel" placeholder="Responsável pela Unidade" value="{{ $unidade->responsavel }}">
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-lg-12 col-md-12 col-xs-12">
                            <label class="control-label">Planos <span class="required-red">*</span></label>
                            <select class="form-control" name="planos[]" id="planos" multiple required>
                              <?php foreach($planos as $plano): ?>
                                <option value="<?php echo $plano->cod_plano; ?>" <?php if (in_array($plano->cod_plano, $array_planos_unidades->lists('cod_plano')->toArray())) { echo "selected"; } ?>>{{ $plano->nome_convenio.' - '.$plano->nome_plano }}</option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                      </div>    

                  </div>

                  <div class="col-lg-6 col-sm-6 col-xs-12">

                      <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">CEP</label>
                        <input type="text" class="form-control cep" name="cep" id="cep" placeholder="CEP" onblur="puxaEndereco()" value="{{ $unidade->cep }}" minlength="9">
                      </div>

                      <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Estado</label>
                        <select class="form-control" name="cod_estado" id="cod_estado" onchange="buscarCidades()">
                          <option value="">Selecione...</option>
                          @foreach($estados as $estado)
                          <option value="{{ $estado->cod_estado }}" <?php if ($unidade->cod_estado == $estado->cod_estado) { echo "selected";} ?>>{{ $estado->nome_estado }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Cidade</label>
                        <select class="form-control" name="cod_cidade" id="cod_cidade">
                            <option value=""></option>
                        </select>
                      </div>

                      <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="{{ $unidade->bairro }}">
                      </div>

                      <div class="form-group col-lg-12 col-md-12 col-xs-12">
                        <label class="control-label">Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" value="{{ $unidade->logradouro }}">
                      </div>

                      <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Complemento</label>
                        <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{ $unidade->complemento }}">
                      </div>

                      <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Número</label>
                        <input type="text" class="form-control" name="numero" id="numero" placeholder="Número do edifício" value="{{ $unidade->numero }}">
                      </div>
                      
                      
                    <div class="row">
                        
                        <div class="form-group col-lg-12 col-md-12 col-xs-12">
                            <div class="form-group col-lg-6 col-md-12 col-xs-12">
                                <label class="control-label">
                                    <a id="file_logotipo_1" href="#" data-toggle="modal" data-target="#modal_logotipo">
                                        <?php if($unidade->logomarca != null){ ?>  <img src="{{ asset('uploads/unidades/logotipos/'.$unidade->logomarca) }}" style="width:100px">  <?php } echo "<br/>Visualizar "; ?> 
                                    </a>
                                </label>
                            </div>    
                            
                            <!--
                            <a href="#" onclick="return removerConteudo()">
                                <?php // if(!empty($unidade->logomarca == true)){ ?> 
                                <font class="links" color="red">Remover</font> 
                                <?php //} ?>
                            </a>
                            -->
                        </div>    
                        
                        <div class="form-group col-lg-12 col-md-12 col-xs-12">
                            <!--<label class="control-label">Selecione..</label>    
                            <!--<input type="file" value="imagem"> -->
                            <div class="container_procurar_imagem">
                                  
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
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="logomarca" /> <!-- rename it -->
                                      </div>
                                    </span>
                                  </div><!-- /input-group image-preview [TO HERE]--> 
                                </div>
                              
                            </div>
                        </div>   
                    </div>   

                    <!--                      
                        <div class="form-group col-lg-12 col-md-12 col-xs-12">

                          <label class="control-label">Logotipo</label> --

                          <a id="file_logotipo_1" href="#" data-toggle="modal" data-target="#modal_logotipo"><?php if($unidade->logomarca != null){ ?>  <img src="{{ asset('images/unidades/logotipos/'.$unidade->logomarca) }}" style="width:100px">  <?php } echo "<br/>Visualizar "; ?> </a> 

                           <a onclick="return removerConteudo()">
                               <?php // if(!empty($unidade->logomarca == true)){ ?> 
                                   <font color="red">Remover</font> 
                               <?php // } ?>
                           </a>

                           <a href="#" onclick="return removerConteudo()"> <font color="red">Remover 2</font></a> 

                           <input type="file" class="form-control" name="logomarca" id="logomarca" value="{{$unidade->logomarca}}">

                        </div> 
                    -->

                  </div>

                  <div class="col-xs-12 col-xs-12 col-xs-12">
                      <div class="col-xs-12 col-xs-12 col-xs-12">
                        <br>
                        <input type="hidden" id="cod_unidade" name="cod_unidade" value="<?php echo $codigo_unidade; ?>" />
                        <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                        <a href="{{ url('admin/painel/unidades/') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i>Voltar<a/> 
                      </div>    
                  </div>

                </form>
            </div>
            
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <hr>  

                <div class='row'>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <h2 class="text-blue">
                            <strong> Arquivos atrelados a esta Unidade:</strong>
                        </h2>
                    </div>     
                </div>    
                <!--
                <div class="row">
                    <div class="row col-xs-12">
                        <form method="POST" action="{{ url('admin/painel/unidades/uploadform/') }}" enctype="multipart/form-data" id="form_upload">
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                              <label class="control-label">Arquivo</label>
                              <input type="file" class="form-control" name="arquivo" id="arquivo">
                              <input type="hidden" id="cod_unidade" name="cod_unidade" value="<?php //echo $codigo_unidade; ?>" />
                            </div>
                            <div class="col-lg-2 col-md-2 col-xs-2 form-group">
                                <label class="col-lg-12 col-md-12 col-xs-12 control-label">&ensp;</label>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-cloud-upload-alt"></i> Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>    
                -->
                <div id="arquivos" class="tab-pane">
                  <div class="row">
                    <div class="col-xs-12" id="div_table_upload">
                      @if($unidade->arquivos_unidades->count())
                      <table class="table table-striped table-bordered" id="table_upload">
                        <thead>
                          <tr>
                            <th>Nome do Arquivo</th>
                            <th class="text-center">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($unidade->arquivos_unidades as $arquivo)
                          <tr id="{{$arquivo->cod_arquivo_unidade}}">
                            <td>{{ $arquivo->arquivo }}</td>
                            <td class="text-center">
                              <a href="{{ url('admin/painel/unidades/download_upload/'.  Crypt::encrypt($arquivo->cod_arquivo_unidade)) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i></a>
                              <a href="javascript:void(0)" onclick="deleta_upload({{ $arquivo->cod_arquivo_unidade }})" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                      @endif
                    </div>
                  </div>
                </div>
            </div>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_logotipo" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Logotipo da Unidade</h4>
            </div>
            <div class="modal-body">
            	<div class="text-center">
                    
                    @if (file_exists(public_path('images/unidades/logotipos/'.$unidade->logomarca)))
                        <img src="{{ asset('images/unidades/logotipos/'.$unidade->logomarca) }}" style="max-width:100%">
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

<script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/valida_cpf_cnpj.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.form.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>

<script type="text/javascript">    
$("#planos").select2({
placeholder: "Planos",
        allowClear: true
});

var options2 = {
success: function(response) {
if (response.status == 1){
toastr.success(response.mensagem, "Sucesso!");
$("#div_table_upload").load(document.URL + ' #table_upload');
$("#modal_upload").modal('hide');
} else{
toastr.error(response.mensagem, "Erro!");
};
},
    error: function(response){
    
    }
};
$('#form_upload').ajaxForm(options2);

function deleta_upload(cod_arquivo_unidade){
    jQuery.ajax({
        url: "{{ url('admin/painel/unidades/deletar_upload') }}",
            data: {'cod_arquivo_unidade' : cod_arquivo_unidade},
            type: 'POST',
            dataType: 'json',
            success: function(response){
                if (response.status == 1) {
                    $("#"+ cod_arquivo_unidade + "").remove();
                    toastr.success(response.mensagem, "Sucesso!");
                    //location.reload();
                } else {
                    toastr.error(response.mensagem, "Erro!");
                }
            },
            error: function(response){
                
            }
    });
}


// Verificando se havia um cep antes.. 
<?php if(!empty($unidade->cep)) { ?> 
    // Chamo a função ..
    puxaEndereco();
    
<?php }elseif(empty($unidade->cep)){ ?> 
    
    // Chamo a função caso tenha um id de estado  
    <?php if($unidade->cod_cidade > 0){ ?>
        
          buscarCidades("{{ $unidade->cidades->estados->cod_estado }}","{{ $unidade->cidades->cod_cidade }}");


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
            
                alert('Formato de CEP inválido !');
            
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


function validaCampos(cod_unidade){
var cpf_cnpj = $("#cnpj").val();
$("#alert-validacao").remove();
if (cpf_cnpj != "") {
if (valida_cpf_cnpj(cpf_cnpj)) {
$.ajax({
url: "{{ url('admin/painel/unidades/check_cnpj') }}",
        data: {'cnpj' : cpf_cnpj, 'cod_unidade' : cod_unidade},
        type: 'POST',
        dataType: 'json',
        success: function(response){
        if (response != false){
        $('html,body').scrollTop(0);
        $("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>A unidade de ID " + response.cod_unidade + " já está cadastrada com esse CNPJ. <a class='btn btn-xs btn-info' href='{{ url('admin/painel/unidades/visualizar/') }}" + '/' + response.cod_unidade + "'>Visualizar</a></li></ul></div></div>");
        return false;
        } else{
        return true;
        }
        }
});
} else {
$('html,body').scrollTop(0);
$("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>CNPJ inválido.</li></ul></div></div>");
return false;
}
};
}


/*
# FUNÇÃO PARA VIZUALIZAR PREVIEW DA IMAGEM (UPLOAD) */ 

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

function removerConteudo() {
    var elemento1=document.getElementById("file_logotipo_1");
    var elemento2=document.getElementById("file_logotipo_2");
    elemento1.remove();
    elemento2.remove();
}   
   
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