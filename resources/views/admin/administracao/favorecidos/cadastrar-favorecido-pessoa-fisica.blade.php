@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Favorecidos | Cadastrar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('favorecido-cadastrar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Cadastrar Favorecido Pessoa Física</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
    
    <div class="col-xs-12">
      
        <div class="x_panel">
        
            <div class="x_content">
          
                <!-- INICIO LINHA -->
                <div class="row">
            
                    
                    <form action="<?php echo url('admin/painel/favorecidos/cadastrar-favorecido-pessoa-fisica'); ?>" method="POST" enctype="multipart/form-data">
                
                        <!-- INICIO LINHA -->
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
                        
                        </div>
                        <!-- FIM LINHA -->
            
                        
                        <div class="row">

                                        <!-- INICIO COLUNA -->
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                            <!-- INICIO DO PANEL -->
                                            <div class="panel panel-default">

                                                <!-- INICIO DO PANEL-HEADING -->
                                                <div class="panel-heading">

                                                    <i class="fas fa-user"></i> Informações Basicas Favorecido

                                                </div>
                                                <!-- FIM DO PANEL-HEADING -->

                                                <!-- INICIO DO PANEL-BODY -->
                                                <div class="panel-body">

                                                    <div class="row">

                                                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">

                                                            <label class="control-label">Foto</label>

                                                            <div class="webcam-grid">
                                                              <a class="btn btn-primary webcam" title="Tire uma foto com a Webcam" data-toggle="modal" data-target="#modal-webcam"><span><i class="fas fa-video" aria-hidden="true"></i></span></a>
                                                              <a class="btn btn-danger clear-foto" title="Limpar Foto"><span><i class="fas fa-trash-alt" aria-hidden="true"></i></span></a>
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



                                                        <div class="col-lg-8 col-xs-12">

                                                            <div class="form-group">

                                                                <label class="control-label">Nome <span class="required-red">*</span></label>

                                                                <input type="text" class="form-control caixa_alta" name="nome" id="nome" placeholder="Nome" <?php if (!empty(old('nome'))) { ?>value="<?php echo old('nome'); ?>"<?php } ?>  minlength="8" autocomplete="off" required="required">

                                                            </div>

                                                        </div>


                                                        <div class="col-lg-4 col-xs-12">

                                                            <div class="form-group">

                                                                <label class="control-label">CPF <span class="required-red">*</span></label>

                                                                <input type="text" class="form-control cpf" name="cpf" id="cpf" placeholder="000.000.000-00" <?php if (!empty(old('cpf'))) { ?>value="<?php echo old('cpf'); ?>"<?php } ?> minlength="14" autocomplete="off" onblur="return validaCampos()" required="required">

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-4 col-xs-12">

                                                            <div class="form-group">

                                                                <label class="control-label">Data de Nascimento</label>

                                                                <input type="text" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="00/00/0000" autocomplete="off" value="{{ old('data_nascimento') }}">

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-4 col-xs-12">

                                                            <div class="form-group">

                                                                <label class="control-label">Sexo</label>

                                                                <select class="form-control" name="sexo" id="sexo">

                                                                    <option value="">Selecione</option>

                                                                    <option value="2" <?php if (old('sexo') == 2) { echo "selected";} ?>>Feminino</option>

                                                                    <option value="1" <?php if (old('sexo') == 1) { echo "selected";} ?>>Masculino</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-4 col-xs-12">

                                                            <div class="form-group">

                                                                <label class="control-label">Estado Civil</label>

                                                                <select class="form-control" name="estado_civil" id="estado_civil">

                                                                    <option value="">Selecione..</option>

                                                                    <option value="2" <?php if (old('estado_civil') == 2) { echo "selected";} ?>>Casado (a)</option>

                                                                    <option value="4" <?php if (old('estado_civil') == 4) { echo "selected";} ?>>Divorciado (a)</option>

                                                                    <option value="1" <?php if (old('estado_civil') == 1) { echo "selected";} ?>>Solteiro (a)</option>

                                                                    <option value="3" <?php if (old('estado_civil') == 3) { echo "selected";} ?>>Viúvo (a)</option>

                                                                </select>

                                                            </div>

                                                        </div>
                                                        
                                                        <div class="col-lg-12 col-xs-12">
                                                            
                                                            <hr/>
                                                            
                                                            <a class="btn btn-md btn-info" id="btn_mostrar_endereco" href="javascript:void(null);">
                                                                <i class="fa fa-plus-circle"></i> Adicionar Endereço
                                                            </a>
                                                            
                                                            <input type="checkbox" name="check_add_endereco" id="check_add_endereco" value = "1" style="display:none"/>
                                                          
                                                            <a class="btn btn-md btn-danger" id="btn_esconder_endereco" href="javascript:void(null);" style="display:none">
                                                                <i class="fa fa-plus-circle"></i> Remover Endereço
                                                            </a>
                                                        </div>
                                                        
                                                        <!-- INICIO DA CAIXA DE ENDERECO -->
                                                        <div id="caixa_endereco" style="display:none">
                                                            
                                                            <div class="col-lg-12 col-xs-12">
                                                            
                                                                <hr/>

                                                            </div>
                                                            
                                                            <div class="col-lg-12 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">E-mail</label>

                                                                    <input type="email" autocomplete="off" class="form-control caixa_baixa" name="email" id="email" placeholder="exemplo@exemplo.com" <?php if (!empty(old('email'))) { ?>value="<?php echo old('email'); ?>"<?php } ?>>

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">Telefone</label>

                                                                    <input type="tel" autocomplete="off" class="form-control telefone" name="telefone" id="telefone" placeholder="(00) 0000-0000" <?php if (!empty(old('telefone'))) { ?>value="<?php echo old('telefone'); ?>"<?php } ?>>

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">Celular</label>

                                                                    <input type="tel" autocomplete="off" class="form-control celular" name="celular" id="celular" placeholder="(00) 0000-0000" <?php if (!empty(old('telefone'))) { ?>value="<?php echo old('celular'); ?>"<?php } ?>>

                                                                </div>
                                                            </div>


                                                            <div class="col-lg-6 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">CEP</label>
                                                                    
                                                                    <input type="text" autocomplete="off" class="form-control cep" name="cep" id="cep" placeholder="00000-000" onblur="puxaEndereco()" <?php if (!empty(old('cep'))) { ?> value="<?php echo old('cep'); ?>" <?php } ?> minlength="9">

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">Estado</label>
                                                                    
                                                                    <select class="form-control" name="cod_estado" id="cod_estado" onchange="buscarCidades()">
                                                                      <option value="">Selecione..</option>
                                                                      @foreach($estados as $estado)
                                                                        <option value="{{ $estado->cod_estado }}" <?php if (old('cod_estado') == $estado->cod_estado) { echo "selected"; } ?>>{{ $estado->nome_estado }}</option>
                                                                      @endforeach
                                                                    </select>

                                                                </div>

                                                            </div>



                                                            <div class="col-lg-6 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">Cidade</label>

                                                                    <select class="form-control" name="cod_cidade" id="cod_cidade">

                                                                        <option value="">...</option>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">Bairro</label>

                                                                    <input type="text" autocomplete="off" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="{{ old('bairro') }}">

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-12 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">Logradouro</label>

                                                                    <input type="text" autocomplete="off" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" value="{{ old('logradouro') }}">

                                                                </div>

                                                            </div>



                                                            <div class="col-lg-6 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">Complemento</label>

                                                                    <input type="text" autocomplete="off" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{ old('complemento') }}">

                                                                </div>

                                                            </div>    

                                                            <div class="col-lg-6 col-xs-12">

                                                                <div class="form-group">

                                                                    <label class="control-label">Número</label>

                                                                    <input type="text" autocomplete="off" class="form-control" name="numero" id="numero" placeholder="Número ou lote e quadra" value="{{ old('numero') }}" onkeypress="return event.charCode >= 48" min="1">

                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <!-- FIM DA CAIXA DE ENDERECO -->
                                                       
                                                    </div> 


                                                </div>
                                                <!-- FIM DO PANEL-BODY -->


                                            </div> 
                                            <!-- FIM DO PANEL -->


                                        </div>
                                        <!-- FIM DA COLUNA -->


                                        <!-- INICIO COLUNA -->
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                                            <div class="panel panel-default">


                                                <div class="panel-heading"><i class="fas fa-user"></i> Categoria do Favorecido</div>


                                                <!-- INICIO PANEL-BODY -->

                                                <div class="panel-body">   


                                                    <!-- INICIO LINHA -->

                                                    <div class="row">


                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                                            <div class="form-group">


                                                                <label class="control-label">Categoria</label>


                                                                <select class="form-control select2_multiple" name="cod_categoria[]" id="cod_categoria" style='width:100%' multiple required='required'>

                                                                    <?php foreach($obj_sub_categoria as $sub_cat): ?>
                                                                    
                                                                        <option value="<?php echo $sub_cat->cod_sub_categoria_financeira; ?>" <?php if(old('cod_categoria') && in_array($sub_cat->cod_sub_categoria_financeira, old('cod_categoria'))){ echo "selected"; }?>><?php echo $sub_cat->nome_sub_categoria_financeira ?></option>
                                                                        
                                                                    <?php endforeach; ?>
                                                                   
                                                                </select>


                                                            </div>


                                                        </div>


                                                    </div>
                                                    <!-- FIM LINHA -->


                                                </div>
                                                <!-- FIM PANEL-BODY -->


                                            </div>
                                            <!-- FIM PANEL -->


                                        </div>
                                        <!-- FIM COLUNA -->    



                                    </div>    
                                    <!-- FIM DA COLUNA --> 
                        
                        
                        
                                    <!-- INICIO DA LINHA -->
                                    <div class="row">
                                    
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               
                                            <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                        
                                            <a class="btn btn-default pull-right" href="http://10.1.1.166/DR-CLUB/public/admin/painel/favorecidos"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        
                                        </div>
                                        

                                    </div>
                                    <!-- FIM DA LINHA -->
                                    
                    </form>
          
                </div>
                <!-- FIM LINHA -->
        
            </div>
      
        </div>
    
    </div>
  
