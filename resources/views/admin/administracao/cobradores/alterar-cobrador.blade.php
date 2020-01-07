@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Cobradores | Alterar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('cobradores-alterar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Alterar Cobrador</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <div class="row">
            <form action="<?php echo url('admin/painel/cobradores/alterar-cobrador'); ?>" method="POST" enctype="multipart/form-data">
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
              <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><i class="fas fa-user"></i> Informações Básicas do Cobrador</div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <div class="row">
                              
                              
                              <div class="col-lg-4 col-md-12 col-xs-12 text-center foto_visivel visible">
                                  
                                  <div class="col-lg-12 col-md-12 col-xs-12">
                                    <img src="{{asset('uploads/pessoas/'.$cobrador->pessoa->foto)}}" alt="{{$cobrador->pessoa->foto}}" width="200px" height="200px" accesskey=""class="img-thumbnail">
                                  </div>
                                  
                                   <input type="hidden" name="foto_atual" id="foto_atual" value="{{$cobrador->pessoa->foto}}">
                                  <div class="col-lg-12 col-md-12 col-xs-12">
                                      <a href="#" id="btn_alterar_foto"><i class="fas fa-camera"></i><br/>Editar</a>
                                  </div>
                                  
                              </div>
                              
                              <div class="foto_oculta hidden">
                                  <label class="control-label">Foto - <a href="#" id="btn_cancelar_alterar_foto" class="btn-link">Cancelar edição</a></label>
                                  <div class="webcam-grid">
                                    <a class="btn btn-primary webcam" title="Tire uma foto com a Webcam" data-toggle="modal" data-target="#modal-webcam"><span><i class="fas fa-video" aria-hidden="true"></i></span></a>
                                    <a class="btn btn-danger clear-foto" title="Limpar Foto"><span><i class="fas fa-trash-alt" aria-hidden="true"></i></span></a>
                                  </div>

                                  <div id="imagem" class="thumbnail preview-imagem" onclick="document.getElementById('foto').click()">
                                    <img id="thumb" class="img-responsive lightblue-tooltip foto_thumb" data-tooltip="tooltip" data-placement="bottom" title="Upload de arquivo de imagem" src="<?php echo asset('images/sem_foto.jpg'); ?>" />
                                  </div>

                                  <input type="file" name="foto" id="foto" class="hidden">

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

                              </div> 
                              
                            <div class="col">
                              <div class="col-lg-8 col-md-12 col-xs-12">
                                <div class="form-group">
                                  <label class="control-label">Nome <span class="required-red">*</span></label>
                                  <input type="text" autocomplete="off" class="form-control caixa_alta" name="nome" id="nome" placeholder="Nome" value="{{$cobrador->pessoa->nome}}" minlength="8" required>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                                  <div class="col-lg-4 col-md-12 col-xs-12">
                                    <div class="form-group">
                                      <label class="control-label">CPF <span class="required-red">*</span></label>
                                      <input type="text" autocomplete="off" class="form-control cpf" name="cpf" id="cpf" placeholder="000.000.000-00" value="{{ $cobrador->pessoa->cpf }}" minlength="14" onblur="return validaCampos()" required>
                                    </div>
                                  </div>
                                  <div class="col-lg-4 col-md-12 col-xs-12">
                                    <div class="form-group">
                                      <label class="control-label">Data de Nascimento</label>
                                      <input type="text" autocomplete="off" class="form-control" name="data_nascimento" id="data_nascimento"  placeholder="00/00/0000" value="<?php if($cobrador->pessoa->data_nascimento != ""){ echo date('d/m/Y', strtotime($cobrador->pessoa->data_nascimento)); }?>">
                                    </div>
                                  </div>
                                  <div class="col-lg-4 col-md-12 col-xs-12">
                                      <div class="form-group">
                                          <label class="control-label">Sexo</label>
                                            <select class="form-control" name="sexo" id="sexo">
                                                <option value="">Selecione</option>
                                                <option value="2" <?php if ($cobrador->pessoa->sexo == 2) { echo "selected";} ?>>Feminino</option>
                                                <option value="1" <?php if ($cobrador->pessoa->sexo == 1) { echo "selected";} ?>>Masculino</option>
                                           </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-4 col-md-12 col-xs-12">
                                      <div class="form-group">
                                        <label class="control-label">Estado Civil</label>
                                            <select class="form-control" name="estado_civil" id="estado_civil">
                                                <option value="">Selecione</option>
                                                <option value="2" <?php if ($cobrador->pessoa->estado_civil == 2) { echo "selected";} ?>>Casado (a)</option>
                                                <option value="4" <?php if ($cobrador->pessoa->estado_civil == 4) { echo "selected";} ?>>Divorciado (a)</option>
                                                <option value="1" <?php if ($cobrador->pessoa->estado_civil == 1) { echo "selected";} ?>>Solteiro (a)</option>
                                                <option value="3" <?php if ($cobrador->pessoa->estado_civil == 3) { echo "selected";} ?>>Viúvo (a)</option>
                                            </select>
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
              <div class="col-lg-6 col-md-12  col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><i class="fas fa-user"></i> Contatos do Cobrador</div>
                  <div class="panel-body">   
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="form-group">
                          <label class="control-label">E-mail</label>
                          <input type="email" autocomplete="off" class="form-control caixa_baixa" name="email" id="email" placeholder="exemplo@exemplo.com" value="<?php echo $cobrador->usuarios->email; ?>">
                        </div>
                      </div>                          
                    </div>  
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Telefone</label>
                            <input type="tel" autocomplete="off" class="form-control telefone" name="telefone" id="telefone" placeholder="(00) 0000-0000" value="<?php echo $cobrador->pessoa->telefone; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Celular</label>
                            <input type="tel" autocomplete="off" class="form-control celular" name="celular" id="celular" placeholder="(00) 0000-0000" value="<?php echo $cobrador->pessoa->celular; ?>">
                        </div>
                    </div>
                  </div>  
                    <div class="row">
                      <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="form-group">
                          <label class="control-label">CEP</label>
                          <input type="text" autocomplete="off" class="form-control cep" name="cep" id="cep" placeholder="00000-000" onblur="puxaEndereco()" <?php if (!empty(old('cep'))) { ?> value="<?php echo old('cep'); ?>" <?php }else{?> value ="<?php echo $cobrador->pessoa->cep; ?>"<?php } ?> minlength="9">
                        </div>
                      </div>
                        
                      <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Estado</label>
                              

                            <select class="form-control" name="cod_estado" id="cod_estado" onchange="buscarCidades()">
                               <option value="">Selecione..</option>
                               <?php  if($cobrador->pessoa->cod_cidade != 0){ ?>

                                    <?php foreach($estados as $estado): ?>
                                    
                                        <option value="<?php echo $estado->cod_estado; ?>" <?php if($cobrador->pessoa->cidades->estados->cod_estado == $estado->cod_estado){ echo "selected='selected'"; } ?> ><?php echo $estado->nome_estado; ?></option>
                                    
                                    <?php endforeach; ?>


                                <?php }else{ ?>

                                    <?php foreach($estados as $estado): ?>
                                        
                                        <option value="<?php echo $estado->cod_estado; ?>"><?php echo $estado->nome_estado; ?></option>
                                    
                                    <?php endforeach; ?>



                                <?php } ?>
                            </select>
                           
                        </div>
                      </div>
                      
                    </div> 
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Cidade</label>
                              
                                <select class="form-control" name="cod_cidade" id="cod_cidade">
                              
                                     <option value="">...</option>
                              
                                </select>
                                                             
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-12 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Bairro</label>
                              <input type="text" autocomplete="off" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="{{ $cobrador->pessoa->bairro }}">
                            </div>
                        </div>
                    </div>  
                      
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Logradouro</label>
                              <input type="text" autocomplete="off" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" value="{{$cobrador->pessoa->logradouro}}">
                            </div>
                        </div>
                    </div>
                      
                    <div class="row">  
                        <div class="col-lg-6 col-md-12 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Complemento</label>
                              <input type="text" autocomplete="off" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{$cobrador->pessoa->complemento}}">
                            </div>
                        </div>    
                         
                        <div class="col-lg-6 col-md-12 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Número</label>
                              <input type="text" autocomplete="off" class="form-control" name="numero" id="numero" placeholder="Número do edifício" value="{{$cobrador->pessoa->numero}}" onkeypress="return event.charCode >= 48" min="1">
                            </div>
                            
                        </div>
                    </div>
                      
                  </div>
                </div>
              </div>
              <div class="col-xs-12"> <!-- INICIO DIV LOGIN -->
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-laptop"></i> Informações Financeiras</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-xs-12">  
                                <label class="control-label">Unidades <span class="required-red">*</span></label>
                                <select class="form-control" name="unidades[]" id="unidades" multiple required>
                                    <?php foreach($unidades as $unidade): ?>
                                    
                                    <option value="<?php echo $unidade->cod_unidade; ?>" <?php if (in_array($unidade->cod_unidade, $cobrador->unidades()->where('funcionarios_unidades.status',1)->pluck('funcionarios_unidades.cod_unidade')->toArray())) { echo "selected"; } ?>><?php echo $unidade->nome_unidade; ?></option>
                                    
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="col-lg-2 col-md-12 col-xs-12"> 
                                    
                                <div class="form-group">
                                     <label class="control-label">Vendedor ?</label><br/>  
                                     <input class="form-check-input" type="checkbox" value="Sim" name="vendedor" id="vendedor" <?php if($cobrador->vendedor == 1){echo 'checked';}  ?> >
                                     <label class="form-check-label" for="vendedor">Sim</label>
                                 </div>    
                                
                            </div>
                            
                            <div class="col-lg-4 col-md-12 col-xs-12">
                                <div class="form-group">   
                                    <label class="control-label">Comissão: <span class="required-red">*</span></label> 
                                    <input type="radio" name="tipo_comissao" value="1" <?php if($historico_comissao->tipo_comissao == 1){echo "checked"; } ?> > Reais (R$)
                                    <input type="radio" name="tipo_comissao" value="2" <?php if($historico_comissao->tipo_comissao == 2){echo "checked"; } ?> > Percentual (%)
                                    <input type="text" autocomplete="off" class="form-control col-lg-6" name="valor_comissao" id="valor_comissao" placeholder="Informe o valor ou percentual" value="{{ $historico_comissao->valor_comissao }}" onkeypress="return keypressed( this , event );" requerid> 
                                </div>    
                            </div>
                        </div>
                    </div>        
                </div>
              </div>
                
              <div class="col-xs-12"> <!-- INICIO DIV LOGIN -->
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-laptop"></i> Informações de Login</div>
                    <div class="panel-body">
                    <div class="row">  
                        <div class="col-lg-6 col-xs-12">    
                           <div class="form-group">
                                <label class="control-label">Usuário <span class="required-red">*</span></label>
                                <input type="text" autocomplete="off" class="form-control" name="usuario" id="usuario" placeholder="Usuário de login" value="{{$cobrador->usuarios->usuario}}"  required>
                           </div>
                        </div>

                        <div class="col-lg-2 col-xs-12 text-center">    
                           <div class="form-group">
                               <label class="control-label">Alterar Senha? <input type="checkbox" id="btn_alterar_senha" name="btn_alterar_senha" value="sim"></label>
                           </div>  
                        </div>  

                        <div class="senha_oculta">    
                            <!-- campo vindo dinamicamente pelo jquery-->
                        </div>
                        
                    </div>                     

                    </div>
              </div>  

              <div class="col-xs-12">
                <input type="hidden" id="cod_pessoa" name="cod_pessoa" value="{{Crypt::encrypt($cobrador->cod_pessoa)}}" />  
                <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                <a class="btn btn-default pull-right" href="{{ url('admin/painel/cobradores/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
              </div>
            
          </div> <!-- FIM DIV LOGIN -->
         </form> 
        </div>
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
    format: 'dd/mm/yyyy',
    startDate: '-120y',
    endDate: '0d',
    language: 'pt-BR'   
   });

});