</div>

@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>    
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/valida_cpf_cnpj.js') }}"></script>
<script src="{{ asset('plugins/webcamjs/webcam.min.js') }}"></script>

<script type="text/javascript">

// função para controlar data minima e maxima
$(function() {

   $("#data_nascimento").datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    startDate: '-120y',
    endDate: '0d',
    language: 'pt-BR'   
   });

});

// Exibir caixa de endereco
$("#btn_mostrar_endereco").on('click', function() {
    
    //$(this).closest("td").find("input#avaliacao_item_id")
    $("#check_add_endereco").prop('checked', true);
    $(this).hide();
    $("#btn_esconder_endereco").show();
    $("#caixa_endereco").show();

});


// Escondo caixa de endereco
$("#btn_esconder_endereco").on('click', function() {
    
    // Limpo os campos de contato
     $("#check_add_endereco").prop('checked', false);
    $("#email").val("");
    $("#telefone").val("");
    $("#celular").val("");
    $("#cep").val("");
    $("#cod_estado").val("");
    $("#cod_cidade").val("");
    $("#bairro").val("");
    $("#logradouro").val("");
    $("#complemento").val("");
    $("#numero").val("");

    $(this).hide();
    $("#btn_mostrar_endereco").show();
    $("#caixa_endereco").hide();

});  