// função para bloquear digitos numericos
$("#nome").on("input", function(){
  var regexp = /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ ]/g;
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

// funçao para permitir somente numero e virgula

function keypressed( obj , e ) {
    var tecla = ( window.event ) ? e.keyCode : e.which;
    var texto = document.getElementById("valor_comissao").value
    var indexvir = texto.indexOf(",")
    //var indexpon = texto.indexOf(".") se quiser permitit ponto é só descomentar
    
    if ( tecla == 8 || tecla == 0 )
        return true;
    if ( tecla != 44 /*&& tecla != 46*/ && tecla < 48 || tecla > 57 )
        return false;
    if (tecla == 44) { if (indexvir !== -1 || indexpon !== -1) {return false} }
    //if (tecla == 46) { if (indexvir !== -1 || indexpon !== -1) {return false} } se quiser permitit ponto é só descomentar
}
    
// Mudar a classe para alterar foto
$(document).ready(function(){

    $("#btn_alterar_foto").on('click', function(){
        $(".foto_visivel").attr("class", "col-lg-4 col-md-12 col-xs-12 text-center foto_visivel hidden");
        $(".foto_oculta").attr("class", "col-lg-4 col-md-12 col-xs-12 text-center foto_oculta visible");  
    })
    
    $("#btn_cancelar_alterar_foto").on('click', function(){
        $(".foto_oculta").attr("class", "col-lg-4 col-md-12 col-xs-12 text-center foto_oculta hidden"); 
        $(".foto_visivel").attr("class", "col-lg-4 col-md-12 col-xs-12 text-center foto_visivel visible");
    })

    
});

// Mudar a classe para alterar senha
$(document).ready(function(){

    $("#btn_alterar_senha").on('click', function(){
        
        var checado = $("#btn_alterar_senha").is(':checked')
        if(checado == true){
            $(".senha_oculta").after('\
                \n\
                \n\
                <div class="col-lg-4 col-xs-12"><div class="senha_visivel form-group">\n\
                    <label class="control-label">Senha <span class="required-red">*</span></label> \n\
                    <input type="password" autocomplete="off" class="form-control" name="senha" id="senha" placeholder="Senha de login" minlength="6" maxlength="30" value="">\n\
                </div></div>'
            );
        }else{
            $(".senha_visivel").remove();
        }

    });
    
});

// Mascaras     
$(".cep").mask('00000-000');
$(".horario").mask('00:00:00');
$(".celular").mask('(00) 00000-0000');
$(".telefone").mask('(00) 0000-00000');
$(".cnpj").mask('00.000.000/0000-00');
$(".cpf").mask('000.000.000-00');

$("#unidades").select2({
placeholder: "Selecione as unidades",
        allowClear: true
});



// Verificando se havia um cep antes.. 
<?php if(!empty($unidade->cep)) { ?> 
    // Chamo a função ..
    puxaEndereco();
    
<?php }elseif(empty($unidade->cep)){ ?> 
    
    // Chamo a função caso tenha um id de estado  
    <?php if($unidade->cepcod_cidade > 0){ ?>

          buscarCidades("{{ $cobrador->pessoa->cidades->estados->cod_estado }}","{{ $cobrador->pessoa->cidades->cod_cidade }}");


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