// função para permitir apenas caracter informado no regex
$('#nome').on('input blur keyup paste', function() {

    // Expressão regular. Permite letras e o caracter '-'
    var regexp = /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ\-\. ]/g;

    // Testo o valor digitado com a expressão
    if (this.value.match(regexp)) {

        $(this).val(this.value.replace(regexp,''));

    }

});

// função para permitir apenas caracter informado no regex
$("#email").on("input blur keyup paste", function(){
  var regexp = /[^a-zA-Z0-9-_.@]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

// funçao para permitir somente numero e virgula
function keypressed( obj , e ) {
    var tecla = ( window.event ) ? e.keyCode : e.which;
    var texto = document.getElementById("valor_comissao").value
    var indexvir = texto.indexOf(",")
    //var indexpon = texto.indexOf(".") se quiser permitir ponto é só descomentar
    
    if ( tecla == 8 || tecla == 0 )
        return true;
    if ( tecla != 44 /*&& tecla != 46*/ && tecla < 48 || tecla > 57 )
        return false;
    if (tecla == 44) { if (indexvir !== -1 || indexpon !== -1) {return false} }
    //if (tecla == 46) { if (indexvir !== -1 || indexpon !== -1) {return false} } se quiser permitit ponto é só descomentar
}
    
// Mascaras     
$(".cep").mask('00000-000');
$(".horario").mask('00:00:00');
$(".celular").mask('(00) 00000-0000');
$(".telefone").mask('(00) 0000-00000');
$(".cnpj").mask('00.000.000/0000-00');
$(".cpf").mask('000.000.000-00');

$(".select2_multiple").select2({
  placeholder: "Selecione as categorias",
  allowClear: true
});
                

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
 
/*
 # FUNÇÃO PARA VERIFICAR
 # SE O CNPJ É VÁLIDO
 */ 
    function validaCampos() {
        var cpf_cnpj = $("#cpf").val();

       $("#alert-validacao").remove();

        if (cpf_cnpj != "") {
          if (!valida_cpf_cnpj(cpf_cnpj)){
            $('html,body').scrollTop(0);
            $("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>CPF inválido.</li></ul></div></div>");
            return false;
          }
        };
    }

/************************
 # FUNÇÃO PARA WEBCAM
 # --------------------
 */ 
function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#thumb').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    } else {
      $('#thumb').attr('src', '');
    }
  }

$('.webcam').click('click', function () {
  Webcam.attach('#my_camera');

  // Em caso de Erro
  Webcam.on('error', function () {
    alert('Ocorreu um Erro! A Webcam não foi encontrada.');
    $('.modal').modal('hide');
  });
});

//Limpar Campo de Foto
$('.clear-foto').click('click', function () {
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
function take_snapshot() {
  Webcam.freeze();
}

// Despausar Câmera para nova foto
function clear_snapshot() {
  Webcam.unfreeze();
}

// Desligar Câmera
function close_snapshot() {
  Webcam.reset();
}

// Realizar o salvamento da imagem via ajax e retorna a mesma na tela
function save_snapshot() {
  Webcam.snap(function (data_uri) {

    $.ajax({
      url: "{{ url('admin/painel/funcionarios/imagem_webcam') }}",
      data: {'data_uri': data_uri},
      type: "POST",
      dataType: 'json',
      success: function (imagem) {
        if (imagem != false) {
          $('#thumb').attr('src', '<?php echo URL::asset('images/funcionarios') . "/"; ?>' + imagem.name_file);
          document.getElementById('imagem').innerHTML += "<input id='foto-webcam' type='hidden' value='" + imagem.name_file + "' name='foto_webcam' />";
          $('.clear-foto').show();
        }
      },
      error: function () {
        alert("OPS! Ocorreu um erro.\n\nA foto não pode ser processada. Tente novamente!");
      }
    });
  });

  close_snapshot();
}
// Fim dos Parâmetros e Funções para Capturar foto da WebCam

</script>
@stop
